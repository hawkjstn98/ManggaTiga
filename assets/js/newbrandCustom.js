$('document').ready(function() {
    $('#BrandName').focus();

    $('#formBrand').submit(function(f){
        f.preventDefault();
        if($('#BrandName').val().length <= 0){
            alert($('#BrandName').attr('name') + " still empty!");
        }
        else{
            //ajax
        }
    });
});