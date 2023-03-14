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
        $data['user'] = $this->db->get_where('petugas', ['user_name' => $this->session->userdata('user_name')])->row_array();

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

    public function edit()
    {
        $data['title'] = 'Edit Pembeli';
        $data['user'] = $this->db->get_where('petugas', ['user_name' => $this->session->userdata('user_name')])->row_array();

        $id_pembeli = $this->uri->segment(3);
        $query = $this->db->get_where('pembeli', ['id_pembeli' => $id_pembeli])->row_array();

        $data['pembeli'] = $query;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('pembeli/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Pembeli Gagal Diubah!</div>');
            redirect('pembeli/edit/' . $this->input->post('id_pembeli'));
        } else {
            $data = [
                'nama_pembeli' => htmlspecialchars($this->input->post('nama_pembeli', TRUE)),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', TRUE)),
                'no_telepon' => htmlspecialchars($this->input->post('no_telepon', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            ];

            $this->db->where('id_pembeli', $this->input->post('id_pembeli'));
            $this->db->update('pembeli', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Pembeli Berhasil Diubah!</div>');
            redirect('pembeli/edit/' . $this->input->post('id_pembeli'));
        }
    }

    public function delete()
    {
        $id_pembeli = $this->uri->segment(3);
        $this->db->where('id_pembeli', $id_pembeli);
        $this->db->delete('pembeli');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Pembeli Berhasil Dihapus!</div>');
        redirect('pembeli');
    }
}
