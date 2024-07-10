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

    public function buatjadwal()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Pengajuan Jadwal Pertemuan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/jadwal/buatjadwal');
    }
}
