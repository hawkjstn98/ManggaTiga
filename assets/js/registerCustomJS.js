$(document).ready(function () {
    $('#btnSignup').click(function(){
        let fname=$('#fname').val();
        let lname=$('#lname').val();
        let username = $('#uname').val();
        let email=$('#email').val();
        let password=$('#password').val();
        let address=$('#address').val();
        let phone = $('#phone').val();
        if(fname&&lname&&username&&email&&password&&address&&phone&&phone){
            $.ajax({
                url: base+'UserData/Register',
                type: 'post',
                dataType: 'json',
                data: {
                    fname: fname,
                    lname: lname,
                    user: username,
                    email: email,
                    pass: password,
                    address: address,
                    phone: phone
                },
                success: function(res){
                    if(res.success){
                        alert(res.data);
                        window.location.href = base+"Home";
                    }else{
                        if(res.formerror){
                            $('body').html(res.formerror);
                        }
                        else{
                            alert(res.data);
                        }
                    }
                }
            });
        }
    });
});