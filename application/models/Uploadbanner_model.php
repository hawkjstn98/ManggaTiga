<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadbanner_model extends CI_Model{
    /**
     * Uploadbanner_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function uploadImage($desc, $imgpath){
        $data = array('description'=>$desc,
                'path'=>$imgpath
            );
        $result = $this->db->insert('carousel_promo', $data);
        return $result;
    }


}

?>