<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    public function getProducts(){
        $query = $this->db->get('barang');

//        echo_json_encode($query->result);
        return json_encode($query->result_array());
    }

    public function getCategories(){
        $query = $this->db->get('category');
        return json_encode($query->result_array()); 
    }

    public function getBrands(){
        $query = $this->db->get('brand');
        return json_encode($query->result_array()); 
    }

    public function getPromos(){
        $query = $this->db->get('promo');
        return json_encode($query->result_array()); 
    }

    public function newProduct($param){
        $data = array(
            'barangId' => '',
            'barangNama' => $param['barangNama'],
            'details' => $param['details'],
            'categoryId' => $param['categoryId'],
            'brandId' => $param['brandId'],
            'hargaJual' => $param['hargaJual'],
            'stock' => $param['stock'],
            'aksesBarang' => '1',
            'promoId' => $param['promoId']
        );
        $query = $this->db->insert('barang', $data);
        return json_encode($query->result_array());
    }

    public function newBrand($param){
        $data = array(
            'brandId' => '',
            'brandNama' => $param
        );
        $query = $this->db->insert('brand', $data);
        return json_encode($query->result_array());
    }

    public function updateProduct(){

    }

}

?>