<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        if (!$this->session->userdata('id')) {
            redirect('Auth');
        }
    }

    public function ganti_password() {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/notif');
        $this->load->view('setting/ganti_password');
        $this->load->view('templates/footer');
    }

    public function aksi_update_password() {
        $id = $this->session->userdata('id'); 
        $pass_baru = $this->input->post('pass_baru');
        $konfirmasi = $this->input->post('konfirmasi_pass');

        if ($pass_baru !== $konfirmasi) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak cocok!');
            redirect('SettingC/ganti_password');
        }
        $data = array(
            'password' => $pass_baru 
        );

        $where = array('id' => $id); 
        
        $this->UserModel->update_data($where, $data, 'users');

        $this->session->set_flashdata('success', 'Password berhasil diperbarui!');
        redirect('SettingC/ganti_password');
    }
}