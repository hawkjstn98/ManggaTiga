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

    public function deleteImage($id){
//        $path = $this->db->select('path')->where('id', $id)->from('carousel_promo')->result();
//        $path = $path->path;
//        unlink($path);
        //$this->db->;
        $query = $this->db->select('path')->where('id', $id)->from('carousel_promo')->get()->row();
        unlink('.'.$query->path);
        $this->db->where('id', $id);
        $res = $this->db->delete('carousel_promo');
        return $res;
    }

}

?>