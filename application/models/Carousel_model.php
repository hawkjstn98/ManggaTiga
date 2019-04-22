<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel_model extends CI_Model{

    public function getCarousel(){
        $query = $this->db->get('carousel_promo');

//        echo_json_encode($query->result);
        return json_encode($query->result_array());
    }



}

?>