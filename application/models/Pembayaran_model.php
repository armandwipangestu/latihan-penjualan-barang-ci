<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    public function getPembayaran()
    {
        $query = "SELECT `pembayaran`.id_pembayaran, `pembayaran`.tanggal_bayar, `pembayaran`.total_bayar, 
            `transaksi`.id_transaksi FROM pembayaran JOIN transaksi ON `pembayaran`.id_transaksi = `transaksi`.id_transaksi
        ";

        return $this->db->query($query)->result_array();
    }

    public function getTransaksiById($id_transaksi)
    {
        $query = "SELECT id_transaksi, id_barang, id_pembeli, tanggal, keterangan FROM `transaksi` WHERE id_transaksi IN (
            SELECT id_transaksi FROM pembayaran WHERE id_transaksi = $id_transaksi
        )";

        return $this->db->query($query)->row_array();
    }
}
