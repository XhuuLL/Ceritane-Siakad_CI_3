<?php
class DosenWaliModel extends CI_Model {

    public function get_all_wali() {
        $this->db->select('tb_dosen_wali.*, tb_dosen.nama as nama_dosen, tb_mhs.nama as nama_mhs');
        $this->db->from('tb_dosen_wali');
        $this->db->join('tb_dosen', 'tb_dosen.nidn = tb_dosen_wali.nidn');
        $this->db->join('tb_mhs', 'tb_mhs.nim = tb_dosen_wali.nim');
        return $this->db->get()->result();
    }

    public function input_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($where, $data, $table) {
    $this->db->where($where);
    $this->db->update($table, $data);
}

public function get_wali_by_id($id) {
    return $this->db->get_where('tb_dosen_wali', array('id_wali' => $id))->row();
}
    public function get_dosen() {
        return $this->db->get('tb_dosen')->result();
    }
    public function get_mhs() {
        return $this->db->get('tb_mhs')->result();
    }
}