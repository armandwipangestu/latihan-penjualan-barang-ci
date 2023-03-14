<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Dashboard Admin";
        $data['user'] = $this->db->get_where('petugas', ['user_name' => $this->session->userdata('user_name')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
}
