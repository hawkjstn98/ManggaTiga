<!-- Card Item dipakai di page awal dan page kategori, masih sangat polos boleh dihias :") -->
<div class="container">
    <div id="cardgridnew" class="row">

    </div>
</div>
<script>

    var basds = '<?php echo base_url() ?>';
    var red = '<?php echo base_url('index.php/RedirectController/toDetail/');?>';

    $.ajax({
        url: basds+'Home/RenderProductDataNew',
        type: 'post',
        dataType : 'json',
        data: {},
        success : function(res){
            if(res.success){
                let data = res.data;
                a =  $('#cardgridnew');
                for(let i = 0; i < res.data.length; i++){
                    // a.append('<div class="card" style="width: 18rem; margin-left:50px;">');
                    // a.append('<a href="+red+">');
                    // a.append('<img class="card-img-top" alt="Card image cap" src="http://localhost/assets/logo/Ourlogo.png">');
                    // a.append('<div class="card-body">');
                    // a.append('<h5 class="card-title" align="center" id="cardNamaBarang">'+data[i].barangNama+'</h5>');
                    // a.append('</div>');
                    // a.append('</a>');
                    // a.append('<div class="card-bottom" align="center" style="margin-bottom:10px">');
                    // a.append('<p class="card-text" id="cardHarga">'+data[i].hargaJual+'</p>');
                    // a.append('</div>');
                    // a.append('</div>');

                    let hJual = data[i].hargaJual * 1;
                    let hJualDis = data[i].hargaJual*(100-data[i].persen)/100;
                    let harga = (data[i].stock <= 0 ? ('<p class="card-text" id="cardHarga" style="color:red;">Out of Stock</p>') : (data[i].persen > 0 ? ('<p class="card-text" id="cardHarga"> <del><a style="color:red;"> Rp. '+ hJual.toLocaleString('id-ID') +'</a></del></p> <p class="card-text" id="cardHarga"> Rp. '+hJualDis.toLocaleString('id-ID')+'</p>') : ('<p class="card-text" id="cardHarga"> Rp. '+hJual.toLocaleString('id-ID')+'</p>')));
                    a.append(
                        '<div class="card" style="width: 20rem; margin-left:50px;">'+
                        '<div class="card-body">' +
                        '<a href="'+red+data[i].barangId+'">'+
                        '<img class="card-img-top '+ (data[i].stock <= 0 ? ('overlay') : '') +'" alt="Card image cap" src="'+basds+data[i].gambar+'">'+
                        '<div class="card-body">'+
                        '<p class="card-text" style="font-size:14px;" align="center" id="cardNamaBarang">'+data[i].barangNama+'</p>'+
                        '</div>'+
                        '</a>'+
                        '</div>' +
                        '<div class="card-footer" align="center" style="margin-bottom:10px">'+
                        harga +
                        '</div>'+
                        '</div>');
                }
            }
            else{
                alert(res.data);
            }
        }

    });
</script>