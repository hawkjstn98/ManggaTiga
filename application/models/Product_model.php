<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    public function getProducts(){
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId'));
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
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->order_by("promo.persen","DESC");
        $this->db->limit(6);
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

    public function renderNewArrival(){
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->limit(6);
        $this->db->order_by('barang.barangId', 'DESC');
        $query = $this->db->get();

        $result = $query->result();
        if($result){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function renderwithCategory($category){
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('category.categoryNama', $category);
        $this->db->order_by('barang.barangNama', 'ASC');
        $query = $this->db->get();

        $result = $query->result();
        if($result){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function renderbrandwithCategory($category){
        $this->db->select(array('brand.brandNama', 'category.categoryNama'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('category.categoryNama', $category);
        $this->db->order_by('brand.brandNama', 'ASC');
        $query = $this->db->get();

        $result = $query->result();
        if($result){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function renderDetail($id){
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
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

    
    public function searchbyName($search){
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock',));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->like('barang.barangNama',$search,'both');
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