/**
 * Created by Andreas on 2016-05-09.
 */
var game_pkg=[];
var currentQuestionIndex=-1;
var nbrOfCorrectAnswers=0;
var currentQuestion;
var alt1,alt2,alt3,alt4;
var muted=false;
var query="";
var challengeID="";
var unitID="";


var pract=false,creator=false,reciever=false;
//Sounds
var correctSound = new Audio('http://www.hygienspelet.se/public/sounds/correct.mp3');
var inCorrectSound = new Audio('http://www.hygienspelet.se/public/sounds/incorrect2.mp3');
var clickSound = new Audio('http://www.hygienspelet.se/public/sounds/click.mp3');

$(function () {
    loadGame();
});


function loadGame (){
    query=window.location.toString();
    console.log('Before Substring:'+query);
    query=query.substring(query.lastIndexOf('/')+1,query.length);
    console.log('After Substring:'+query);
    //query=query.substring(1);
    if (query.indexOf('cr=')==0){
        creator=true;
        createChallenge(query);
    }
    else if (query.indexOf('pr=')==0){
        pract=true;
        practice(query);
    }
    else if(query.indexOf('ch=')==0){
        reciever=true;
        getChallenge(query);
    }
}

function createChallenge(param)     {


//Hämta challengeID
    console.log("CreateChallenge:"+param);


    $.getJSON('http://hygienspelet.se/createchallenge/'+param, function (jd) {


        if (jd.length === 0) {
            console.log("Empty JSON");
        }

        else {
            console.log(jd);

            challengeID=jd[0][0].challenge_id;

            var pkg = jd[1];
            for (var i = 0; i < pkg.length; i++) {
                var id = pkg[i].id;
                var text = pkg[i].question;
                var answers = pkg[i].answer_alternative_id;
                var picture = pkg[i].picture_url;
                var questionID= pkg[i].question_id;
                var answ1=pkg[i].aa_1;
                var answ2=pkg[i].aa_2;
                var answ3=pkg[i].aa_3;
                var answ4=pkg[i].aa_4;
                var correct=pkg[i].correct_answer;

                console.log('id:' + id + ' text:' + text + ' AnswersID:' + answers + ' Picture:' + picture
                    + ' QuestionID:' + questionID + ' A1:' + answ1 + ' A2:' + answ2
                    + ' A3:' + answ3 + ' A4:' + answ4 + ' Correct:' + correct +" Challenge_ID:"+challengeID);
                game_pkg.push({ID:id, Question: text, Answers: answers ,Picture:picture, QuestionID: questionID, AA1:answ1,
                    AA2: answ2, AA3: answ3, AA4: answ4, Correct_Answer:correct});


            }
            console.log('print array: '+game_pkg);
            nextQuestion();
            updateProgressbar();

        }

    });
}

function getChallenge(param){


    challengeID=param.substring(param.indexOf('=')+1);

    console.log("GetChallenge:"+param+ " Ch-ID:"+challengeID);



    $.getJSON('http://hygienspelet.se/getchallenge/'+challengeID, function (jd) {


        if (jd.length === 0) {
            console.log("Empty JSON");
        }

        else {
            console.log(jd);
            var pkg = jd;
            for (var i = 0; i < pkg.length; i++) {
                var id = pkg[i].id;
                var text = pkg[i].question;
                var answers = pkg[i].answer_alternative_id;
                var picture = pkg[i].picture_url;
                var questionID= pkg[i].question_id;
                var answ1=pkg[i].aa_1;
                var answ2=pkg[i].aa_2;
                var answ3=pkg[i].aa_3;
                var answ4=pkg[i].aa_4;
                var correct=pkg[i].correct_answer;




                console.log('id:' + id + ' text:' + text + ' AnswersID:' + answers + ' Picture:' + picture
                    + ' QuestionID:' + questionID + ' A1:' + answ1 + ' A2:' + answ2
                    + ' A3:' + answ3 + ' A4:' + answ4 + ' Correct:' + correct);
                game_pkg.push({ID:id, Question: text, Answers: answers ,Picture:picture, QuestionID: questionID, AA1:answ1,
                    AA2: answ2, AA3: answ3, AA4: answ4, Correct_Answer:correct});


            }
            console.log('print array: '+game_pkg);
            nextQuestion();
            updateProgressbar();

        }

    });
}

