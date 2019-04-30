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
    }

    public function index(){

        $this->load->view('pages/cms.php', $this->data);
    }

    public function BannerConfig(){
        $this->custom['bannerJs'] = true;
        $this->custom['carouseldata'] = $this->Carousel_model->getCarousel();
        $this->data['bannercustomjs'] = $this->load->view('include/customJS.php',$this->custom, TRUE);
        $this->load->view('pages/bannerConf.php', $this->data);
    }

    public function NewProduct(){
        $this->data['brand'] = $this->Product_model->getBrands();
        $this->data['category'] = $this->Product_model->getCategories();
        $this->data['blankbegone'] = $this->load->view('include/blankoptionremover.php', NULL, TRUE);
        $this->load->view('pages/newproduct.php', $this->data);
    }

    public function InsertProduct(){
        
    }

    public function NewBrand(){
        $this->load->view('pages/newbrand.php', $this->data);
    }

    public function InsertBrand(){

    }

    public function ListProduct(){
        // $dat = json_decode($this->Product_model->getProducts());
        // $this->data['product'] = array(
        //     'barangNama' => $dat->barangNama,
        //     'brandNama' => $dat->brandNama,
        //     'categoryNama' => $dat->categoryNama,
        //     'persen' => $dat->persen,
        //     'hargaJual' => $dat->hargaJual,
        //     'stock' => $dat->stock
        // );
        $this->data['product'] = $this->Product_model->getProducts();
        $this->load->view('pages/listproduct.php', $this->data);
    }

    public function UploadBanner(){
        $this->load->model('Uploadbanner_model');
        $config["upload_path"] = "./assets/carousel";
        $config["allowed_types"] = "png|jpg|jpeg";
        $config["encrypt_name"] = TRUE;
        //echo json_encode("ShoppingChart");
        $this->load->library('upload',$config);

//        $proses = $this->upload->do_upload('imageUpload');
//        if($proses) {
//            print_r($this->upload->data());
//        } else {
//            print_r($this->upload->display_error());
//        }


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
            $rd = "Ooops somehing went wrong with data";
        }
        echo json_encode(array("success"=>$rs, "data"=>$rd));
    }
}

?>