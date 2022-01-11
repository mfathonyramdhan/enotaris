<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menuutama extends CI_Controller
{

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        if(empty($this->session->userdata('id_user'))){
			redirect('auth');
		}
    }

	public function datapermohonan()
	{
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
		$data['page_title'] = 'Riwayat Permohonan';
		$this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
		$this->load->view('backend/menuutama/datapermohonan', $data);
	}

	public function formpermohonan()
	{
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
		$data['page_title'] = 'Formulir Permohonan';
		$this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
		$this->load->view('backend/menuutama/formpermohonan', $data);
	}
}
