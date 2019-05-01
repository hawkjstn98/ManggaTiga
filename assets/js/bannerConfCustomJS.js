$(document).ready(function() {

    let data = JSON.parse(json);
    console.log(data);
    let dataSelector = $('#dataCarousel');
    $('#bannerData').DataTable({
        data: data,
        columns: [
            {data: "id"},
            {data: "description"},
            {data: "path", render: convertImage },
            {data: "id", render: function(data, type, row, meta){
                return '<button class="btn btn-primary" id='+data+'> Delete </button>'
                }}
        ]
    });
    var btnclick = function(click){
        //alert(click.currentTarget.id);
        let conf = confirm("Are you sure want to delete this banner ?");
        if(conf){
            let id = click.currentTarget.id;
            $.ajax({
                url: base+"Cms/DeleteBanner",
                type: 'post',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(res){
                    if(res.success){
                        alert(res.data+", Delete Banner Success");
                        location.reload();
                    }
                }
            });
        }
    }

    $('.btn-primary').on('click', btnclick);


    function convertImage(data, type, full, meta){
        let path = data;
        return "<img src="+path+" width='200' height='150'>";
    }

    $('#addCarousel').click(function(){
       $('#modalAddBanner').modal();
    })


    $('#formDetail').submit(function(f){
        f.preventDefault();
        //alert(base+"Cms/UploadBanner");

        let description = $('#description').val();
        let input = $('#inputImageBanner').val();
        if(input && description){
            let conf = confirm("Are you sure want to add this banner ?");
            if(conf){
                $.ajax({
                    url: base+"Cms/UploadBanner",
                    type: "POST",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(res){
                        if(res.success){
                            $('#modalAddBanner').modal('hide');
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
            else{
                alert("Retard alert");
            }
        }
        else{
            alert("Field Description And Input cannot be empty");
        }
    });


    // for(let i = 0 ; i < data.length ; i++){
    //     dataSelector.append("<tr>" +
    //         "<td>"+data[i].id+"</td>" +
    //         "<td>"+data[i].description+"</td>" +
    //         "<td><img src="+data[i].path+" width='100' height='100'></td>"+
    //         "</tr>");
    // }
    // console.log(data.length)
} );

//function for show preview uploaded picture
function readURL(input){
    //alert(input.files[0].size);
    if(input.files[0].size<2200000){

        if(input.files && input.files[0]){
            var read = new FileReader();

            read.onload = function(f){
                $('#imagePrev').attr('src', f.target.result);
            };
            read.readAsDataURL(input.files[0]);
        }
    }
    else{
        alert("Picture size exceeding 2MB !, Please upload again.");
    }
}