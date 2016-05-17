/**
 * Created by Andreas on 2016-05-09.
 */
var game_pkg=[];
var currentQuestionIndex=-1;
var nbrOfCorrectAnswers=0;
var currentQuestion;
var alt1,alt2,alt3,alt4;
var muted=false;
//Sounds
var correctSound = new Audio('http://www.hygienspelet.se/public/sounds/correct.mp3');
var inCorrectSound = new Audio('http://www.hygienspelet.se/public/sounds/incorrect.mp3');
var clickSound = new Audio('http://www.hygienspelet.se/public/sounds/click.mp3');

$(function () {
    loadGame();
});


function loadGame (){
    


    $.getJSON('http://hygienspelet.se/getpackage', function (jd) {
        if (jd.length === 0) {
            console.log("Empty JSON");
        }

        else {
            console.log(jd);
            var pkg = jd;
            for (var i = 0; i < pkg.length; i++) {
                var id = pkg[i].ID;
                var text = pkg[i].Question;
                var answers = pkg[i].Answer_alternative_ID;
                var picture = pkg[i].Picture_URL;
                var questionID= pkg[i].Question_ID;
                var answ1=pkg[i].AA_1;
                var answ2=pkg[i].AA_2;
                var answ3=pkg[i].AA_3;
                var answ4=pkg[i].AA_4;
                var correct=pkg[i].Correct_answer;

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
    window.location = "basic.php";
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