<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

//    public function getCategory(){
//        $this->category =  $this->input->POST("category");
//    }

    public function renderCategory(){
        $this->load->model('Product_model');
        $cdata =  $this->Product_model->renderwithCategory($this->input->POST("category"));
        if($cdata){
            $success = true;
            $data = $cdata;
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

}