<?php
echo "<script>var base='".base_url()."'</script>";
if($customJs=='banner') {
    echo "<script>var json = JSON.stringify(".$carouseldata.");</script>\n";
   echo "<script src='". base_url('assets/js/bannerConfCustomJS.js') ."'></script>\n";
}
else if($customJs=='newproduct'){
    echo "<script src='".base_url('assets/js/blank_option_remover.js')."'></script>";
}
else if($customJs=='newbrand'){
    echo "<script src='".base_url('assets/js/newbrandCustom.js')."'></script>";
}
else if($customJs=='register'){
    echo "<script src='". base_url('assets/js/registerCustomJS.js') ."'></script>\n";
}

?>