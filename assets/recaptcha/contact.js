$(function () {

    $('#contact-form').on('submit1', function (e) {
        var alertBox = '<div class="d-flex justify-content-center"><div class="spinner-border text-success" role="status" style="width: 3rem; height: 3rem;" ><span class="sr-only">Loading...</span></div></div>';                
        $('#contact-form').find('.messages').html(alertBox);
    })
    window.verifyRecaptchaCallback = function (response) {
        $('input[data-recaptcha]').val(response).trigger('change');
    }

    window.expiredRecaptchaCallback = function () {
        $('input[data-recaptcha]').val("").trigger('change');
    }

    $('#contact-form').validator();

    $('#contact-form').on('submit', function (e) {
	var spin = document.getElementById("spinner");
	spin.style.display = "block";
        if (!e.isDefaultPrevented()) {
            var url = "proceed.php";
            
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data) {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                	spin.style.display = "none";
                        $('#contact-form').find('.messages').html(alertBox);
                        $('#contact-form')[0].reset();
                        grecaptcha.reset();
                    }
                }
            });
            return false;
        }
    })
});  

       
