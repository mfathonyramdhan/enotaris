<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AktaTanah extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'Formulir Akta Tanah';
        $this->load->view('backend/aktatanah/index', $data);
    }
}
