<?php


if($bannerJs) {
    echo "<script>var json = JSON.stringify(".$carouseldata.");\nvar base = '".base_url()."'\n</script>";
   echo "<script src=". base_url('assets/js/bannerConfCustomJS.js') ."></script>";
}