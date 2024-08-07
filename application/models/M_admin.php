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

    function editPermohonan($where, $data)
    {
        return $this->db->update('tb_permohonan', $data, $where);
    }

    function getNobulanan($id)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->where('kode_permohonan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_jadwal_pertemuan($user_id)
    {
        $this->db->select('pj.*, u.nama');
        $this->db->from('tb_pertemuan pj');
        $this->db->join('tb_user u', 'u.id_user = pj.user_id');
        $this->db->where('pj.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll_jadwal_pertemuan()
    {
        $this->db->select('pj.*, u.nama');
        $this->db->from('tb_pertemuan pj');
        $this->db->join('tb_user u', 'u.id_user = pj.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hapusDataPengajuanPertemuan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_pertemuan');
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

    function jumlah_user()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('level_user', 2);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jumlah_permohonan()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
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

    function tampil_permohonan_user($jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $array = array('pemohon' => $this->session->userdata('id_user'), 'jenis_permohonan' => $jenis);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result_array();
    }

    function jumlah_permohonan_user($jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $array = array('pemohon' => $this->session->userdata('id_user'), 'jenis_permohonan' => $jenis);
        $this->db->where($array);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data_permohonan_user($number, $offset, $keyword = '', $jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        $array = array('pemohon' => $this->session->userdata('id_user'), 'jenis_permohonan' => $jenis);
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

    function tampil_permohonan_admin($jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        if ($jenis != 'laporan_notaris' && $jenis != 'laporan_ppat') {
            $this->db->where('jenis_permohonan', $jenis);
        } elseif ($jenis == 'laporan_notaris') {
            $this->db->where('jenis_layanan', 'notaris');
        } elseif ($jenis == 'laporan_ppat') {
            $this->db->where('jenis_layanan', 'ppat');
        } elseif ($jenis == 'arsip') {
            $this->db->where('status_permohonan', 5);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function jumlah_permohonan_admin($jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        if ($jenis != 'laporan_notaris' && $jenis != 'laporan_ppat') {
            $this->db->where('jenis_permohonan', $jenis);
        } elseif ($jenis == 'laporan_notaris') {
            $this->db->where('jenis_layanan', 'notaris');
        } elseif ($jenis == 'laporan_ppat') {
            $this->db->where('jenis_layanan', 'ppat');
        } elseif ($jenis == 'arsip') {
            $this->db->where('status_permohonan', 5);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data_permohonan_admin($number, $offset, $keyword = '', $jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan p');
        $this->db->join('tb_user', 'p.pemohon = tb_user.id_user');
        $this->db->join('tb_jenis_permohonan jp', 'p.jenis_permohonan = jp.id_jenis_permohonan');
        $this->db->join('tb_status_permohonan', 'p.status_permohonan = tb_status_permohonan.id_status_permohonan');
        if ($jenis != 'laporan_notaris' && $jenis != 'laporan_ppat' && $jenis != 'arsip') {
            $this->db->where('jenis_permohonan', $jenis);
        } elseif ($jenis == 'laporan_notaris') {
            $this->db->where('jenis_layanan', 'notaris');
        } elseif ($jenis == 'laporan_ppat') {
            $this->db->where('jenis_layanan', 'ppat');
        } elseif ($jenis == 'arsip') {
            $this->db->where('status_permohonan', 5);
        }
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

    public function jumlah_notaris_diajukan()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 1 and jenis_layanan = 'notaris'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_notaris_menunggu_pembayaran()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 2 and jenis_layanan = 'notaris'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_notaris_diproses()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 4 and jenis_layanan = 'notaris'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_notaris_selesai()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 5 and jenis_layanan = 'notaris'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_ppat_diajukan()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 1 and jenis_layanan = 'ppat'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_ppat_menunggu_pembayaran()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 2 and jenis_layanan = 'ppat'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_ppat_diproses()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 4 and jenis_layanan = 'ppat'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function jumlah_ppat_selesai()
    {
        $this->db->select('*');
        $this->db->from('tb_permohonan');
        $where = "status_permohonan = 5 and jenis_layanan = 'ppat'";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function tambah_permohonan($data)
    {
        return $this->db->insert('tb_permohonan', $data);
    }

    function tampil_laporan_keuangan()
    {
        $this->db->select('*');
        $this->db->from('tb_keuangan');
        $query = $this->db->get();
        return $query->result_array();
    }

    function jumlah_laporan_keuangan()
    {
        $this->db->select('*');
        $this->db->from('tb_keuangan');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function data_laporan_keuangan($number, $offset, $keyword = '')
    {
        $this->db->select('*');
        $this->db->from('tb_keuangan p');
        if (!empty($keyword)) {
            $this->db->like('status', $keyword);
            $this->db->or_like('tanggal', $keyword);
        }
        $this->db->limit($number, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function saldo_terakhir()
    {
        $this->db->select('saldo_terakhir');
        $this->db->from('tb_keuangan');
        $this->db->order_by('id_keuangan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_keuangan($data)
    {
        return $this->db->insert('tb_keuangan', $data);
    }
}
