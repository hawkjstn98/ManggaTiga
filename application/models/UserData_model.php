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

    public function Login($data){
        $datarestructure = array(
            "email"=>$data["email"],
            "password"=>hash("sha256",$data["password"])
        );
        $result = $this->db->select("tipeUser")->select("username")->where("email", $datarestructure["email"])->where("password", $datarestructure["password"])->get('user')->row();
        if($result){
            if($result->tipeUser=="1"||$result->tipeUser==1){
                $this->session->set_userdata('user','ADMINISTRATORMWB');
            }else{
                $this->session->set_userdata('user',$result->username);
            }
            return true;
        }
        else{
            return false;
        }
    }

    public function renderUser($user){
        $this->db->select(array('username','namaDepan', 'namaBelakang', 'email', 'noHP', 'saldo', 'alamat'));
        $this->db->from('user');
        $this->db->where('username', $user);
        $query = $this->db->get();

        $result = $query->result();
        if($result){
            return $query->result();
        }
    }

    public function tambahKeranjang($id, $harga, $jlh, $name){
        $this->db->select(array('shoppingCart'));
        $this->db->from('user');
        $this->db->where('username', $name);
        $query = $this->db->get();
        $isi = $query->result();
        $hasil='';
        if($isi){
            $cart = json_decode($isi);
            $cart.append(array(
                "id"=>$id,
                "harga"=>$harga,
                "jumlah"=>$jlh
            ));
            $hasil = json_encode($cart);
        }
        else{
            $hasil = json_encode(
                array(array(
                    "id"=>$id,
                    "harga"=>$harga,
                    "jumlah"=>$jlh
                ))
            );
        }
        $data = array(
            "shoppingCart" => $hasil
        );
        $this->db->where('username', $name);
        $result = $this->db->update('user', $data);
        // print_r($hasil);
        return $result;
    }

    public function updateUser($fname, $lname, $address, $user){
        if($fname&&$lname&&$address&&$user){
            $data = array(
                'namaDepan' => $fname,
                'namaBelakang' => $lname,
                'alamat'=>$address
            );

            $this->db->where('username', $user);
            $this->db->update('user', $data);
            return true;
        }
        else{
            return false;
        }
    }

    public function renderTransaction($usn){
        $id = $this->getUserId($usn);
        $this->db->select(array('transaction.transactionId','barang.barangNama','transaction_detail.barangHarga', 'transaction_detail.jumlah'));
        $this->db->from('transaction');
        $this->db->join('user', 'user.userId = transaction.userId');
        $this->db->join('transaction_detail', 'transaction_detail.transactionId = transaction.transactionId');
        $this->db->join('barang', 'barang.barangId = transaction_detail.barangId');
        $this->db->where('user.userId',$id);
        $query = $this->db->get();
        $result = $query->result();
        if($result){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function getUserId($username){
        $this->db->select('userId');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $res = $query->row();
        return $res->userId;
    }
}