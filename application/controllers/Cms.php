<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $this->data['chart'] = $this->load->view('include/chart.php', NULL, TRUE);
        $this->data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->data['sidenavbar'] = $this->load->view('include/sidenavbar.php', NULL, TRUE);
        $this->data['topnavbar'] = $this->load->view('include/topnavbar.php', NULL, TRUE);
        $this->load->model('Carousel_model');
        $this->load->model('Product_model');
        $this->load->model('Transaction_model');

        if($this->session->userdata('user')=='ADMINISTRATORMWB'){
            //$this->load->view('pages/cms.php', $this->data);
            $this->data['logged'] = true;
        }
        else{
            $this->data['logged'] = false;
            echo "ACCESS DENIED";
        }
    }

    public function index(){
        // if($this->session->userdata('user')=='ADMINISTRATORMWB'){
        if($this->data['logged']){
            $this->load->view('pages/cms.php', $this->data);
        }
        // }
        // else{
        //     echo "ACCESS DENIED";
        // }
    }

    public function BannerConfig(){
        if($this->data['logged']){
            $this->custom['customJs'] = 'banner';
            $this->custom['carouseldata'] = $this->Carousel_model->getCarousel();
            $this->data['bannercustomjs'] = $this->load->view('include/customJS.php',$this->custom, TRUE);
            $this->load->view('pages/bannerConf.php', $this->data);
        }
    }

    public function NewProduct(){
        if($this->data['logged']){
            $this->custom['customJs'] = 'newproduct';
            $this->data['brand'] = $this->Product_model->getBrands();
            $this->data['category'] = $this->Product_model->getCategories();
            $this->data['blankbegone'] = $this->load->view('include/customJS.php', $this->custom, TRUE);
            $this->load->view('pages/newproduct.php', $this->data);
        }
    }

    public function InsertProduct(){
        if($this->data['logged']){
            $name = $this->input->post('ProductName');
            $brand = $this->input->post('Brand');
            $category = $this->input->post('Category');
            $detail = $this->input->post('Detail');
            $qty = $this->input->post('QuantityPerUnit');
            $price = $this->input->post('Price');
            $data = array(
                'barangNama' => $name,
                'details' => $detail,
                'categoryId' => $category,
                'brandId' => $brand,
                'hargaJual' => $price,
                'stock' => $qty,
                'promoId' => 1
            );
            $model = $this->Product_model->newProduct($data);

            $this->load->model('Uploadpicture_model');
            $config["upload_path"] = "./assets/images/" . $this->getCategoryName($category);
            $config["allowed_types"] = "png|jpg|jpeg";
            $config["encrypt_name"] = TRUE;
            $this->load->library('upload', $config);

            if($this->upload->do_upload('imageUpload')){
                $data = array('upload_data' => $this->upload->data());
                //$brandId = $this->input->post('description');
                $img = $data['upload_data']['file_name'];
                $imgstr = "/assets/images/" . $this->getCategoryName($category) . "/" . $img;
                $res = $this->Uploadpicture_model->uploadImage($brand, $imgstr);
                $rs = true;
                $rd = $res;
            }
            else{
                $rs = false;
                $rd = "Ooops somehing went wrong with the data";
            }
            echo json_encode(array("success"=>true, "data"=>$model));
        }
    }

    public function UpdateProduct(){
        if($this->data['logged']){
            $brand = $this->input->post('barangId');
            $price = $this->input->post('hargaJual');
            $promo = $this->input->post('promoId');
            $stock = $this->input->post('stock');
            $akses = $this->input->post('akses');
            $data = array(
                'brandId' => $brand,
                'hargaJual' => $price,
                'stock' => $stock,
                'promoId' => $promo,
                'aksesBarang' => $akses
            );
            $model = $this->Product_model->updateProduct($data);

            // $this->load->model('Uploadpicture_model');
            // $config["upload_path"] = "./assets/images/" . $this->getCategoryName($category);
            // $config["allowed_types"] = "png|jpg|jpeg";
            // $config["encrypt_name"] = TRUE;
            // $this->load->library('upload', $config);

            // if($this->upload->do_upload('imageUpload')){
            //     $data = array('upload_data' => $this->upload->data());
            //     //$brandId = $this->input->post('description');
            //     $img = $data['upload_data']['file_name'];
            //     $imgstr = "/assets/images/" . $this->getCategoryName($category) . "/" . $img;
            //     $res = $this->Uploadpicture_model->uploadImage($brand, $imgstr);
            //     $rs = true;
            //     $rd = $res;
            // }
            // else{
            //     $rs = false;
            //     $rd = "Ooops somehing went wrong with the data";
            // }
            // echo json_encode(array("success"=>true, "data"=>$model));
        }
    }

    public function getEditDetails(){
        if($this->data['logged']){
            $barangId = $this->input->post('idBarang');
            $detail = $this->Product_model->editModalProduct($barangId);
            //print_r($detail);
    
            echo json_encode($detail);
        }
    }

    public function getBrandName($brandID){
        foreach($this->Product_model->getBrands() as $brands){
            if($brands->brandId == $brandID) return $brands->brandNama;
        }
    }

    public function getCategoryName($categoryID){
        foreach($this->Product_model->getCategories() as $categories){
            if($categories->categoryId == $categoryID) return $categories->categoryNama;
        }
    }

    public function NewBrand(){
        if($this->data['logged']){
            $this->custom['customJs'] = 'newbrand';
            $this->data['blankbegone'] = $this->load->view('include/customJS.php', $this->custom, TRUE);
            $this->load->view('pages/newbrand.php', $this->data);
        }
    }

    public function InsertBrand(){
        if($this->data['logged']){
            $name = $this->input->post('BrandName');
            $model = $this->Product_model->newBrand($name);
            echo json_encode(array("success"=>true, "data"=>$model));
        }
    }

    public function ListProduct(){
        if($this->data['logged']){
            $this->data['product'] = $this->Product_model->getProducts();
            $this->data['promo'] = $this->Product_model->getPromo();
            $this->load->view('pages/listproduct.php', $this->data);
        }
    }
    
    public function DeleteProduct(){
        if($this->data['logged']){
            $id = $this->input->post('id');
            $barang = $this->input->post('barang');
            $res = $this->Product_model->deleteProduct($barang, $id);
            if($res){
                $rs = true;
                $rt = "Delete Success";
            }else{
                $rs = false;
                $rt = "Delete Failed";
            }
            echo json_encode(array("success"=>$rs, "data"=>$rt));
        }
    }

    public function ListTransaction(){
        if($this->data['logged']){
            $this->data['transaction'] = $this->Transaction_model->getTransactions();
            $this->load->view('pages/listtransaction.php', $this->data);
        }
    }

    public function DeleteTransaction(){
        if($this->data['logged']){
            $id = $this->input->post('id');
            $barang = $this->input->post('barang');
            $res = $this->Transaction_model->deleteTransaction($barang, $id);
            if($res){
                $rs = true;
                $rt = "Delete Success";
            }else{
                $rs = false;
                $rt = "Delete Failed";
            }
            echo json_encode(array("success"=>$rs, "data"=>$rt));
        }
    }

    public function UploadBanner(){
        if($this->data['logged']){
            $this->load->model('Uploadbanner_model');
            $config["upload_path"] = "./assets/carousel";
            $config["allowed_types"] = "png|jpg|jpeg";
            $config["encrypt_name"] = TRUE;
            //echo json_encode("ShoppingChart");
            $this->load->library('upload',$config);

        //    $proses = $this->upload->do_upload('imageUpload');
        //    if($proses) {
        //        print_r($this->upload->data());
        //    } else {
        //        print_r($this->upload->display_error());
        //    }


            if($this->upload->do_upload('imageUpload')){
                $data = array('upload_data' => $this->upload->data());
                $desc = $this->input->post('description');
                $img = $data['upload_data']['file_name'];
                $imgstr = "/assets/carousel/".$img;
                $res = $this->Uploadbanner_model->uploadImage($desc, $imgstr);
                $rs = true;
                $rd = $res;
            }
            else{
                $rs = false;
                $rd = "Ooops somehing went wrong with the data";
            }
            echo json_encode(array("success"=>$rs, "data"=>$rd));
        }
    }

    public function DeleteBanner(){
        if($this->data['logged']){
            $this->load->model("Uploadbanner_model");
            $id = $this->input->post('id');
            $res = $this->Uploadbanner_model->deleteImage($id);
            if($res){
                $rs = true;
                $rt = "Delete Success";
            }else{
                $rs = false;
                $rt = "Delete Failed";
            }
            echo json_encode(array("success"=>$rs, "data"=>$rt));
        }
    }
}

?>