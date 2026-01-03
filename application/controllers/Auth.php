<?php

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('loginview');
    } 

    public function registrasi() {
        $this->load->view('registrasiview');
    }

    public function aksi_login()
    {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $where = array(
        'username' => $username,
        'password' => $password
    );

    $query = $this->UserModel->cek_login("users", $where);
    if($query->num_rows() > 0){
        $user_data = $query->row();

        $data_session = array(
            'id'       => $user_data->id, 
            'username' => $user_data->username,
            'status'   => "login"
        );

        $this->session->set_userdata($data_session);

        redirect(base_url("Admin"));
    } else {
        $this->session->set_flashdata('error', 'Username atau Password salah!');
        redirect(base_url('auth'));
    }
}

    public function aksi_registrasi() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registrasiview');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'status'   => 'aktif'
            );

            $this->UserModel->simpan_data("users", $data);
            $this->session->set_flashdata('message', 'Registrasi Berhasil! Silakan Login.');

            redirect(base_url('auth'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}