/*
Verification pour la verification de register
*/
$('#register-user').click(function(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirm = $('#password-confirm').val();
    var passwordLength = password.length;
    var agreeTerms = $('#agreeTerms');

    //Verification de firstname
    if(firstname != "" && /^[a-zA-Z]+$/.test(lastname)){
        $('#firstname').removeClass('is-invalid');
        $('#firstname').addClass('is-valid');
        $('#error-register-firstname').text("");

                //verification de lastname
        if(lastname != "" && /^[a-zA-Z]+$/.test(lastname)){
            $('#lastname').removeClass('is-invalid');
            $('#lastname').addClass('is-valid');
            $('#error-register-lastname').text("");

                //Verification email
                if(email !="" ){
                    $('#email').removeClass('is-invalid');
                    $('#email').addClass('is-valid');
                    $('#error-register-email').text("");

                        //Verification mot de passe
                        if(passwordLength >= 8){
                            $('#password').removeClass('is-invalid');
                            $('#password').addClass('is-valid');
                            $('#error-register-password').text("");

                                if(password == password_confirm){
                                    $('#password-confirm').removeClass('is-invalid');
                                    $('#password-confirm').addClass('is-valid');
                                    $('#error-register-password-confirm').text("");

                                        if(agreeTerms.is(':checked')){
                                            $('#agreeTerms').removeClass('is-invalid');
                                            $('#error-register-agreeTerms').text("");

                                            //envoi du form

                                                var res = emailExist(email);

                                                if(res != "exist"){
                                                   //
                                                   $('#form-register').submit();
                                                }else{
                                                    $('#email').addClass('is-invalid');
                                                    $('#email').removeClass('is-valid');
                                                    $('#error-register-email').text(" Ce email existe deja");
                                                }

                                        }else{
                                            $('#agreeTerms').addClass('is-invalid');
                                            $('#error-register-agreeTerms').text(" Vous devez accepteer nos termes de conditions");

                                        }
                                }else{
                                    $('#password-confirm').addClass('is-invalid');
                                    $('#password-confirm').removeClass('is-valid');
                                    $('#error-register-password-confirm').text(" Vos mots de passes doivent etre identique");
                                }
                        }else{
                            $('#password').addClass('is-invalid');
                            $('#password').removeClass('is-valid');
                            $('#error-register-password').text(" Votre mot de passe doit contenir au minimum 8 caracteres");
                        }
                }else{
                    $('#email').addClass('is-invalid');
                    $('#email').removeClass('is-valid');
                    $('#error-register-email').text(" email invalide");
                }
        }else{
            $('#lastname').addClass('is-invalid');
            $('#lastname').removeClass('is-valid');
            $('#error-register-lastname').text("Votre prenom est invalide");
        }

    }else{
        $('#firstname').addClass('is-invalid');
        $('#firstname').removeClass('is-valid');
        $('#error-register-firstname').text("Votre nom est invalide");
    }
});

$('#agreeTerms').change(function(){
    var agreeTerms = $('#agreeTerms');
    if(agreeTerms.is(':checked')){
        $('#agreeTerms').removeClass('is-invalid');
        $('#error-register-agreeTerms').text("");
    }else{
        $('#agreeTerms').addClass('is-invalid');
        $('#error-register-agreeTerms').text(" Vous devez accepteer nos termes de conditions");
    }
});

function emailExist(email)
{
    var url = $('#email').attr('url-emailExist');
    var token = $('#email').attr('token');
    var res = "";
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            '_token': token,
            email: email
        },
        success:function(result){
            res=result.response;
        },
        async: false
    });

    return res;
}
