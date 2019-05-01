<?php

if($newproduct){
    echo "<script src='".base_url('assets/js/blank_option_remover.js')."'></script>";
}
else{
    echo "<script src='".base_url('assets/js/newbrandCustom.js')."'></script>";
}

?>