$(document).ready(function(){
    $('#btnRegister').click(function(e) {
            e.preventDefault()

            var firstName = $('#tbFirstName').val();
            var lastName = $('#tbLastName').val();
            var email = $('#tbEmail').val();
            var password = $('#tbPassword').val();
            var repPassword = $('#tbRePassword').val();
            var _token=$('#hiddenToken').val();
            var regFirstName = /^[A-Z][a-z]{2,20}/;
            var regLastName = /^[A-Z][a-z]{2,20}/;
            var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            var regPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/;


            greske = [];
            if (!regFirstName.test(firstName)) {
                greske.push("Wrong format of first name");
                $('#tbFirstName').css({"borderColor":"red"})
            }else{
                $('#tbFirstName').css({"borderColor":"green"})
            }
            if (!regLastName.test(lastName)) {
                greske.push("Wrong format of last name");
                $('#tbLastName').css({"borderColor":"red"})
            }else{
                $('#tbLastName').css({"borderColor":"green"})
            }
            if (!regEmail.test(email)) {
                greske.push("Wrong format of email");
                $('#tbEmail').css({"borderColor":"red"})
            }else{
                $('#tbEmail').css({"borderColor":"green"})
            }
            if (!regPassword.test(password)) {
                greske.push("Wrong format of password");
                $('#tbPassword').css({"borderColor":"red"})
            }else{
                $('#tbPassword').css({"borderColor":"green"})
            }
            if (repPassword!=password || repPassword=="") {
                greske.push("Passwords doesn't match");
                $('#tbRePassword').css({"borderColor":"red"})
            }else{
                $('#tbRePassword').css({"borderColor":"green"})
            }
            if (greske.length == 0) {
                $.ajax({
                    url:"/register",
                    method:"POST",

                    data:{
                        send:"poslato",
                        firstName:firstName,
                        lastName:lastName,
                        password:password,
                        email:email,
                        repPassword:repPassword,
                       _token:_token
                    },
                    success:function () {
                        window.location="/login"
                    },
                    error:function (xhr,status,error) {
                        var ispis="";
                        switch(xhr.status){
                            case 404:
                                ispis+=""
                                break;
                            case 409:
                                ispis+="Someone already use this email"
                                break;
                            case 422:
                                ispis+="Something went wrong!"
                                break;
                            case 500:
                                ispis+="Someone already use this email"
                                break;
                        }
                        $('.greske').html(ispis);
                        $('.greske').css({"color":"red"})
                        $('#tbPassword,#tbEmail,#tbRePassword,#tbFirstName,#tbLastName').css({"borderColor":"red"})
                    }
                })
            } else {
                validno = false;
                var ispis="<ul>"
                for(let g of greske){
                    ispis+=`<li>${g}</li>`
                }
                ispis+="</ul>"
                $('.greske').html(ispis)
                $('.greske').css({"color":"red"});
            }


    })

})
