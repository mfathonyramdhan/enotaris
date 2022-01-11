<?php

class M_admin extends CI_Model {

    function data_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_user u');
        $this->db->join('tb_level_user lu', 'u.level_user = lu.id_level');
        $this->db->where('u.id_user', $id_user);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_akun($where, $data)
    {
        return $this->db->update('tb_user', $data, $where);
    }

    function tampil_akun()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_level_user', 'tb_user.level_user = tb_level_user.id_level');
        $query = $this->db->get();
        return $query->result_array();
    }

    function jumlah_akun()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data($number, $offset, $keyword = '')
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_level_user', 'tb_user.level_user = tb_level_user.id_level');
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('nik', $keyword);
            $this->db->or_like('no_hp', $keyword);
        }
        $this->db->limit($number, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function detail_akun($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_level_user', 'tb_user.level_user = tb_level_user.id_level');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_user($data)
	{
		return $this->db->insert('tb_user', $data);
    }
    
    public function hapus_akun($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}