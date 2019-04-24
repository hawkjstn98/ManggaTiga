<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->load->view('pages/product.php', $data);
    }
}

?>