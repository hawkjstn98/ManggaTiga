$(document).ready(function(){
    $("#btnLogin").click(function(){
        $("#modalLoginForm").modal();
    });

    $('#btnLogout').click(function() {
        $.ajax({
            url: base+'/Home/Logout',
            type: 'post',
            data:{
            },
            success: function(res){
                alert(res);
                location.reload();
            }
        })
    });

    $('#btnLoginConfirm').click(function(){
        let email = $('#email').val();
        let pass = $('#password').val();
        if(pass&&email){
            $.ajax({
                url: base+'/Home/LoginConfirm',
                type: 'post',
                dataType: 'json',
                data:{
                    email: email,
                    password : pass
                },
                success: function(res){
                    alert(res);
                    if(res.success){
                        alert("Login Success");
                        location.reload();
                    }else{
                        if(res.formerror){
                            alert("Email format Error");
                        }
                        else{
                            alert(res.data);
                        }
                    }
                }
            });
        }
        else{
            alert("Field cannot be empty");
        }

    });

    $("#btnRegister").click(function(){
        let a = base+"UserData/UserRegister";
        window.location.href = a;
    });


});
