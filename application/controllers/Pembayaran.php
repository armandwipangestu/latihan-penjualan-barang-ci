<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Dashboard Pembayaran";
        $data['transaksis'] = $this->db->get('transaksi')->result_array();
        $this->load->model("Pembayaran_model", "pembayaran");
        $data['pembayaran'] = $this->pembayaran->getPembayaran();

        $this->load->view("templates/header", $data);
        $this->load->view("templates/navbar");
        $this->load->view("pembayaran/index", $data);
        $this->load->view("templates/footer");
    }

    public function create()
    {
        $this->form_validation->set_rules('tanggal_bayar', 'Tanggal Bayar', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');
        $this->form_validation->set_rules('transaksi', 'ID Transaksi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Pembayaran Gagal Ditambahkan!</div>');
            redirect('pembayaran');
        } else {
            $data = [
                'tanggal_bayar' => htmlspecialchars($this->input->post('tanggal_bayar'), true),
                'total_bayar' => htmlspecialchars($this->input->post('total_bayar'), true),
                'id_transaksi' => htmlspecialchars($this->input->post('transaksi'), true),
            ];

            $this->db->insert('pembayaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Pembayaran Baru Berhasil Ditambahkan!</div>');
            redirect('pembayaran');
        }
    }
}
