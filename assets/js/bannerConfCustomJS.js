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
            {defaultContent: "<button class='btn btn-primary'>Delete</button>"}
        ]
    });

    function convertImage(data, type, full, meta){
        let path = data;
        return "<img src="+path+" width='200' height='150'>";
    }
    // for(let i = 0 ; i < data.length ; i++){
    //     dataSelector.append("<tr>" +
    //         "<td>"+data[i].id+"</td>" +
    //         "<td>"+data[i].description+"</td>" +
    //         "<td><img src="+data[i].path+" width='100' height='100'></td>"+
    //         "</tr>");
    // }
    // console.log(data.length)
} );