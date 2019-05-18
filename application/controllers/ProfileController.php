<?php


class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
        $this->data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $this->data['staticnavbarLoggedin'] = $this->load->view('pages/subPages/staticnavbarLoggedin.php',NULL,TRUE);
        $this->data['staticnavbarUnloggedin'] = $this->load->view('pages/subPages/staticnavbarUnloggedin.php',NULL,TRUE);
        $this->data['dynamicnavbar'] = $this->load->view('pages/subPages/dynamicnavbar.php',NULL,TRUE);
        $this->data['footer'] = $this->load->view('pages/subPages/footer.php',NULL,TRUE);
    }

    public function toProfile(){
        $this->load->view("../views/pages/profile.php",$this->data);
    }
}