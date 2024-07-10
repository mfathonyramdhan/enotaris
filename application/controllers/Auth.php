<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index()
    {
        $this->load->view('frontend/homepage/landingpage/login');
    }

    public function proses_login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));

        $user = $this->M_auth->cekUser($email);
        $hash = password_hash($user['password'], PASSWORD_DEFAULT);

        if (password_verify(md5($password), $hash)) {
            $data = [
                'id_user' => $user['id_user'],
                'email' => $user['email'],
                'nama' => $user['nama'],
                'level_user' => $user['level_user']
            ];
            $this->session->set_userdata($data);

            // return var_dump($user);
            if ($user['level_user'] == 1) {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => true,
                    'isi_pesan' => 'Berhasil Login, Selamat Datang!'
                ));
                redirect('admin/dashboard');
            } else if ($user['level_user'] == 2) {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => true,
                    'isi_pesan' => 'Berhasil Login, Selamat Datang!'
                ));
                redirect('admin/ManajemenAkun/profilsaya');
            } else {
                $this->session->set_flashdata('pesan', array(
                    'status_pesan' => true,
                    'isi_pesan' => 'Username Atau Password Salah, Silahkan Coba Lagi!'
                ));
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Username Atau Password Salah, Silahkan Coba Lagi!'
            ));
            redirect('auth');
        }
    }

    public function register()
    {
        $this->load->view('frontend/homepage/landingpage/register');
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|matches[password1]');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => md5($this->input->post('password1', true)),
            'foto_profil' => 'default.jpg',
            'level_user' => 2
        ];

        if (empty($pesan)) {
            $result = $this->M_auth->tambah_user($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!',
                'error' => implode(',', $pesan)
            ));
            redirect('auth/register');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Akun Berhasil Didaftarkan'
            ));
            redirect('auth');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Akun Gagal didaftarkan'
            ));
            redirect('auth/register');
        }
    }
}
