<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{

    public function getProducts(){
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId', 'barang.gambar'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('barang.aksesBarang', 1);
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

    public function getPromo(){
        $query = $this->db->get('promo');
        return $query->result(); 
    }

    public function getBarangId($barangNama){
        $this->db->select('barangId');
        $this->db->where('barangNama', $barangNama);
        return $this->db->get('barang');
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
            'promoId' => $param['promoId'],
            'gambar' => ''
        );
        $query = $this->db->insert('barang', $data);
        return $query;
    }

    public function updateProduct($param){
        $data = array(
            'barangId' => $param['brandId'],
            'hargaJual' => $param['hargaJual'],
            'stock' => $param['stock'],
            'promoId' => $param['promoId'],
            'aksesBarang' => $param['aksesBarang']
        );

        // echo $data['barangId'];
        // echo $data['hargaJual'];
        // echo $data['stock'];
        //print_r($data['promoId']);
        // echo $data['aksesBarang'];

        $this->db->set('hargaJual', $data['hargaJual']);
        $this->db->set('stock', $data['stock']);
        $this->db->set('promoId', $data['promoId']);
        $this->db->set('aksesBarang', $data['aksesBarang']);
        $this->db->where('barangId', $data['barangId']);
        $query = $this->db->update('barang');
        
        print_r($query);
    }

    public function editModalProduct($param){
        //$this->db->select(array('barangNama', 'hargaJual', 'stock', 'aksesBarang', 'promoId'));
        $this->db->from('barang');
        $this->db->where('barangId', $param);
        $query = $this->db->get();
        //print_r($query);
        return $query->result();
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
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId', 'barang.gambar'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('barang.aksesBarang', 1);
        $this->db->order_by("promo.persen","DESC");
        $this->db->limit(6);
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
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId', 'barang.gambar'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('barang.aksesBarang', 1);
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
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId', 'barang.gambar'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('category.categoryNama', $category);
        $this->db->where('barang.aksesBarang', 1);
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
        $this->db->where('barang.aksesBarang', 1);
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
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock', 'barang.barangId', 'barang.details', 'barang.stock', 'barang.promoId', 'barang.gambar'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('barang.barangId', $id);
        $this->db->where('barang.aksesBarang', 1);
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
        $this->db->select(array('barang.barangNama', 'brand.brandNama', 'category.categoryNama', 'promo.persen', 'barang.hargaJual', 'barang.stock','barang.barangId', 'barang.gambar'));
        $this->db->from('barang');
        $this->db->join('brand', 'brand.brandId = barang.brandId');
        $this->db->join('category', 'category.categoryId = barang.categoryId');
        $this->db->join('promo', 'promo.promoId = barang.promoId');
        $this->db->where('barang.aksesBarang', 1);
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

    public function deleteProduct($barang, $id){ //ambil dari Transaction_model.php
        $jumlah = $this->db->select('barangId')->from('barang')->where('barangId', $id)->get()->result();
        if(count($jumlah)>=1){
            $this->db->set('aksesBarang', 0);
            $this->db->where('barangId', $id);
            $this->db->where('barangNama', $barang);
            $this->db->where('barang.aksesBarang', 1);
            $query = $this->db->update('barang');
            
            $result = $query;

            if($result){
                return $query;
            }
            else{
                return false;
            }
        }
    }

}

?>