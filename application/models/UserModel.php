<?php

class UserModel extends CI_Model {

    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function simpan_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}