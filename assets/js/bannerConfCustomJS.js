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
            {defaultContent: "<button class='btn btn-primary'>Delete</button><button class='btn btn-dark'>Edit</button>"}
        ]
    });

    function convertImage(data, type, full, meta){
        let path = data;
        return "<img src="+path+" width='200' height='150'>";
    }

    $('#addCarousel').click(function(){
        $('#modalAddBanner').modal();
    })



    $('#bannerbtnSubmit').click(function(){
        let description = $('#description').val();
        let input = $('#inputImageBanner').val();
        alert(base);
        if(input && description){
            let conf = confirm("Are you sure want to add this banner ?");
            if(conf){
                $.ajax({
                    url: base+"Cms/UploadBanner",
                    data: ,
                    success: function(){

                    }

                })
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