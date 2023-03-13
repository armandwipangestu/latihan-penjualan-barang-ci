<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getBarang()
    {
        $query = "SELECT `barang`.id_barang, `barang`.nama_barang, `barang`.harga, `barang`.stok, `supplier`.nama_supplier
        FROM barang
        JOIN supplier ON `barang`.id_supplier = `supplier`.id_supplier
        ";

        return $this->db->query($query)->result_array();
    }

    public function getSupplierById($id_supplier)
    {
        $query = "SELECT id_supplier, nama_supplier FROM `supplier` WHERE id_supplier IN (
            SELECT id_supplier FROM barang WHERE id_supplier = $id_supplier
        )";

        return $this->db->query($query)->row_array();
    }
}
