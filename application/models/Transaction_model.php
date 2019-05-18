<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model{

    public function getTransactions(){
        $this->db->select(array('transaction.transactionId', 'user.namaDepan', 'user.namaBelakang', 'barang.barangNama', 'transaction_detail.barangHarga', 'transaction_detail.jumlah'));
        $this->db->from('transaction');
        $this->db->join('user', 'user.userId = transaction.userId');
        $this->db->join('transaction_detail', 'transaction_detail.transactionId = transaction.transactionId');
        $this->db->join('barang', 'barang.barangId = transaction_detail.barangId');
        $query = $this->db->get();
        return $query->result();
    }

}

?>