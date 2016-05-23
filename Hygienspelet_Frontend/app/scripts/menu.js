/**
 * Created by Andreas on 2016-04-26.
 */
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
})



$(function () {
    showActiveChallengesList();

    var unit= document.getElementById("unit").innerHTML;
    console.log('UNIT:'+unit);

    $("#contact-form").submit(function () {



        var url = "http://hygienspelet.se/scripts/contact.php";

        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize(),
            success: function (data)
            {
                var messageAlert = 'alert-' + data.type;
                var messageText = data.message;

                var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                if (messageAlert && messageText) {
                    $('#contact-form').find('.messages').html(alertBox);
                    $('#contact-form')[0].reset();
                }
            }
        });
        return false;
    });

});


function showHsList (){

    
    var res=null;
    
    for (var i=0;i<25;i++){
        if (res===null){
            res = ' <li class="list-group-item">Topplista '+i+' </li>';
        }
        else{
            res += ' <li class="list-group-item">Topplista '+i+' </li>';

        }

    }
    
    $('#top').html(res);

};

function showUnitHsList (){

    $.getJSON('http://hygienspelet.se/highscores' ,function(jd) {
        if (jd.length === 0) {
            console.log("Empty JSON");
        }

        else {
            console.log(jd);

            var res=null;

            for (var i = 0; i < jd.length; i++) {
                var item = jd[i];
                var id = item.ID;
                var points = item.points;
                var unit = item.unitID;

                if (res===null){
                    res = ' <li class="list-group-item">Utmaningshistorik ( ID:'+id+' P:'+points+'U:'+unit+' )'+i+' </li>';
                }
                else{
                    res += ' <li class="list-group-item">Utmaningshistorik (ID:'+id+' P:'+points+'U:'+unit+')'+i+' </li>';

                }
            }
            $('#history').html(res);
        }
    })
};

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("href") // activated tab
    alert(target);
});


function showActiveChallengesList (){
    var unit = document.getElementById("hiddenID").value;
    $.getJSON('http://hygienspelet.se/getactive/'+unit, function (jd) {
        var res=null;

        for (var i = 0; i < jd.length; i++) {
            if (res===null){
                res = ' <a href="http://www.hygienspelet.se/game/ch='+jd[i].id+'"><li class="list-group-item">ID: (' + jd[i].id + ') Mot: ' + jd[i].name + ' </li></a>';
            }
            else{
                res += ' <a href="http://www.hygienspelet.se/game/ch='+jd[i].id+'"><li class="list-group-item">ID: (' + jd[i].id + ') Mot: ' + jd[i].name + ' </li></a>';
            }
        }
        $('#actives').html(res);
    })
};


function showFinishedChallengesList (){

    var unit = document.getElementById("hiddenID").value;
    $.getJSON('http://hygienspelet.se/getfinished/'+unit, function (jd) {

    var res=null;

    for (var i=0;i<jd.length;i++){
        if (res===null){
            res = ' <li class="list-group-item">'+jd[i].CreatorName+': ' +jd[i].creator_score+ ' Poäng VS '+jd[i].RecieverName+': ' +jd[i].reciever_score+ ' Poäng</li>';
        }
        else{
            res += ' <li class="list-group-item">'+jd[i].CreatorName+': ' +jd[i].creator_score+ ' Poäng VS '+jd[i].RecieverName+': ' +jd[i].reciever_score+ ' Poäng</li>';

        }
    }

    $('#finished').html(res);
    })
};


/*
Challenge another unit.
 */
function createChallenge(userUnitID,chUnitID) {
    console.log("UserUnitID:"+userUnitID+" ChallengedUnitID:"+chUnitID);

 /*
 Skapa en utmaning  genom att skicka IDn och hämta sedan spelpaket o spela.
 få med dig utmaningID,enhetsid och frågor. du skapar utmaning-> creator ID.
 Skicka sedan resultat till server.

 anropa hygienspelet.se/game...isch4
  */




};

/*
Start a challenge from another unit.
Mark challenge and click ->Accept challenge?->startChallenge();?
 */
function startChallenge() {
    
    /*
    Mark a challenge and get that challenge id from a map?
    RecieverID.
     */
    var challengeID; 
    
}
