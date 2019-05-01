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
    public function toDetail(){
        $this->load->view("../views/pages/Detail.php",$this->data);        
    }
    public function toRegister(){
        $this->load->view("../views/pages/Register.php",$this->data);
    }
    public function toShoppingChart(){
        $this->data['emptycart'] = $this->load->view('pages/subPages/emptyCart.php',NULL,TRUE);
        $this->data['filledcart'] = $this->load->view('pages/subPages/filledCart.php',NULL,TRUE);
        $this->load->view("../views/pages/ShoppingCart.php",$this->data);
    }
}



