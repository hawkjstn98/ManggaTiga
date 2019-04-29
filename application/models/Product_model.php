<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    public function getProducts(){
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $query = $this->db->get();
        return $query->result();
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