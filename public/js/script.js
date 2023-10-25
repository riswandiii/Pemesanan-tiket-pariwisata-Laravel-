$(document).ready(function(){

    // Show password
    $('#flexCheckDefault').click(function(){
       if($(this).is(':checked')){
            $('#password-login').attr('type', 'text');
       }else{
            $('#password-login').attr('type', 'password');
       }
    });
    // End show password

    // Alert duration
    window.setTimeout(function() {
        $('.alert').fadeTo(300, 0).slideUp(300, function(){
            $(this).remove();
        });
    }, 4000);
    // End alert

});

