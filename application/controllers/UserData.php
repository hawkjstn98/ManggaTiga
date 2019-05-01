<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserData extends CI_Controller{
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
        $this->custom['customJs'] = 'register';
        $this->data['customJS'] = $this->load->view('include/customJS.php',$this->custom, TRUE);
    }

    public function UserRegister(){
        $this->load->view("../views/pages/Register.php",$this->data);
    }

    public function Register(){
        $data = array(
            "fname"=>$this->input->post("fname"),
            "lname"=>$this->input->post("lname"),
            "user"=>$this->input->post("user"),
            "email"=>$this->input->post("email"),
            "pass"=>$this->input->post("pass"),
            "address"=>$this->input->post("address"),
            "phone"=>$this->input->post("phone")
        );

        $this->form_validation->set_rules("fname", "Fname", "required");
        $this->form_validation->set_rules("lname", "Lname", "required");
        $this->form_validation->set_rules("user", "Username", "required");
        $this->form_validation->set_rules("email", "Email", "required");
        $this->form_validation->set_rules("pass", "Password", "required");
        $this->form_validation->set_rules("address", "Address", "required");
        $this->form_validation->set_rules("phone", "Phone", "required|is_natural|max_length[20]");
        $this->form_validation->set_message("required", "{field} is required");
        $this->form_validation->set_message("is_natural", "{field} can only consist of numbers (0-9).");
        $this->form_validation->set_message('max_length', '{field} maxmimum number lenth is {param} .');

        if($this->form_validation->run()){
            $this->load->model('UserData_model');
            $res = $this->UserData_model->InsertUser($data);
            if($res){
                $success = true;
                $data = "Register Success, Please Login First !";
            }
            else{
                $success = false;
                $data = "Data Error";
            }
        }
        else{
            $success = false;
            $data = "Please Check Your Input !";
            $formerr = $this->load->view("../views/pages/Register.php",$this->data, TRUE);
        }
        echo json_encode(array(
           "success"=>$success,
           "data"=>$data,
           "formerror"=>isset($formerr) ? $formerr : null
        ));
    }
}