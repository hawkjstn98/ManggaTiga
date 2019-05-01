<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserData_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function InsertUser($data){
        $datarestructure = array(
            "username"=>$data["user"],
            "password"=>hash("sha256",$data["pass"]),
            "namaDepan"=>$data["fname"],
            "namaBelakang"=>$data["lname"],
            "email"=>$data["email"],
            "noHP"=>$data["phone"],
            "saldo"=>0,
            "alamat"=>$data["address"],
            "tipeUser"=>2,
            "shoppingCart"=>"Not Available Yet"
        );
        $result = $this->db->insert('user', $datarestructure);
        return $result;
    }
}