function practice(param) {

    unitID=param.substring(param.indexOf('=')+1);

    console.log("PRACTICE:"+param+ " UnitID:"+unitID);
    /*
    Ändra senare för practice.
     */
    $.getJSON('http://hygienspelet.se/getpackage', function (jd) {


        if (jd.length === 0) {
            console.log("Empty JSON");
        }

        else {
            console.log(jd);
            var pkg = jd;
            for (var i = 0; i < pkg.length; i++) {
                var id = pkg[i].id;
                var text = pkg[i].question;
                var answers = pkg[i].answer_alternative_id;
                var picture = pkg[i].picture_url;
                var questionID= pkg[i].question_id;
                var answ1=pkg[i].aa_1;
                var answ2=pkg[i].aa_2;
                var answ3=pkg[i].aa_3;
                var answ4=pkg[i].aa_4;
                var correct=pkg[i].correct_answer;

                console.log('id:' + id + ' text:' + text + ' AnswersID:' + answers + ' Picture:' + picture
                    + ' QuestionID:' + questionID + ' A1:' + answ1 + ' A2:' + answ2
                    + ' A3:' + answ3 + ' A4:' + answ4 + ' Correct:' + correct);
                game_pkg.push({ID:id, Question: text, Answers: answers ,Picture:picture, QuestionID: questionID, AA1:answ1,
                    AA2: answ2, AA3: answ3, AA4: answ4, Correct_Answer:correct});


            }
            console.log('print array: '+game_pkg);
            nextQuestion();
            updateProgressbar();

        }

    });

}

function proceed(){
    console.log('Proceed();');
    selectSound();

    if (getSelectedAnswers()==0){
        alert('Ojsan, där gick det lite för snabbt... \nVar vänlig och välj minst ett svarsalternativ  :)');
    }
    else {
        $('.btn-group label').removeClass('active');
        $('.btn-group label').addClass('disabled');
        $('#proceed-btn').addClass('disabled');

        controlAnswer();

        $("html, body").animate({scrollTop: 0}, "fast");

        setTimeout(function () {
            $('#btnAnsw1').css('background-color', '');
            $('#btnAnsw2').css('background-color', '');
            $('#btnAnsw3').css('background-color', '');
            $('#btnAnsw4').css('background-color', '');
            $('.btn-group label').removeClass('disabled');
            $('#proceed-btn').removeClass('disabled');
            nextQuestion();
        }, 2000);
    }


}

function controlAnswer () {
    //Control answer and if right-> increment correctAnswer by 1.
    console.log('ControlAnswer(); Correctanswer is:' + currentQuestion.Correct_Answer);

    getSelectedAnswers();   //Fetch answers.

    //Calculate nbr of correct answers.
    var correctAnswers=[];
    var str = currentQuestion.Correct_Answer;
    var pos = str.indexOf(':');
    console.log('OUTSIDE LOOP- String:'+str+ " Pos:"+pos);
    while (pos != -1) {
        correctAnswers.push(str.substr(0,pos));
        str = str.substr(pos+1);
        pos = str.indexOf(':');
        console.log('INSIDE LOOP  String:'+str+ " Pos:"+pos);
    }
    correctAnswers.push(str);

    for (var i=0;i<correctAnswers.length;i++){
        console.log("CORR ANSWERS:"+correctAnswers[i] +" i:"+i);
    }


    console.log("Amount of correct Alternatives:"+correctAnswers.length);
    var choosenAnswers = 0;
    //Control nbr of choosen answers.
    if (alt1) {
        choosenAnswers++;
    }
    if (alt2) {
        choosenAnswers++;
    }
    if (alt3) {
        choosenAnswers++;
    }
    if (alt4) {
        choosenAnswers++;
    }


    //Right amount of answers, Let's see if they're right.
        var tempCorNbr=0;

            if (correctAnswers.indexOf("1") != -1 && alt1) {
                tempCorNbr++;
                $('#btnAnsw1').css('background-color', '#73c437');
            }
            else if (alt1){
                $('#btnAnsw1').css('background-color', '#C80000');
            }

            if (correctAnswers.indexOf("2") != -1  && alt2) {
                tempCorNbr++;
                $('#btnAnsw2').css('background-color', '#73c437');
            }
            else if (alt2){
                $('#btnAnsw2').css('background-color', '#C80000');
            }

            if (correctAnswers.indexOf("3") != -1  && alt3) {
                tempCorNbr++;
                $('#btnAnsw3').css('background-color', '#73c437');
            }
            else if (alt3){
                $('#btnAnsw3').css('background-color', '#C80000');
            }

            if (correctAnswers.indexOf("4") != -1  && alt4) {
                tempCorNbr++;
                $('#btnAnsw4').css('background-color', '#73c437');
            }
            else if (alt4){
                $('#btnAnsw4').css('background-color', '#C80000');
            }


        if (tempCorNbr==correctAnswers.length&&choosenAnswers==correctAnswers.length){
            nbrOfCorrectAnswers++;
            correct();
        }
        else{
            wrong();
        }


        console.log("Wrong amount of answers! choosen:"+choosenAnswers+" CorrNBR:"+correctAnswers.length);


    
    console.log('Total nbr of correct answers:'+nbrOfCorrectAnswers);
    resetAnswers();

}

