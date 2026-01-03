<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DosenWaliC extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DosenWaliModel');
        if (!$this->session->userdata('id')) {
            redirect('Auth');
        }
    }

    public function index() {
        $data['wali'] = $this->DosenWaliModel->get_all_wali();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/notif');
        $this->load->view('DosenWaliView', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['dosen'] = $this->DosenWaliModel->get_dosen();
        $data['mhs']   = $this->DosenWaliModel->get_mhs();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/notif');
        $this->load->view('tambah_wali', $data); 
        $this->load->view('templates/footer');
    }

    public function aksi_tambah() {
        $data = array(
            'nidn'           => $this->input->post('nidn'),
            'nim'            => $this->input->post('nim'),
            'tahun_akademik' => $this->input->post('tahun_akademik'),
            'status'         => $this->input->post('status')
        );

        $this->DosenWaliModel->input_data($data, 'tb_dosen_wali');
        $this->session->set_flashdata('success', 'Plotting Dosen Wali berhasil disimpan!');
        redirect('DosenWaliC/index');
    }

    public function edit($id) {
    $where = array('id_wali' => $id);
    $data['wali'] = $this->DosenWaliModel->get_wali_by_id($id);
    $data['dosen'] = $this->DosenWaliModel->get_dosen();
    $data['mhs']   = $this->DosenWaliModel->get_mhs();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/notif');
    $this->load->view('edit_wali', $data); 
    $this->load->view('templates/footer');
}

public function aksi_update() {
    $id = $this->input->post('id_wali');
    $data = array(
        'nidn'           => $this->input->post('nidn'),
        'nim'            => $this->input->post('nim'),
        'tahun_akademik' => $this->input->post('tahun_akademik'),
        'status'         => $this->input->post('status')
    );

    $where = array('id_wali' => $id);
    $this->DosenWaliModel->update_data($where, $data, 'tb_dosen_wali');
    
    $this->session->set_flashdata('success', 'Data bimbingan berhasil diperbarui!');
    redirect('DosenWaliC/index');
}

    public function hapus($id) {
        $where = array('id_wali' => $id);
        $this->DosenWaliModel->hapus_data($where, 'tb_dosen_wali');
        redirect('DosenWaliC/index');
    }
}