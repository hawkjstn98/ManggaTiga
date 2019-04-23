<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" id="carousel-promo">
<!--        <div class="carousel-item active">-->
<!--            <img class="d-block w-100" src="--><?php //echo base_url('assets/carousel/1.png')?><!--" alt="First slide" width="600" height="400">-->
<!--        </div>-->
<!--        <div class="carousel-item">-->
<!--            <img class="d-block w-100" src="--><?php //echo base_url('assets/carousel/2.png') ?><!--" alt="Second slide" width="600" height="400">-->
<!--        </div>-->
<!--        <div class="carousel-item">-->
<!--            <img class="d-block w-100" src="--><?php //echo base_url('assets/carousel/3.png') ?><!--" alt="Third slide" width="600" height="400">-->
<!--        </div>-->
    </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bg-success" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon bg-success" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>
<script>
    var json = JSON.stringify(<?php echo($carouseldata) ?>) ;
    let data = JSON.parse(json);
    let carouselSelector = $('#carousel-promo');
    for(let i = 0 ; i < data.length ; i++){
        let activestring = '';
        if(i==0){
            activestring = 'active';
        }
        carouselSelector.append("<div class='carousel-item "+activestring+"'>"+"<img class='d-block w-100' src='"+data[i].path+"' width='600' height='400'>"+"</div>");
    }
    console.log(data.length)
</script>