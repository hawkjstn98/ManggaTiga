<?php


if($bannerJs) {
    echo "<script>var json = JSON.stringify(".$carouseldata.");\nvar base = '".base_url()."';</script>\n";
   echo "<script src='". base_url('assets/js/bannerConfCustomJS.js') ."'></script>\n";
}