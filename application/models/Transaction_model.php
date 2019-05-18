<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model{

    public function getTransactions(){
        $this->db->select(array('transaction.transactionId', 'user.namaDepan', 'user.namaDepan', 'barang.barangNama', 'transaction_detail.barangHarga', 'transaction_detail.jumlah'));
        $this->db->from('transaction');
        $this->db->join('user', 'user.userId = transaction.userId');
        $this->db->join('barang', 'barang.Id = transaction_detail.barangId');
        $this->db->join('transaction_detail', 'transaction.transcationId = transaction_detail.transactionId');
        $query = $this->db->get();
        return $query->result();
    }

}

?>