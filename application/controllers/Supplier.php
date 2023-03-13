<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['title'] = 'Supplier';
        $data['supplier'] = $this->db->get('supplier')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Supplier Gagal Ditambahkan!</div>');
            redirect('supplier');
        } else {
            $data = [
                'nama_supplier' => htmlspecialchars($this->input->post('nama_supplier')),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
            ];

            $this->db->insert('supplier', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Supplier Berhasil Ditambahkan!</div>');
            redirect('supplier');
        }
    }
}
