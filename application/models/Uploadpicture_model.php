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
        // if($action === "insert"){ //ga kepake
        //     $data = array(
        //         'gambarPath'=>$imgpath,
        //         'barangId'=>$brandId
        //     );
        //     $result = $this->db->insert('barang', $data);
        //     return $result;
        // }

        $this->db->set('gambar', $imgpath);
        $this->db->where('barangId', $brandId);
        $result = $this->db->update('barang');
        return $result;
        
    }
}
?>