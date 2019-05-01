<?php

if($newproduct){
    echo "<script>var base='".base_url()."'</script>";
    echo "<script src='".base_url('assets/js/blank_option_remover.js')."'></script>";
}
else{
    echo "<script>var base='".base_url()."'</script>";
    echo "<script src='".base_url('assets/js/newbrandCustom.js')."'></script>";
}

?>