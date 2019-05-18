<!-- Card Item dipakai di page awal dan page kategori, masih sangat polos boleh dihias :") -->
<div class="container">
    <div id="cardgridarrive" class="row">
        <!--        <div class="card" style="width: 18rem; margin-left:50px;">-->
        <!--            <a href="--><?php //echo base_url('index.php/Redirect/detail');?><!--">-->
        <!--                <img class="card-img-top" alt="Card image cap" src="http://localhost/assets/logo/Ourlogo.png">-->
        <!--                <div class="card-body">-->
        <!--                    <h5 class="card-title" align="center" id="cardNamaBarang">MWB</h5>-->
        <!--                </div>-->
        <!--            </a>-->
        <!--            <div class="card-bottom" align="center" style="margin-bottom:10px">-->
        <!--                <p class="card-text" id="cardHarga">GRATIS</p>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</div>
<script>

    var basds = '<?php echo base_url() ?>';
    var red = '<?php echo base_url('index.php/Redirect/detail');?>';

    $.ajax({
        url: basds+'Home/RenderProductDataNew',
        type: 'post',
        data: {},
        success : function(res){
            if(res.success){
                console.log(res.data);
                let data = res.data;
                a =  $('#cardgridarrive');
                console.log(data);
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

                    a.append('<div class="card" style="width: 18rem; margin-left:50px;">'+
                        '<a href="'+red+'">'+
                        '<img class="card-img-top" alt="Card image cap" src="http://localhost/assets/logo/Ourlogo.png">'+
                        '<div class="card-body">'+
                        '<h5 class="card-title" align="center" id="cardNamaBarang">'+data[i].barangNama+'</h5>'+
                        '</div>'+
                        '</a>'+
                        '<div class="card-bottom" align="center" style="margin-bottom:10px">'+
                        '<p class="card-text" id="cardHarga"><del>'+data[i].hargaJual+'</del></p>'+
                        '<p class="card-text" id="cardHarga">'+data[i].hargaJual*(100-data[i].persen)/100+'</p>'+
                        '</div>'+
                        '</div>')
                }
            }
            else{
                alert(res.data);
            }
        }

    });
</script>