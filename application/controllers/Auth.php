<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Masuk Penjualan Barang';
            $this->load->view("templates/header", $data);
            $this->load->view('auth/login');
            $this->load->view("templates/footer");
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['user_name' => $username])->row_array();
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'user_name' => $user['user_name'],
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password yang anda masukan salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Petugas tidak ditemukan</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_name');

        $this->session->set_flashdata('message', '<div class="alert alert-success">Anda telah logout</div>');
        redirect('auth');
    }
}
