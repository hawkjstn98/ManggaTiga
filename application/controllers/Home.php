<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['staticnavbarLoggedin'] = $this->load->view('pages/subPages/staticnavbarLoggedin.php',NULL,TRUE);
        $data['dynamicnavbar'] = $this->load->view('pages/subPages/dynamicnavbar.php',NULL,TRUE);
        $data['carousel'] = $this->load->view('pages/subPages/carousel.php',NULL,TRUE);
        $data['card'] = $this->load->view('pages/subPages/card.php',NULL,TRUE);
        $data['footer'] = $this->load->view('pages/subPages/footer.php',NULL,TRUE);
        $this->load->view('pages/home.php', $data);
    }

    public function perKategori(){
        $this->load->view("pages/Kategori.php");
    }
}