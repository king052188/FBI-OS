$(function () {
    // $('#sign_in').validate({
    //
    //     highlight: function (input) {
    //         console.log("X0");
    //         $(input).parents('.form-line').addClass('error');
    //     },
    //     unhighlight: function (input) {
    //         console.log("X1");
    //         $(input).parents('.form-line').removeClass('error');
    //
    //
    //     },
    //     errorPlacement: function (error, element) {
    //         console.log("X2");
    //         $(element).parents('.input-group').append(error);
    //     }
    //
    // });

    $('#btnLogin').click(function() {
        var mobile = $('#mobile').val();
        var password = $('#password').val();
        if (mobile == null || mobile == "") {
            $('#a_mobile').show();
            return false;
        }
        if (password == null || password == "") {
            $('#a_mobile').hide();
            $('#a_password').show();
            return false;
        }
        // $.ajax({
        //     type    : 'post',
        //     url     : '/login/processing',
        //     data    : { 'mobile': mobile, 'password' : password },
        //     beforeSend: function () {
        //         console.log("Before");
        //         $('#loginLoading').show();
        //         $('#btnLogin').hide();
        //     },
        //     success : function(data){
        //         $('#a_mobile').hide();
        //         $('#a_password').hide();
        //         console.log(data);
        //     }
        // });

    });

    $('#btnSignUp').click(function() {
        $(function () {
            $('#demo-form').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
                $('.bs-callout-info').toggleClass('hidden', !ok);
                $('.bs-callout-warning').toggleClass('hidden', ok);
            })
                .on('form:submit', function() {
                    return false; // Don't submit form for this demo
                });
        });
    });

    
});