function nextQuestion (){
    console.log('NextQuestion();');
    // index 0-9 = 10 questions
    if (currentQuestionIndex==9){
        showResult();
    }
    else{

        currentQuestionIndex++;
        updateProgressbar();
        // Show current question
        currentQuestion=game_pkg[currentQuestionIndex];
        document.getElementById("questionwell").innerHTML=currentQuestion.Question;
        $('span','#btnAnsw1').text(currentQuestion.AA1);
        $('span','#btnAnsw2').text(currentQuestion.AA2);
        $('span','#btnAnsw3').text(currentQuestion.AA3);
        $('span','#btnAnsw4').text(currentQuestion.AA4);

        console.log('PRINTING!: '+currentQuestion.Question+ 'INDEX: '+currentQuestionIndex+
            ' Correct:'+currentQuestion.Correct_Answer);


    }
}

function showResult (){
    setResult(nbrOfCorrectAnswers);
    console.log('showResult();');
    //send result to server
    
    //Show Result to user
    var html='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >' +
        '<h2> Resultat: '+ nbrOfCorrectAnswers+'/10 </h2>' +
        ' <button type="button" onclick="goToMenu()" class="btn btn-default btn-lg btn-block">Tillbaka till Huvudmenyn</button>' +
        '</div>';
    document.getElementById("questioncontainer").innerHTML=html;
    
    //Go back to menu.
}

function updateProgressbar() {
    document.getElementById("status-bar").setAttribute("style", "width:"+(currentQuestionIndex+1)*10 +"%");
    document.getElementById("status-bar").innerHTML=currentQuestionIndex+1+'/10';
}

function goToMenu() {
    window.location = "http://www.hygienspelet.se/main";
}

function getSelectedAnswers() {

    var selected=0;
    alt1=false;
    alt2=false;
    alt3=false;
    alt4=false;

    if ($('#answer1').is(':checked')){
        alt1=true;
        selected++;
    }
    if ($('#answer2').is(':checked')){
        alt2=true;
        selected++;
    }
    if ($('#answer3').is(':checked')){
        alt3=true;
        selected++;
    }
    if ($('#answer4').is(':checked')){
        alt4=true;
        selected++;
    }

    console.log('GetSelectedAnswers();');
    console.log('Checked1?:'+ alt1 +' value:'+$("#answer1").attr("value"));
    console.log('Checked2?:'+ alt2 +' value:'+$("#answer2").attr("value"));
    console.log('Checked3?:'+ alt3 +' value:'+$("#answer3").attr("value"));
    console.log('Checked4?:'+ alt4 +' value:'+$("#answer4").attr("value"));

    return selected;
}
function resetAnswers() {
    console.log('ResetAnswers();');
    $('#answer1').attr('checked',false);
    $('#answer2').attr('checked',false);
    $('#answer3').attr('checked',false);
    $('#answer4').attr('checked',false);

}
function correct() {
    if(!muted) {
        correctSound.play();
    }
}
function wrong() {
    if(!muted) {
        inCorrectSound.play();
    }

}
function selectSound() {
    console.log('SelectSound()');
    if(!muted) {
        clickSound.play();
    }
}

function toggleSound() {
    if(muted){
        muted=false;
        document.getElementById("soundlogo").src = "http://www.hygienspelet.se/public/soundOn6.png";
    }
    else {
        muted = true;
        document.getElementById("soundlogo").src = "http://www.hygienspelet.se/public/soundMuted4.png";
    }

}
function home() {
    if (window.confirm("Vill du verkligen återvända till menyn?") ) {
        goToMenu();
    }
}

function setResult(result) {

    /*
    10 points per correct answer.
     */
    result=result*10;

    if(creator){
        console.log('Creator Result:'+result);

        $.getJSON('http://hygienspelet.se/setresultcre/id='+challengeID+'&s='+result, function (jd) {

        });

    }
    else if(reciever){
        console.log('Reciever Result:'+result);
        /*
        kontrollera vem som vunnit o uppdatera deras score.
         */

        $.getJSON('http://hygienspelet.se/setresultrec/id='+challengeID+'&s='+result, function (jd) {

        });
    }
    else if(pract){
        console.log('Practice Result:'+result);
        $.getJSON('http://hygienspelet.se/setresultpra/id='+unitID+'&s='+result, function (jd) {

        });
    }


}