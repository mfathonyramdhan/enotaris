<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManajemenJadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        if (empty($this->session->userdata('id_user'))) {
            redirect('auth');
        }
    }

    public function formPengajuanPertemuan()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Pengajuan Jadwal Pertemuan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/jadwal/formPengajuanPertemuan');
    }

    public function submitPengajuanPertemuan()
    {
        $id_user = $this->input->post('id_user');
        $status = $this->input->post('status');
        $tgl_pertemuan = $this->input->post('tgl_pertemuan');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_akhir = $this->input->post('jam_akhir');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'user_id' => $id_user,
            'status' => $status,
            'tgl' => $tgl_pertemuan,
            'jam_mulai' => $jam_mulai,
            'jam_akhir' => $jam_akhir,
            'keterangan' => $keterangan
        );

        $this->db->insert('tb_pertemuan', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', array('status_pesan' => true, 'isi_pesan' => 'Pengajuan jadwal berhasil disimpan.'));
        } else {
            $this->session->set_flashdata('pesan', array('status_pesan' => false, 'isi_pesan' => 'Pengajuan jadwal gagal disimpan.'));
        }

        redirect('admin/ManajemenJadwal/dataPengajuanPertemuan');
    }

    public function dataPengajuanPertemuan()
    {
        $user_id = $this->session->userdata('id_user'); // Dapatkan ID user yang sedang login
        $data['user'] = $this->M_admin->data_user($user_id);
        $data['page_title'] = 'Data Pengajuan Jadwal Pertemuan';
        $data['data'] = $this->M_admin->get_jadwal_pertemuan($user_id); // Ambil data berdasarkan user ID

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/jadwal/dataPengajuanPertemuan', $data);
    }

    public function dataPengajuanPertemuanJadwal()
    {

        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Data Pengajuan Jadwal Pertemuan';
        $data['data'] = $this->M_admin->getAll_jadwal_pertemuan();

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/jadwal/dataPengajuanPertemuan', $data);
    }


    public function hapusPengajuanPertemuan($id)
    {
        $this->load->model('M_admin');

        $delete = $this->M_admin->hapusDataPengajuanPertemuan($id);

        if ($delete) {
            $this->session->set_flashdata('pesan', [
                'status_pesan' => true,
                'isi_pesan' => 'Data berhasil dihapus'
            ]);
        } else {
            $this->session->set_flashdata('pesan', [
                'status_pesan' => false,
                'isi_pesan' => 'Data gagal dihapus'
            ]);
        }

        redirect('admin/ManajemenJadwal/dataPengajuanPertemuan');
    }

    public function handle_action()
    {
        $id = $this->input->post('id');
        $catatan = $this->input->post('catatan');
        $action = $this->input->post('action');

        if ($action == 'setujui') {
            $status = 4;
        } elseif ($action == 'tolak') {
            $status = 2;
        }


        $this->db->update('tb_pertemuan', [
            'status' => $status,
            'catatan' => $catatan,
        ], ['id' => $id]);

        $this->session->set_flashdata('pesan', [
            'status_pesan' => true,
            'isi_pesan' => 'Aksi berhasil dilakukan.'
        ]);

        redirect('admin/ManajemenJadwal/dataPengajuanPertemuanJadwal');
    }

    public function updatePengajuanPertemuan()
    {
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $jamMulai = $this->input->post('jam_mulai');
        $jamAkhir = $this->input->post('jam_akhir');
        $keterangan = $this->input->post('keterangan');

        // Update the database
        $this->db->update('tb_pertemuan', [
            'tgl' => $tanggal,
            'jam_mulai' => $jamMulai,
            'jam_akhir' => $jamAkhir,
            'keterangan' => $keterangan,
            'status' => 1,
        ], ['id' => $id]);

        // Set flash message
        $this->session->set_flashdata('pesan', [
            'status_pesan' => true,
            'isi_pesan' => 'Data berhasil diperbarui.'
        ]);

        // Redirect back to the list page
        redirect('admin/ManajemenJadwal/dataPengajuanPertemuan');
    }
}
