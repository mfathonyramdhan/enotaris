<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManajemenAkun extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        if(empty($this->session->userdata('id_user'))){
			redirect('auth');
		}
    }

    public function profilsaya()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Profil Saya';
        $this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
        $this->load->view('backend/akun/profilsaya', $data);
    }

    public function update_akun(){
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|max_length[16]');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }

        $tgl_lahir = strtotime(htmlspecialchars($this->input->post('tgl_lahir', true)));
        $now = strtotime(date('Y-m-d'));
        $interval = abs($now - $tgl_lahir);
        $years = ceil($interval / (365*60*60*24));
        if($years < 17){
            array_push($pesan, 'Usia harus lebih atau sama dengan 17 tahun!');
        }

        $config['upload_path']          = 'assets/img/foto_profil';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        $config['max_size']             = 8000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $image = $_FILES['image']['size'] != 0 ? $file['file_name'] : $this->input->post('image1');

        if(!empty($this->input->post('password')))
        {
            $password = md5($this->input->post('password', true));
        }else{
            $password = $this->input->post('password1');
        }

        $update = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
            'foto_profil' => $image,
            'password' => $password
        ];

        $where = array(
            'id_user' => htmlspecialchars($this->input->post('id_user', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_akun($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode('', $pesan)
            ));
            redirect('admin/ManajemenAkun/profilsaya');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Update Profile Berhasil'
            ));
            redirect('admin/ManajemenAkun/profilsaya');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Update Profile Gagal'
            ));
            redirect('admin/ManajemenAkun/profilsaya');
        }
    }

    public function dataakun($start=0)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Data Akun';

        $q = isset($_GET['search']) ? $_GET['search'] : '';
        $data['daftar_akun'] = $this->M_admin->tampil_akun();

        // $this->load->database();
        $jumlah_data = $this->M_admin->jumlah_akun($q);
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/ManajemenAkun/dataakun');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 20;
        $config['full_tag_open']   = '<ul class="pagination justify-content-end">';
        $config['full_tag_close']  = '</ul>';

        $config['first_link']      = 'First';
        $config['first_tag_open']  = '<li class="page-link tabindex="-1" aria-disabled="true"">';
        $config['first_tag_close'] = '</li>';

        $config['last_link']       = 'Last';
        $config['last_tag_open']   = '<li class="page-link">';
        $config['last_tag_close']  = '</li>';

        $config['next_tag_open']   = '<li class="page-link">';
        $config['next_tag_close']  = '</li>';

        $config['prev_tag_open']   = '<li class="page-link">';
        $config['prev_tag_close']  = '</li>';

        $config['cur_tag_open']    = '<li class="active page-item"><a class="page-link" href="#">';
        $config['cur_tag_close']   = '</a></li>';

        $config['num_tag_open']    = '<li class="page-link">';
        $config['num_tag_close']   = '</li>';
        $this->pagination->initialize($config);
        $data['page_akun'] = $this->M_admin->data($config['per_page'], $start, $q);
        $data['start'] = $start;
        $data['keyword'] = $q;
        $data['Pagination'] = $this->pagination->create_links();

        $this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
        $this->load->view('backend/akun/dataakun', $data);
    }

    public function editakun($id_user)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['detail_akun'] = $this->M_admin->detail_akun($id_user);
        $data['page_title'] = 'Edit Data Akun';
        $this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
        $this->load->view('backend/akun/editakun', $data);
    }

    public function proses_edit_akun(){
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');

        $pesan = array();

        if ($this->form_validation->run() == false) {
            array_push($pesan, validation_errors());
        }

        $config['upload_path']          = 'assets/img/foto_profil';  // folder upload 
        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        $config['max_size']             = 8000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image') && $_FILES['image']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $image = $_FILES['image']['size'] != 0 ? $file['file_name'] : $this->input->post('image1');

        if(!empty($this->input->post('password')))
        {
            $password = md5($this->input->post('password', true));
        }else{
            $password = $this->input->post('password1');
        }

        $update = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
            'foto_profil' => $image,
            'password' => $password
        ];

        $where = array(
            'id_user' => htmlspecialchars($this->input->post('id_user', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_akun($where, $update);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode('', $pesan)
            ));
            redirect('admin/ManajemenAkun/editakun');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Update Profile Berhasil'
            ));
            redirect('admin/ManajemenAkun/editakun');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Update Profile Gagal'
            ));
            redirect('admin/ManajemenAkun/editakun');
        }
    }

    public function tambah_admin()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Tambah Admin';
        $this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
        $this->load->view('backend/akun/tambah_admin', $data);
    }

    public function proses_tambah_admin()
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
            'level_user' => 1
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_user($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('admin/ManajemenAkun/tambah_admin');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Akun Berhasil Didaftarkan'
            ));
            redirect('admin/ManajemenAkun/dataakun');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Akun Gagal didaftarkan'
            ));
            redirect('admin/ManajemenAkun/tambah_admin');
        }
    }

    public function hapus_akun($id_user){
        $where = array('id_user' => $id_user);
        $result = $this->M_admin->hapus_akun($where, 'tb_user');
        if ($result == true) {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Akun Berhasil Dihapus'
            ));
            redirect('admin/ManajemenAkun/dataakun');
        } else {
            $this->session->set_flashdata('Pesan', array(
                'status_pesan' => false,
                'isi_pesan' => "Akun Gagal Dihapus"
            ));
            redirect('admin/ManajemenAkun/dataakun');
        }
    }
}
