<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManajemenAkun extends CI_Controller
{

    public function profilsaya()
    {
        $data['page_title'] = 'Profil Saya';
        $this->load->view('backend/akun/profilsaya', $data);
    }

    public function dataakun()
    {
        $data['page_title'] = 'Data Akun';
        $this->load->view('backend/akun/dataakun', $data);
    }

    public function editakun()
    {
        $data['page_title'] = 'Edit Data Akun';
        $this->load->view('backend/akun/editakun', $data);
    }
}
