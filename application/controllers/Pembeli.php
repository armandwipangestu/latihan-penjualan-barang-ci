<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembeli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Dashboard Pembeli";
        $data['pembeli'] = $this->db->get('pembeli')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('pembeli/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Pembeli Gagal Ditambahkan!</div>');
            redirect('pembeli');
        } else {
            $data = [
                'nama_pembeli' => htmlspecialchars($this->input->post('nama_pembeli', TRUE)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', TRUE)),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            ];

            $this->db->insert('pembeli', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Pembeli Berhasil Ditambahkan!</div>');
            redirect('pembeli');
        }
    }
}
