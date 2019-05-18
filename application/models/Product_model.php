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
        return $query->result(); 
    }

    public function getBrands(){
        $query = $this->db->get('brand');
        return $query->result(); 
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
        return $query;
    }

    public function newBrand($param){
        $data = array(
            'brandId' => '',
            'brandNama' => $param
        );
        $query = $this->db->insert('brand', $data);
        return $query;
    }

    public function renderRecommend(){
        $this->db->select(array('barang.barangId', 'barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->limit(10);
//        $this->db->orderby(4, 'DESC');
        $query = $this->db->get();

        $result = $query->result();
        if($result){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function renderProduct($id){
        $this->db->select(array('barang.barangId', 'barang.barangNama', 'barang.details', 'barang.hargaJual', 'barang.stock', 'brand.brandNama', 'category.categoryNama', 'promo.persen'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');\
        $this->db->where('barang.barangId', $id);
        $query = $this->db->get();

        $result = $query->result();
        if($result){
            return $query->result();
        }
        else{
            return false;
        }
    }
}

?>