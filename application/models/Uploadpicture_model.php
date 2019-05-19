<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadpicture_model extends CI_Model{
    /**
     * Uploadbanner_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function uploadImage($brandId, $imgpath){
        $data = array(
                'gambarPath'=>$imgpath,
                'barangId'=>$brandId
            );
        $result = $this->db->insert('gambar', $data);
        return $result;
    }
}
?>