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

    public function getBarangById($id_barang) {
        $query = "SELECT id_barang, nama_barang FROM `barang` WHERE id_barang IN (
            SELECT id_barang FROM `transaksi` WHERE id_barang = $id_barang
        )";

        return $this->db->query($query)->row_array();
    }

    public function getPembeliById($id_pembeli) {
        $query = "SELECT id_pembeli, nama_pembeli FROM `pembeli` WHERE id_pembeli IN (
            SELECT id_pembeli FROM `transaksi` WHERE id_pembeli = $id_pembeli
        )";

        return $this->db->query($query)->row_array();
    }
}