<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuutama extends CI_Controller {

	public function datapemohon()
	{
		$data['page_title'] = 'Riwayat Permohonan';
		$this->load->view('backend/menuutama/datapemohon', $data);
	}
}
