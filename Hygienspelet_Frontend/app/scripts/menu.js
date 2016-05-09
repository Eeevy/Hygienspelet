/**
 * Created by Andreas on 2016-04-26.
 */
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').focus()
})



$(function () {
    showActiveChallengesList();
    $("#contact-form").submit(function () {

        var url = "scripts/contact.php";

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


    var res=null;

    for (var i=0;i<25;i++){
        if (res===null){
            res = ' <li class="list-group-item">Aktiva Utmaningar '+i+' </li>';
        }
        else{
            res += ' <li class="list-group-item">Aktiva Utmaningar '+i+' </li>';

        }

    }

    $('#active').html(res);

};


function showFinishedChallengesList (){


    var res=null;

    for (var i=0;i<25;i++){
        if (res===null){
            res = ' <li class="list-group-item">Avslutade Utmaningar ' +i+' </li>';
        }
        else{
            res += ' <li class="list-group-item">Avslutade Utmaningar '+i+' </li>';

        }

    }

    $('#finished').html(res);

};

