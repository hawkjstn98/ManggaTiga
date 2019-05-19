<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class RedirectController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $this->data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->data['staticnavbarLoggedin'] = $this->load->view('pages/subPages/staticnavbarLoggedin.php',NULL,TRUE);
        $this->data['staticnavbarUnloggedin'] = $this->load->view('pages/subPages/staticnavbarUnloggedin.php',NULL,TRUE);
        $this->data['dynamicnavbar'] = $this->load->view('pages/subPages/dynamicnavbar.php',NULL,TRUE);
        $this->data['footer'] = $this->load->view('pages/subPages/footer.php',NULL,TRUE);
        $this->data['card'] = $this->load->view('pages/subPages/card.php',NULL,TRUE);
        
    }
    public function toHome(){
        $this->load->view("../views/pages/home.php",$this->data);
    }
    public function toCategory(){

        $this->load->view("../views/pages/Kategori.php",$this->data);
    }
    public function toDetail($id){
        
        $this->load->model('Product_model');
        $ddata = $this->Product_model->renderDetail($id);
        $this->data['idBarang'] = $id;
        if($ddata){
            $success = true;
            $this->data['produk'] = $ddata;
            $this->load->view("../views/pages/Detail.php",$this->data);     
        }
        else{
            $success = false;
            $data = "Data Couldn't be rendered";
        }
    }

    public function toSearch(){
        $this->load->model('Product_model');
        $searchKey = $_POST['searchItem'];
        $_COOKIE['searchItem'] = null;
        $this->data['produk'] = $this->Product_model->searchbyName($searchKey);
        //print_r($this->data['produk']);
        $this->load->view("../views/pages/Search.php",$this->data);   
    }

    public function toPayment(){
        $this->load->view("../views/pages/Payment.php",$this->data);
    }

    public function toShoppingChart(){
        $this->load->view("../views/pages/ShoppingCart.php",$this->data);
    }
}



