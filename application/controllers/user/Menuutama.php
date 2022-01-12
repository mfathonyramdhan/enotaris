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

    public function akta_tanah()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Akta Tanah';
        $this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
        $this->load->view('backend/aktatanah/index', $data);
    }

    public function getKodeAkta()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 1 ORDER BY kode_permohonan DESC LIMIT 1");
        $acak = random_string('alnum',3);

        if ($hasil->num_rows() > 0) {
            $nmr = explode('_', $hasil->row()->kode_permohonan);
            $slice = substr($nmr[1], 3);
            $merge = sprintf("%1d", (int)$slice + 1);
            $data = $acak.$merge;
        } else {
            $data = $acak.'1';
        }
        echo json_encode($data);
    }

    public function tambah_akta_tanah()
    {
        $pesan = array();
        
        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $ktp = $file['file_name'];

        // Upload KK
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $kk = $file['file_name'];

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'PBB_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_pbb')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $pbb = $file['file_name'];

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 1,
            'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'lokasi_tanah' => htmlspecialchars($this->input->post('lokasi', true)),
            'luas_tanah' => htmlspecialchars($this->input->post('luas_tanah', true)),
            'status_kepemilikan' => htmlspecialchars($this->input->post('status_kepemilikan', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_pbb' => $pbb,
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];
        if(empty($pesan))
        {
            $result = $this->M_admin->tambah_akta_tanah($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('user/Menuutama/akta_tanah');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('user/Menuutama/statuspermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Add New Product Failed'
            ));
            redirect('user/Menuutama/akta_tanah');
        }
    }

    public function statuspermohonan_aktaT($start = 0)
	{
		$data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Status Permohonan Akta Tanah';
        
        $q = isset($_GET['search']) ? $_GET['search'] : '';
        $data['daftar_akta'] = $this->M_admin->tampil_akta_user();

        // $this->load->database();
        $jumlah_data = $this->M_admin->jumlah_akta_user($q);
        
        $this->load->library('pagination');
        $config['base_url'] = base_url('user/ManajemenAkun/statuspermohonan_aktaT');
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
        $data['page_akta'] = $this->M_admin->data_akta_user($config['per_page'], $start, $q);
        $data['start'] = $start;
        $data['keyword'] = $q;
        $data['Pagination'] = $this->pagination->create_links();

		$this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
		$this->load->view('backend/Menuutama/statuspermohonan_aktaT', $data);
    }

    public function bayar($kode_permohonan)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Akta Tanah';
        $data['permohonan'] = $this->M_admin->cek_dokumen($kode_permohonan);

        $this->load->view('backend/template/meta',$data);
        $this->load->view('backend/template/navbar',$data);
        $this->load->view('backend/template/sidebar',$data);
        $this->load->view('backend/menuutama/pembayaran', $data);
    }

    public function proses_bayar()
    {
        $pesan = array();
        // Upload Bukti Pembayaran
        $config['upload_path']          = 'assets/berkas/bukti_pembayaran/';  // folder upload 
        $config['allowed_types']        = 'png|jpg|jpeg|pdf'; // jenis file
        $config['max_size']             = 8000;
        $config['file_name']            = 'BUKTI_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti_pembayaran')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $bukti = $file['file_name'];

        $data = [
            'bukti_pembayaran' => $bukti,
            'status_permohonan' => 3
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );
        
        if(empty($pesan))
        {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('user/Menuutama/bayar/'.$this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Berhasil Melakukan Pembayaran'
            ));
            redirect('user/Menuutama/statuspermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Gagal Melakukan Pembayaran'
            ));
            redirect('user/Menuutama/bayar/'.$this->input->post('kode_permohonan'));
        }
    }
}