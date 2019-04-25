<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $this->data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->data['sidenavbar'] = $this->load->view('include/sidenavbar.php', NULL, TRUE);
        $this->data['topnavbar'] = $this->load->view('include/topnavbar.php', NULL, TRUE);
        $this->load->model('Carousel_model');
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

    public function ShowProduct(){
        $this->load->view('pages/product.php', $this->data);
    }

}

?>