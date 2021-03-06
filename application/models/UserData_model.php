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

    public function tambahKeranjang($name, $harga, $jlh, $user, $id, $path){
        $this->db->select(array('shoppingCart'));
        $this->db->from('user');
        $this->db->where('username', $user);
        $query = $this->db->get();
        $isi = $query->row();
        $hasil='';
        $cart = array();
        if($isi->shoppingCart!='Not Available Yet'){
            $tempcart = json_decode($isi->shoppingCart);
            for($i = 0 ; $i < sizeof($tempcart); $i++){
                array_push($cart, $tempcart[$i]);
            }
            $temp = (array(
                "namaBarang"=>$name,
                "harga"=>$harga,
                "jumlah"=>$jlh,
                "id"=>$id,
                "path"=>$path
            ));
            array_push($cart, $temp);
            $hasil = json_encode($cart);
        }
        else{
            $hasil = json_encode(
                array(array(
                    "namaBarang"=>$name,
                    "harga"=>$harga,
                    "jumlah"=>$jlh,
                    "id"=>$id,
                    "path"=>$path
                ))
            );
        }
        $data = array(
            "shoppingCart" => $hasil
        );
        $this->db->where('username', $user);
        $result = $this->db->update('user', $data);
        // print_r($hasil);
        return $result;
    }

    public function updateUser($fname, $lname, $address, $user, $balance){
        if($fname&&$lname&&$address&&$user){
            $data = array(
                'namaDepan' => $fname,
                'namaBelakang' => $lname,
                'alamat'=>$address,
                'saldo'=>$balance
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
        $id = $this->getUserId();
        $this->db->select(array('transaction.waktu','transaction.transactionId','barang.barangNama','transaction_detail.barangHarga', 'transaction_detail.jumlah'));
        $this->db->from('transaction');
        $this->db->join('user', 'user.userId = transaction.userId');
        $this->db->join('transaction_detail', 'transaction_detail.transactionId = transaction.transactionId');
        $this->db->join('barang', 'barang.barangId = transaction_detail.barangId');
        $this->db->order_by('transaction.transactionId','DESC');
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

    public function getUserId(){
        $this->db->select('userId');
        $this->db->from('user');
        $this->db->where('username', $this->session->userdata('user'));
        $query = $this->db->get();
        $res = $query->row();
        return $res->userId;
    }

    public function renderCart($username){
        $this->db->select('shoppingCart');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->row();
        if($result){
            return json_decode($result->shoppingCart);
        }
        else{
            return false;
        }
    }

    public function updateCart($data){
        if($data){
            if($data == '[]'){
                $data = 'Not Available Yet';
            }
            $this->db->set('shoppingCart', $data);
            $this->db->where('username', $this->session->userdata('user'));
            $this->db->update('user');
            return true;
        }
        else{
            return false;
        }
    }

    public function confirmTransaction($cart, $total){
//        $cart = array_unique($cart);
        $id = $this->getUserId();
        $this->load->helper('date');
        $this->balanceReduce($total);
        $datestring = '%Y-%m-%d %h:%m:%s';
        $time = time();
//        $ts = now('	Asia/Jakarta');
        $ts = mdate($datestring, $time);
        $data = array(
          "userId"=>$id,
            "waktu"=>$ts,
            "status"=>0
        );
        $this->db->insert('transaction', $data);
        $tid = $this->getTransactionId($ts);
        for($i = 0 ; $i < sizeof($cart); $i++){
            $dataCart = array(
                "transactionId"=>$tid,
                "barangId"=>$cart[$i]->id,
                "barangHarga"=>$cart[$i]->harga,
                "jumlah"=>$cart[$i]->jumlah
            );
            $this->db->insert('transaction_detail', $dataCart);
            $this->amountReduce($cart[$i]->jumlah, $cart[$i]->id);
        }
        return true;
    }

    public function getTransactionId($time){
        $this->db->select('transactionId');
        $this->db->from('transaction');
        $this->db->where('waktu',$time);
        $query = $this->db->get();
        $res = $query->row();
        return $res->transactionId;
    }
    public function balanceReduce($total){
        $this->db->set('saldo', 'saldo - '.$total, false);
        $this->db->where('username', $this->session->userdata('user'));
        $this->db->update('user');
    }
    public function amountReduce($amount, $id){
        $this->db->set('stock', 'stock - '.$amount, false);
        $this->db->where('barangId', $id);
        $this->db->update('barang');
    }
    public function emptyCart(){
        $this->db->set('shoppingCart', 'Not Yet Available');
        $this->db->where('username', $this->session->userdata('user'));
        $this->db->update('user');
        return true;
    }

}