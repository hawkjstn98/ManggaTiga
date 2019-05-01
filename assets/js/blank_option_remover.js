$(document).ready(function(){
    $('select option')
        .filter(function() {
            return !this.value || $.trim(this.value).length == 0 || $.trim(this.text).length == 0;
        })
    .remove();

    $('#ProductName').focus();

    $('#formProduct').submit(function(f){
        f.preventDefault();
        let kosong = false;
        let textAlert = "";
        if($('#ProductName').val().length <= 0 || $('#QuantityPerUnit').val() <= 0 || $('#Price').val() <= 0){
            kosong = true;
            alert(kosong);
            if($('#ProductName').val().length <= 0){
                textAlert += $('label[for="' + $('#ProductName').attr('id') + '"]').html();
                textAlert += ", ";
            }
            if($('#QuantityPerUnit').val() <= 0){
                textAlert += $('label[for="' + $('#QuantityPerUnit').attr('id') + '"]').html();
                textAlert += ", ";
            }
            if($('#Price').val() <= 0){
                textAlert += $('label[for="' + $('#Price').attr('id') + '"]').html();
                textAlert += ", ";
            }
            
        }

        if(!kosong){
            let conf = confirm("Are you sure of the detail in the form ?");
            alert(base+"Cms/InsertProduct");
            if(conf){
                $.ajax({
                    url: base+"Cms/InsertProduct",
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(res){
                        if(res.success){
                            //$('#modalAddBanner').modal('hide');
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
        else{
            textAlert += "still empty!";
            alert(textAlert);
        }
    });
});