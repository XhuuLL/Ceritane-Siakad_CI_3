<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaC extends CI_Controller {

    // --- TAMBAHKAN BAGIAN INI (CONSTRUCT) ---
    public function __construct()
    {
        parent::__construct();
        // Load model di sini agar bisa dipakai oleh index, aksi, hapus, dan update
        $this->load->model('MahasiswaModel');
    }
    // ----------------------------------------

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/notif');

        // Baris load model di sini sudah dihapus karena sudah ada di __construct
        
        $data['mahasiswa'] = $this->MahasiswaModel->get_data();

        $this->load->view('MahasiswaView', $data);
    }

    public function aksi()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'alamat' => $alamat
        );

        $this->MahasiswaModel->input_data($data, 'tb_mhs');
        redirect('MahasiswaC/index');
    }

    public function hapus($nim)
    {
        $where = array('nim' => $nim);
        $this->MahasiswaModel->hapus_data($where, 'tb_mhs');
        redirect('MahasiswaC/index');
    }

    public function update()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat
        );

        $where = array('nim' => $nim);
        
        $this->MahasiswaModel->update_data($where, $data, 'tb_mhs');
        redirect('MahasiswaC/index');
    }
}