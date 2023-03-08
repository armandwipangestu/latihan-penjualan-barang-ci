<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Transaksi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index() {
        $data['title'] = "Dashboard Transaksi";
        $data['barangs'] = $this->db->get('barang')->result_array();
        $data['pembelis'] = $this->db->get('pembeli')->result_array();
        $this->load->model('Transaksi_model', 'transaksi');
        $data['transaksi'] = $this->transaksi->getTransaksi();

        $this->form_validation->set_rules('barang', "Barang", "trim|required");
        $this->form_validation->set_rules('pembeli', "Pembeli", "trim|required");
        $this->form_validation->set_rules('tanggal', "Tanggal", "trim|required");
        $this->form_validation->set_rules('keterangan', "Keterangan", "trim|required");

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('transaksi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_barang' => htmlspecialchars($this->input->post('barang', true)),
                'id_pembeli' => htmlspecialchars($this->input->post('pembeli', true)),
                'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
            ];

            $this->db->insert('transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Transaksi Baru Berhasil Ditambahkan!</div>');
            redirect('transaksi');
        }
    }
}