<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['title'] = "Dashboard Barang";
        $data['suppliers'] = $this->db->get('supplier')->result_array();
        $this->load->model("Barang_model", "barang");
        $data['barang'] = $this->barang->getBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('supplier', 'Nama Supplier', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Barang Gagal Ditambahkan!</div>');
            redirect('barang');
        } else {
            $data = [
                'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'stok' => htmlspecialchars($this->input->post('stok', true)),
                'id_supplier' => htmlspecialchars($this->input->post('supplier', true)),
            ];

            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Barang Baru Berhasil Ditambahkan!</div>');
            redirect('barang');
        }
    }

    public function edit()
    {
        $id_barang = $this->uri->segment(3);
        $query = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
        $data['barang'] = $query;

        $this->load->model('Barang_model', 'barang');
        $data['supplier'] = $this->barang->getSupplierById($data['barang']['id_supplier']);

        $data['suppliers'] = $this->db->get('supplier')->result_array();

        $data['title'] = "Edit Barang";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('barang/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('supplier', 'Nama Supplier', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Barang Gagal Diubah!</div>');
            redirect('barang/edit/' . $this->input->post('id_barang'));
        } else {
            $data = [
                'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'stok' => htmlspecialchars($this->input->post('stok', true)),
                'id_supplier' => htmlspecialchars($this->input->post('supplier', true)),
            ];

            $this->db->where('id_barang', $this->input->post('id_barang'));
            $this->db->update('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Barang Berhasil Diubah!</div>');
            redirect('barang/edit/' . $this->input->post('id_barang'));
        }
    }
}
