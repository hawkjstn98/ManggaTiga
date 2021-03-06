<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carousel_model');
        $this->data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $this->data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->data['staticnavbarLoggedin'] = $this->load->view('pages/subPages/staticnavbarLoggedin.php',NULL,TRUE);
        $this->data['staticnavbarUnloggedin'] = $this->load->view('pages/subPages/staticnavbarUnloggedin.php',NULL,TRUE);
        $this->res['carouseldata'] = $this->Carousel_model->getCarousel();
        $this->data['dynamicnavbar'] = $this->load->view('pages/subPages/dynamicnavbar.php',NULL,TRUE);
        $this->data['carousel'] = $this->load->view('pages/subPages/carousel.php',$this->res,TRUE);
        $this->data['card'] = $this->load->view('pages/subPages/card.php',NULL,TRUE);
        $this->data['cardArrival'] = $this->load->view('pages/subPages/cardArrival.php',NULL,TRUE);
        $this->data['footer'] = $this->load->view('pages/subPages/footer.php',NULL,TRUE);
        $this->custom['customJs'] = 'home';
        $this->data['customJS'] = $this->load->view('include/customJS.php',$this->custom, TRUE);
        if(empty($this->session->has_userdata('user'))){
            $this->data['user'] = false;
        }
        else{
            $this->data['user'] = true;
        }
    }

    public function index(){
        $this->load->view('pages/home.php', $this->data);
    }

    public function getData(){
        $usn = $this->input->POST('username');

    }

    public function LoginConfirm(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required", "{field} is required");
        $this->form_validation->set_message("valid_email", "Plase enter valid email Address");

        $this->load->model('UserData_model');

        if($this->form_validation->run()){
            $data = array("email"=>$email, "password"=>$password);
            $res = $this->UserData_model->Login($data);
            if($res){
                $success = true;
                $data = "Login Success";
                $this->data['user'] = true;
            }
            else{
                $success = false;
                $data = "Email or password wrong";
            }
        }else{
            $success = false;
            $data = "Please Check Your Input !";
            $formerr = $this->load->view("pages/home.php",$this->data, TRUE);
        }
        echo json_encode(array(
            "success"=>$success,
            "data"=>$data,
            "formerror"=>isset($formerr) ? $formerr : null));
    }

    public function Logout(){
        $this->session->unset_userdata('user');
        echo "You have been logged out!";
    }

    public function getCarouselData(){

    }

    public function RenderProductData(){
        $this->load->model('Product_model');
        $pdata = $this->Product_model->renderRecommend();
        if($pdata){
            $success = true;
            $data = $pdata;
        }
        else{
            $success = false;
            $data = "Data Couldn't be rendered";
        }
        echo json_encode(array(
            "success"=>$success,
            "data"=>$data
        ));
    }

    public function RenderProductDataNew(){
        $this->load->model('Product_model');
        $ndata = $this->Product_model->renderNewArrival();
        if($ndata){
            $success = true;
            $data = $ndata;
        }
        else{
            $success = false;
            $data = "Data Couldn't be rendered";
        }
        echo json_encode(array(
            "success"=>$success,
            "data"=>$data
        ));
    }

    public function InputToCart(){
        if($this->data['user']){
            $this->load->model('UserData_model');
            $name = $this->input->post('name');
            $hargaBarang = $this->input->post('harga');
            $jumlahBarang = $this->input->post('jumlah');
            $user = $this->session->userdata('user');
            $path = $this->input->post('imagePath');
            $id = $this->input->post("id");
            $adata = $this->UserData_model->tambahKeranjang($name, $hargaBarang, $jumlahBarang, $user, $id, $path);
            if($adata){
                $success = true;
                $data = $adata;
            }
            else{
                $success = false;
                $data = "Data Couldn't be rendered";
            }
            echo json_encode(array(
                "success"=>$success,
                "data"=>$data
            ));
        }
        else{
            echo json_encode(array(
                "success"=>false,
                "data"=>"SessionNotFound"
            ));
        }
    }

}