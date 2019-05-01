<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Carousel_model');

    }

    public function index(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['staticnavbarLoggedin'] = $this->load->view('pages/subPages/staticnavbarLoggedin.php',NULL,TRUE);
        $data['staticnavbarUnloggedin'] = $this->load->view('pages/subPages/staticnavbarUnloggedin.php',NULL,TRUE);
        $res['carouseldata'] = $this->Carousel_model->getCarousel();
        $data['dynamicnavbar'] = $this->load->view('pages/subPages/dynamicnavbar.php',NULL,TRUE);
        $data['carousel'] = $this->load->view('pages/subPages/carousel.php',$res,TRUE);
        $data['card'] = $this->load->view('pages/subPages/card.php',NULL,TRUE);
        $data['footer'] = $this->load->view('pages/subPages/footer.php',NULL,TRUE);
        if(!$this->session->userdata('email')){
            $data['user'] = null;
        }
        else{
            $data['user'] = true;
        }
        $this->load->view('pages/home.php', $data);
        //print_r($res);
    }

    public function getData(){
        $usn = $this->input->POST('username');

    }


    public function getCarouselData(){

    }



}