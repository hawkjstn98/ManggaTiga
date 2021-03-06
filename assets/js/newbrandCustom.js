$('document').ready(function() {
    $('#BrandName').focus();

    $('#formBrand').submit(function(f){
        f.preventDefault();
        if($('#BrandName').val().length <= 0){
            alert($('#BrandName').attr('name') + " still empty!");
        }
        else{
            let conf = confirm("Are you sure of the detail in the form ?");
            if(conf){
                $.ajax({
                    url: base+"cms/Admin/newBrand/insert_action",
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(res){
                        if(res.success){
                            alert('Ajax Success');
                            location.reload();
                        }
                        else{
                            alert(res.data);
                        }
                    },
                    error: function(res){
                        var msg = '';
                        if (res.status === 0) {
                            msg = 'Not connect.\n Verify Network.';
                        } else if (res.status == 404) {
                            msg = 'Requested page not found. [404]';
                        } else if (res.status == 500) {
                            msg = 'Internal Server Error [500].';}
                        else {
                            msg = 'Uncaught Error.\n' + res.responseText;
                        }
                        alert(msg);
                    }
                });
            }
        }
    });
});