<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin extends CI_Controller {
    public function index() {
        $data['title'] = "Dashboard Admin";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
}