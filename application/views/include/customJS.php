<?php

if($customJs=='banner') {
    echo "<script>var json = JSON.stringify(".$carouseldata.");\nvar base = '".base_url()."';</script>\n";
   echo "<script src='". base_url('assets/js/bannerConfCustomJS.js') ."'></script>\n";
}
else if($customJs=='register'){
    echo "<script src='". base_url('assets/js/registerCustomJS.js') ."'></script>\n";
}

?>