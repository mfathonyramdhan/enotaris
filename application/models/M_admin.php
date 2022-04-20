<?php

class M_admin extends CI_Model
{

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

    public function tambah_akta_tanah($data)
    {
        return $this->db->insert('tb_permohonan', $data);
    }

    function tampil_akta_user()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $array = array('pemohon' => $this->session->userdata('id_user'), 'jenis_permohonan' => 1);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }

    function jumlah_akta_user()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $array = array('pemohon' => $this->session->userdata('id_user'), 'jenis_permohonan' => 1);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data_akta_user($number, $offset, $keyword = '')
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $array = array('pemohon' => $this->session->userdata('id_user'), 'jenis_permohonan' => 1);
        $this->db->where($array);
        if (!empty($keyword)) {
            $this->db->like('tgl_permohonan', $keyword);
            $this->db->or_like('kode_permohonan', $keyword);
        }
        $this->db->limit($number, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_user($title)
    {
        $this->db->like('nama', $title);
        $this->db->where("level_user != '1'");
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_user')->result();
    }

    function tampil_akta_admin()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $this->db->where('jenis_permohonan', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function jumlah_akta_admin()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $this->db->where('jenis_permohonan', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data_akta_admin($number, $offset, $keyword = '')
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $this->db->where('jenis_permohonan', 1);
        if (!empty($keyword)) {
            $this->db->like('tgl_permohonan', $keyword);
            $this->db->or_like('kode_permohonan', $keyword);
        }
        $this->db->limit($number, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function cek_dokumen($kode_permohonan)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $this->db->join('tb_jenis_permohonan', 'p.jenis_permohonan = tb_jenis_permohonan.id_jenis_permohonan');
        $this->db->where('kode_permohonan', $kode_permohonan);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_aktaT($where, $data)
    {
        return $this->db->update('tb_permohonan', $data, $where);
    }

    function get_reminder()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $this->db->join('tb_jenis_permohonan', 'p.jenis_permohonan = tb_jenis_permohonan.id_jenis_permohonan');
        $this->db->where('status_permohonan', 4);
        $this->db->order_by('deadline', 'ASC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
}
