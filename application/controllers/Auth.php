<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$this->load->view('frontend/homepage/landingpage/login');
	}

	public function register()
	{
		$this->load->view('frontend/homepage/landingpage/register');
	}
}
