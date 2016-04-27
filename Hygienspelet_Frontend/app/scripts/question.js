/**
 * Created by Andreas on 2016-04-27.
 */

$(function () {

    $("#question-form").submit(function () {

        var url = "scripts/question.php";
        // var correctAnswer = $('#form_correct input:radio:checked').val()
        //
        // alert('korrekt svar:'+correctAnswer);

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
                    $('#question-form').find('.messages').html(alertBox);
                    $('#question-form')[0].reset();
                }
            }
        });
        return false;
    });

});