<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
    public function getTransaksi() {
        $query = "SELECT `transaksi`.id_transaksi, `barang`.nama_barang, `pembeli`.nama_pembeli, `transaksi`.tanggal, `transaksi`.keterangan
            FROM transaksi
            JOIN barang ON `transaksi`.id_barang = `barang`.id_barang
            JOIN pembeli ON `transaksi`.id_pembeli = `pembeli`.id_pembeli
        ";

        return $this->db->query($query)->result_array();
    }
}