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
        $data['title'] = 'Dashboard Supplier';
        $data['user'] = $this->db->get_where('petugas', ['user_name' => $this->session->userdata('user_name')])->row_array();
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

    public function edit()
    {
        $data['title'] = "Edit Supplier";
        $data['user'] = $this->db->get_where('petugas', ['user_name' => $this->session->userdata('user_name')])->row_array();

        $id_supplier = $this->uri->segment(3);
        $query = $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();

        $data['supplier'] = $query;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('supplier/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Supplier Gagal Diubah!</div>');
            redirect('supplier/edit/' . $this->input->post('id_supplier'));
        } else {
            $data = [
                'nama_supplier' => htmlspecialchars($this->input->post('nama_supplier')),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
            ];

            $this->db->where('id_supplier', $this->input->post('id_supplier'));
            $this->db->update('supplier', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Supplier berhasil diubah!</div>');
            redirect('supplier/edit/' . $this->input->post('id_supplier'));
        }
    }

    public function delete()
    {
        $id_supplier = $this->uri->segment(3);
        $this->db->where('id_supplier', $id_supplier);
        $this->db->delete('supplier');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Supplier berhasil dihapus!</div>');
        redirect('supplier');
    }
}
