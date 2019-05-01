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
                url: base+''
            });
        }
    });
});