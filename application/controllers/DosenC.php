<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DosenC extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DosenModel');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['dosen'] = $this->DosenModel->get_data();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/notif');
        $this->load->view('DosenView', $data);
    }

    public function tambahdosen()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/notif');
        $this->load->view('tambahdosen');
    }

    public function aksi_tambah()
    {
        $nidn    = $this->input->post('nidn');
        $nama    = $this->input->post('nama');
        $alamat  = $this->input->post('alamat');
        $telepon = $this->input->post('telp');
        $email   = $this->input->post('email');
        
        $foto = 'default.jpg'; 
        
        if ($_FILES['foto']['name']) { 
            // Folder disesuaikan untuk dosen
            $config['upload_path']   = FCPATH . 'public/img/dosen/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; 

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal: " . $this->upload->display_errors(); die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nidn'   => $nidn,
            'nama'   => $nama,
            'alamat' => $alamat,
            'telp'   => $telepon,
            'email'  => $email,
            'foto'   => $foto
        );

        $this->DosenModel->input_data($data, 'tb_dosen');
        redirect('DosenC/index');
    }

    public function update()
    {
        $nidn    = $this->input->post('nidn');
        $nama    = $this->input->post('nama');
        $alamat  = $this->input->post('alamat');
        $telepon = $this->input->post('telp');
        $email   = $this->input->post('email');

        $data = array(
            'nama'   => $nama,
            'alamat' => $alamat,
            'telp'   => $telepon,
            'email'  => $email
        );

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = FCPATH . 'public/img/dosen/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $foto_baru = $this->upload->data('file_name');
                $data['foto'] = $foto_baru;
            } else {
                echo "Upload Gagal: " . $this->upload->display_errors(); die();
            }
        }

        $where = array('nidn' => $nidn);
        $this->DosenModel->update_data($where, $data, 'tb_dosen');
        redirect('DosenC/index');
    }

    public function hapus($nidn)
    {
        $where = array('nidn' => $nidn);
        $this->DosenModel->hapus_data($where, 'tb_dosen');
        redirect('DosenC/index');
    }

    public function editdosen($nidn)
    {
        $data['dosen'] = $this->DosenModel->get_data_by_nidn($nidn); 

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/notif');
        $this->load->view('editdosen', $data);
    }

    public function detail($nidn)
    {
        $detail = $this->DosenModel->detail_data($nidn);
        $data['detail'] = $detail;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar'); 
        $this->load->view('templates/notif');
        $this->load->view('detaildosen', $data);
    }
}