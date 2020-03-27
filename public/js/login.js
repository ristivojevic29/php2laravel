$(document).ready(function(){
    $('#btnLogin').click(function(e){
        e.preventDefault();

        var email=$('#tbEmail').val();
        var password=$('#tbPassword').val();
        var _token=$('#hiddenToken').val();

        var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        var regPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{8,}$/;

        var greske=[];

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
        if (greske.length == 0) {
            $.ajax({
                url:"/login",
                method:"POST",
                data:{
                    send:"poslato",
                    password:password,
                    email:email,
                    _token:_token
                },
                success:function () {
                    window.location="/"
                },
                error:function (xhr,status,error) {
                    var ispis="";
                    switch(xhr.status){
                        case 404:
                            ispis+=""
                            break;
                        case 409:
                            ispis+="User with this email or password does not exist"
                            break;
                        case 422:
                            ispis+="Something went wrong!"
                                break;
                        case 500:
                            ispis+="Problem with server"
                            break;
                    }
                    $('.greske').html(ispis);
                    $('.greske').css({"color":"red"})
                    $('#tbPassword,#tbEmail').css({"borderColor":"red"})

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
