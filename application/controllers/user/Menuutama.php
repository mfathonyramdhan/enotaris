<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menuutama extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        if (empty($this->session->userdata('id_user'))) {
            redirect('auth');
        }
    }

    public function akta_tanah()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Akta Tanah';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/aktatanah/index', $data);
    }

    public function getKodeAkta()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 1 ORDER BY kode_permohonan DESC LIMIT 1");
        $acak = random_string('alnum', 3);

        if ($hasil->num_rows() > 0) {
            $nmr = explode('_', $hasil->row()->kode_permohonan);
            $slice = substr($nmr[1], 3);
            $merge = sprintf("%1d", (int)$slice + 1);
            $data = $acak . $merge;
        } else {
            $data = $acak . '1';
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
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
            'luas_tanah' => htmlspecialchars($this->input->post('luas_tanah', true)),
            'status_kepemilikan' => htmlspecialchars($this->input->post('status_kepemilikan', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_pbb' => $pbb,
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];
        if (empty($pesan)) {
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
            redirect('user/Menuutama/akta_tanah');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Add New Product Failed'
            ));
            redirect('user/Menuutama/akta_tanah');
        }
    }

    public function datapermohonan_user($jenis, $start = 0)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Status Permohonan';

        $q = isset($_GET['search']) ? $_GET['search'] : '';
        $data['daftar_akta'] = $this->M_admin->tampil_permohonan_user($jenis);

        // $this->load->database();
        $jumlah_data = $this->M_admin->jumlah_permohonan_user($q, $jenis);

        $this->load->library('pagination');
        $config['base_url'] = base_url('user/ManajemenAkun/datapermohonan_aktaT/' . $jenis);
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
        $data['page_akta'] = $this->M_admin->data_permohonan_user($config['per_page'], $start, $q, $jenis);
        $data['start'] = $start;
        $data['keyword'] = $q;
        $data['Pagination'] = $this->pagination->create_links();

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        if ($jenis == 1) {
            $this->load->view('backend/Menuutama/datapermohonan_aktaT_user', $data);
        } elseif ($jenis == 2) {
            $this->load->view('backend/Menuutama/datapermohonan_cv_user', $data);
        } elseif ($jenis == 3) {
            $this->load->view('backend/Menuutama/datapermohonan_waris_user', $data);
        } elseif ($jenis == 4) {
            $this->load->view('backend/Menuutama/datapermohonan_sewa_user', $data);
        } elseif ($jenis == 5) {
            $this->load->view('backend/Menuutama/datapermohonan_rrups_user', $data);
        } elseif ($jenis == 6) {
            $this->load->view('backend/Menuutama/datapermohonan_yayasan_user', $data);
        } elseif ($jenis == 7) {
            $this->load->view('backend/Menuutama/datapermohonan_janjiLain_user', $data);
        } elseif ($jenis == 8) {
            $this->load->view('backend/Menuutama/datapermohonan_hibah_user', $data);
        } elseif ($jenis == 9) {
            $this->load->view('backend/Menuutama/datapermohonan_jualbelitanah_user', $data);
        } elseif ($jenis == 10) {
            $this->load->view('backend/menuutama/datapermohonan_tukartanah_user', $data);
        } elseif ($jenis == 11) {
            $this->load->view('backend/menuutama/datapermohonan_kuasa_user', $data);
        } elseif ($jenis == 12) {
            $this->load->view('backend/menuutama/datapermohonan_bagihak_user', $data);
        } elseif ($jenis == 13) {
            $this->load->view('backend/menuutama/datapermohonan_apht_user', $data);
        }
    }

    public function bayar($kode_permohonan)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Akta Tanah';
        $data['permohonan'] = $this->M_admin->cek_dokumen($kode_permohonan);

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/pembayaran', $data);
    }

    public function proses_bayar()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

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
            'catatan' => 'Pembayaran berhasil, Sistem sedang mengecek bukti pembayaran.',
            'bukti_pembayaran' => $bukti,
            'status_permohonan' => 3
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode(',', $pesan)
            ));
            redirect('user/Menuutama/bayar/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Berhasil Melakukan Pembayaran'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Gagal Melakukan Pembayaran'
            ));
            redirect('user/Menuutama/bayar/' . $this->input->post('kode_permohonan'));
        }
    }

    public function edit_dokumen($kode_permohonan)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Edit Permohonan';
        $data['dokumen'] = $this->M_admin->cek_dokumen($kode_permohonan);

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        if ($data['dokumen']['jenis_permohonan'] == 1) {
            $this->load->view('backend/aktatanah/edit_dokumen', $data);
        } elseif ($data['dokumen']['jenis_permohonan'] == 2) {
            $this->load->view('backend/menuutama/edit_cv', $data);
        } elseif ($data['dokumen']['jenis_permohonan'] == 3) {
            $this->load->view('backend/menuutama/edit_waris', $data);
        } elseif ($data['dokumen']['jenis_permohonan'] == 4) {
            $this->load->view('backend/menuutama/edit_sewa', $data);
        } elseif ($data['dokumen']['jenis_permohonan'] == 5) {
            $this->load->view('backend/menuutama/edit_rrups', $data);
        } elseif ($data['dokumen']['jenis_permohonan'] == 6) {
            $this->load->view('backend/menuutama/edit_yayasan', $data);
            // ngeload tampilan perjanjian lain lain
        } elseif ($data['dokumen']['jenis_permohonan'] == 7) {
            $this->load->view('backend/menuutama/edit_perjLain', $data);
        } elseif ($data['dokumen']['jenis_permohonan'] == 10) {
            $this->load->view('backend/menuutama/edit_tukartanah', $data);
        }
    }

    public function update_dokumen_aktaT()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));
        $acak = random_string('alnum', 3);

        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan') . '_' . $acak;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $ktp = $file['file_name'];

        // upload kk
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan') . '_' . $acak;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $kk = $file['file_name'];

        // upload pbb
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'PBB_' . $this->input->post('kode_permohonan') . '_' . $acak;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_pbb')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $pbb = $file['file_name'];

        $data = [
            'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
            'luas_tanah' => htmlspecialchars($this->input->post('luas_tanah', true)),
            'status_kepemilikan' => htmlspecialchars($this->input->post('status_kepemilikan', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_pbb' => $pbb,
            'catatan' => 'Sistem sedang melakukan pengecekan dokumen.',
            'status_permohonan' => 1
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diperbarui'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diperbarui'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function update_rrups()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp') && $_FILES['scan_ktp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp = $_FILES['scan_ktp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp1');

        // upload kk
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk') && $_FILES['scan_kk']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk = $_FILES['scan_kk']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk1');

        // upload npwp
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'NPWP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_npwp') && $_FILES['scan_npwp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $npwp = $_FILES['scan_npwp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_npwp1');

        $data = [
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_npwp' => $npwp,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'catatan' => 'Sistem sedang melakukan pengecekan dokumen.',
            'status_permohonan' => 1
        ];


        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        // var_dump($pesan);
        // die;
        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diperbarui'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diperbarui'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function update_perjLain()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp') && $_FILES['scan_ktp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp = $_FILES['scan_ktp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp1');

        // upload kk
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk') && $_FILES['scan_kk']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk = $_FILES['scan_kk']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk1');

        $data = [
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'catatan' => 'Sistem sedang melakukan pengecekan dokumen.',
            'status_permohonan' => 1
        ];


        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        // var_dump($pesan);
        // die;
        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diperbarui'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diperbarui'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function update_yayasan()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp') && $_FILES['scan_ktp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp = $_FILES['scan_ktp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp1');

        // upload kk
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk') && $_FILES['scan_kk']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk = $_FILES['scan_kk']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk1');

        // upload npwp
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'NPWP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_npwp') && $_FILES['scan_npwp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $npwp = $_FILES['scan_npwp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_npwp1');

        $data = [
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_npwp' => $npwp,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'catatan' => 'Sistem sedang melakukan pengecekan dokumen.',
            'status_permohonan' => 1
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diperbarui'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diperbarui'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function update_waris()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();

        // Upload SK DESA
        $config['upload_path']          = 'assets/berkas/sk_desa/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'SKDESA_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sk_desa') && $_FILES['sk_desa']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $sk_desa = $_FILES['sk_desa']['size'] != 0 ? $file['file_name'] : $this->input->post('sk_desa1');

        // Upload Akta Kematian
        $config['upload_path']          = 'assets/berkas/akta_kematian/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'AKKEM_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('akta_kematian') && $_FILES['akta_kematian']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $akta_kematian = $_FILES['akta_kematian']['size'] != 0 ? $file['file_name'] : $this->input->post('akta_kematian1');

        // Upload SP Ahli Waris
        $config['upload_path']          = 'assets/berkas/sp_ahli_waris/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'SPAHWA_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sp_ahli_waris') && $_FILES['sp_ahli_waris']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $sp_ahli_waris = $_FILES['sp_ahli_waris']['size'] != 0 ? $file['file_name'] : $this->input->post('sp_ahli_waris1');

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp') && $_FILES['scan_ktp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp = $_FILES['scan_ktp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp1');

        // upload kk
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk') && $_FILES['scan_kk']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk = $_FILES['scan_kk']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk1');

        $data = [
            'sk_desa' => $sk_desa,
            'akta_kematian' => $akta_kematian,
            'sp_ahli_waris' => $sp_ahli_waris,
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'catatan' => 'Sistem sedang melakukan pengecekan dokumen.',
            'status_permohonan' => 1
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diperbarui'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diperbarui'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function update_cv()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp') && $_FILES['scan_ktp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp = $_FILES['scan_ktp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp1');

        // upload kk
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk') && $_FILES['scan_kk']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk = $_FILES['scan_kk']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk1');

        // upload npwp
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'NPWP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_npwp') && $_FILES['scan_npwp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $npwp = $_FILES['scan_npwp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_npwp1');

        // upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'PBB_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_pbb') && $_FILES['scan_pbb']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $pbb = $_FILES['scan_pbb']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_pbb1');

        // upload Foto Direktur
        $config['upload_path']          = 'assets/berkas/foto_direktur/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'FTDR_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_direktur') && $_FILES['foto_direktur']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $foto_direktur = $_FILES['foto_direktur']['size'] != 0 ? $file['file_name'] : $this->input->post('foto_direktur1');

        $data = [
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_npwp' => $npwp,
            'scan_pbb' => $pbb,
            'foto_direktur' => $foto_direktur,
            'nama_cv' => htmlspecialchars($this->input->post('nama_cv', true)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
            'bidang_usaha' => htmlspecialchars($this->input->post('bidang_usaha', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'catatan' => 'Sistem sedang melakukan pengecekan dokumen.',
            'status_permohonan' => 1
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        // var_dump($pesan);
        // die;
        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diperbarui'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diperbarui'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function update_sewa()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan', true);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp') && $_FILES['scan_ktp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp = $_FILES['scan_ktp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp1');

        // Upload KK
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan', true);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk') && $_FILES['scan_kk']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk = $_FILES['scan_kk']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk1');

        // Upload Sertifikat Asli
        $config['upload_path']          = 'assets/berkas/sertif_asli/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'SERTIF_' . $this->input->post('kode_permohonan', true);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_sertif') && $_FILES['scan_sertif']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $sertif = $_FILES['scan_sertif']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_sertif1');

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'PBB_' . $this->input->post('kode_permohonan', true);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_pbb') && $_FILES['scan_pbb']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $pbb = $_FILES['scan_pbb']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_pbb1');

        $data = [
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'sertif_asli' => $sertif,
            'scan_pbb' => $pbb,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function update_tukartanah()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();

        // Upload KTP1
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp') && $_FILES['scan_ktp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp = $_FILES['scan_ktp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp1');

        // Upload KTP2
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KTP2_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp2') && $_FILES['scan_ktp2']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $ktp2 = $_FILES['scan_ktp2']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_ktp2_1');

        // Upload KK1
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk') && $_FILES['scan_kk']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk = $_FILES['scan_kk']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk1');

        // Upload KK2
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'KK2_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk2') && $_FILES['scan_kk2']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $kk2 = $_FILES['scan_kk2']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_kk2_1');

        // Upload Surat Nikah scan_snikah1
        $config['upload_path']          = 'assets/berkas/snikah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'SNKH_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_snikah') && $_FILES['scan_snikah']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $snikah = $_FILES['scan_snikah']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_snikah1');

        // Upload Surat Nikah scan_snikah2
        $config['upload_path']          = 'assets/berkas/snikah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'SNKH2_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_snikah2') && $_FILES['scan_snikah2']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $snikah2 = $_FILES['scan_snikah2']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_snikah2_1');

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'PBB_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_pbb') && $_FILES['scan_pbb']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $pbb = $_FILES['scan_pbb']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_pbb1');


        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'PBB2_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_pbb2') && $_FILES['scan_pbb2']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $pbb2 = $_FILES['scan_pbb2']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_pbb2_1');

        // Upload Sertif tanah
        $config['upload_path']          = 'assets/berkas/sertif_tanah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'SRTF_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sertif_tanah') && $_FILES['sertif_tanah']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $sertiftanah = $_FILES['sertif_tanah']['size'] != 0 ? $file['file_name'] : $this->input->post('sertif_tanah1');

        // Upload Sertif tanah
        $config['upload_path']          = 'assets/berkas/sertif_tanah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'SRTF2_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sertif_tanah2') && $_FILES['sertif_tanah2']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $sertiftanah2 = $_FILES['sertif_tanah2']['size'] != 0 ? $file['file_name'] : $this->input->post('sertif_tanah2_1');

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'NPWP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_npwp') && $_FILES['scan_npwp']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $npwp = $_FILES['scan_npwp']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_npwp1');

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'NPWP2_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_npwp2') && $_FILES['scan_npwp2']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $npwp2 = $_FILES['scan_npwp2']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_npwp2_1');

        // Upload BPJS
        $config['upload_path']          = 'assets/berkas/bpjs/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'BPJS_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_bpjs') && $_FILES['scan_bpjs']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $bpjs = $_FILES['scan_bpjs']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_bpjs1');

        // Upload BPJS
        $config['upload_path']          = 'assets/berkas/bpjs/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'BPJS2_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_bpjs2') && $_FILES['scan_bpjs2']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $bpjs2 = $_FILES['scan_bpjs2']['size'] != 0 ? $file['file_name'] : $this->input->post('scan_bpjs2_1');


        $data = [
            'scan_ktp' => $ktp,
            'scan_ktp2' => $ktp2,
            'scan_kk' => $kk,
            'scan_kk2' => $kk2,
            'scan_snikah' => $snikah,
            'scan_snikah2' => $snikah2,
            'scan_pbb' => $pbb,
            'scan_pbb2' => $pbb2,
            'sertif_tanah' => $sertiftanah,
            'sertif_tanah2' => $sertiftanah2,
            'scan_npwp' => $npwp,
            'scan_npwp2' => $npwp2,
            'scan_bpjs' => $bpjs,
            'scan_bpjs2' => $bpjs2,
            'tkrtnh_namapihak1' => htmlspecialchars($this->input->post('tkrtnh_namapihak1', true)),
            'tkrtnh_namapihak2' => htmlspecialchars($this->input->post('tkrtnh_namapihak2', true)),
            'tkrtnh_nohppihak1' => htmlspecialchars($this->input->post('tkrtnh_nohppihak1', true)),
            'tkrtnh_nohppihak2' => htmlspecialchars($this->input->post('tkrtnh_nohppihak2', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('user/Menuutama/edit_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function edit_pembayaran($kode_permohonan)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Pembayaran';
        $data['pembayaran'] = $this->M_admin->cek_dokumen($kode_permohonan);

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/edit_pembayaran', $data);
    }

    public function update_pembayaran_aktaT()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));

        $pesan = array();


        // upload bukti pembayaran
        $config['upload_path']          = 'assets/berkas/bukti_pembayaran/';  // folder upload 
        $config['allowed_types']        = 'jpg|jpeg|png|pdf'; // jenis file
        $config['max_size']             = 8000;
        $config['overwrite']            = TRUE;
        $config['file_name']            = 'BUKTI_' . $this->input->post('kode_permohonan', true);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti_pembayaran') && $_FILES['bukti_pembayaran']['size'] != 0) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }

        $file = $this->upload->data();
        $bukti_pembayaran = $_FILES['bukti_pembayaran']['size'] != 0 ? $file['file_name'] : $this->input->post('bukti_pembayaran1');

        $data = [
            'bukti_pembayaran' => $bukti_pembayaran,
            'catatan' => 'Sistem sedang melakukan pengecekan bukti pembayaran.',
            'status_permohonan' => 3
        ];

        $where = array(
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true))
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode('', $pesan)
            ));
            redirect('user/Menuutama/edit_pembayaran/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Bukti Pembayaran Berhasil Diperbarui'
            ));
            redirect('user/Menuutama/datapermohonan_user/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Bukti Pembayaran Gagal Diperbarui'
            ));
            redirect('user/Menuutama/edit_pembayaran/' . $this->input->post('kode_permohonan'));
        }
    }
}
