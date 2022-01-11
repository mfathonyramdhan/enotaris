<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menuutama extends CI_Controller
{

	public function datapermohonan()
	{
		$data['page_title'] = 'Riwayat Permohonan';
		$this->load->view('backend/menuutama/datapermohonan', $data);
	}

	public function formpermohonan()
	{
		$data['page_title'] = 'Formulir Permohonan';
		$this->load->view('backend/menuutama/formpermohonan', $data);
	}
}
