<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class RedirectController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function toCategory(){
        $this->load->view("../views/pages/Kategori.php");
    }
    public function toDetail(){
        getEssential();
        $this->load->view("../views/pages/Detail.php");        
    }
    public function toRegister(){
        $this->load->view("../views/pages/Register.php");
    }

    //Buat kasi subpage tiap pages
    public function getEssential(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['staticnavbarLoggedin'] = $this->load->view('pages/subPages/staticnavbarLoggedin.php',NULL,TRUE);
        $data['staticnavbarUnloggedin'] = $this->load->view('pages/subPages/staticnavbarUnloggedin.php',NULL,TRUE);
        $data['dynamicnavbar'] = $this->load->view('pages/subPages/dynamicnavbar.php',NULL,TRUE);
    }
}



