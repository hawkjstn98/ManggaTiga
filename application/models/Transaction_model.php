<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model{

    public function getTransactions(){
        $this->db->select(array('transaction_detail.barangId', 'transaction.transactionId', 'user.namaDepan', 'user.namaBelakang', 'barang.barangNama', 'transaction_detail.barangHarga', 'transaction_detail.jumlah'));
        $this->db->from('transaction');
        $this->db->join('user', 'user.userId = transaction.userId');
        $this->db->join('transaction_detail', 'transaction_detail.transactionId = transaction.transactionId');
        $this->db->join('barang', 'barang.barangId = transaction_detail.barangId');
        $query = $this->db->get();
        $result = $query->result();
        if($result){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function deleteTransaction($barang, $id){
        $jumlah = $this->db->select('transactionId')->from('transaction_detail')->where('transactionId', $id)->get()->result();
        if(count($jumlah)>1){
            $this->db->where('transactionId', $id);
            $this->db->where('barangId', $barang);
            $query = $this->db->delete('transaction_detail');

            $result = $query->result();
            if($result){
                return $query->result();
            }
            else{
                return false;
            }
        }
        else if(count($jumlah)>=1){
            $this->db->where('transactionId', $id);
            $query1 = $this->db->delete('transaction_detail');

            $result = $query1;
            if($result){
                $query2 = $this->db->delete('transaction', array('transactionId' => $id));
                $result = $query2;
                if($result){
                    return $query2;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

}

?>