<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Dashboard';
        $this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
        $this->load->view('backend/dashboard/index', $data);
    }
}
