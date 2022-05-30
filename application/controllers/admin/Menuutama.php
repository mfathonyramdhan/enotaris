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

    public function datapermohonan_admin($jenis, $start = 0)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Riwayat Permohonan';

        $q = isset($_GET['search']) ? $_GET['search'] : '';
        $data['daftar_akta'] = $this->M_admin->tampil_permohonan_admin($jenis);

        // $this->load->database();
        $jumlah_data = $this->M_admin->jumlah_permohonan_admin($q, $jenis);

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/Menuutama/datapermohonan_admin/' . $jenis);
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
        $data['page_akta'] = $this->M_admin->data_permohonan_admin($config['per_page'], $start, $q, $jenis);
        $data['start'] = $start;
        $data['keyword'] = $q;
        $data['Pagination'] = $this->pagination->create_links();

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        if ($jenis == 1) {
            $this->load->view('backend/menuutama/datapermohonan_aktaT', $data);
        } elseif ($jenis == 2) {
            $this->load->view('backend/menuutama/datapermohonan_cv', $data);
        } elseif ($jenis == 3) {
            $this->load->view('backend/menuutama/datapermohonan_waris', $data);
        }
    }

    public function formpermohonan_aktaT()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formpermohonan_aktaT', $data);
    }

    public function formpendirian_cv()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formpendirian_cv', $data);
    }

    public function formhakwaris()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formhakwaris', $data);
    }

    public function get_user()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_admin->get_user($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama,
                        'description'    => $row->nama,
                        'id_dosen'    => $row->id_user,
                    );
                echo json_encode($arr_result);
            }
        }
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
            redirect('admin/Menuutama/formpermohonan_aktaT');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/datapermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formpermohonan_aktaT');
        }
    }

    public function cek_dokumen_aktaT($kode_permohonan)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['cek_dokumen'] = $this->M_admin->cek_dokumen($kode_permohonan);
        $data['page_title'] = 'Detail Riwayat';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/aktatanah/cek_dokumen', $data);
    }

    public function setujui_aktaT()
    {
        $pesan = array();
        $data = [
            'biaya' => htmlspecialchars($this->input->post('biaya', true)),
            'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'catatan' => 'Permohonan telah disetujui, segera lakukan pembayaran.',
            'status_permohonan' => 2,
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
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Disetujui'
            ));
            redirect('admin/Menuutama/datapermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Disetujui'
            ));
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function proses_aktaT()
    {
        $pesan = array();
        $data = [
            'catatan' => 'Permohonan Sedang Diproses',
            'status_permohonan' => 4
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
            redirect('admin/Menuutama/cek_dokumen_aktaT/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diproses'
            ));
            redirect('admin/Menuutama/datapermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diproses'
            ));
            redirect('admin/Menuutama/cek_dokumen_aktaT/' . $this->input->post('kode_permohonan'));
        }
    }

    public function upload_aktaT()
    {
        $pesan = array();
        // Upload Bukti Pembayaran
        $config['upload_path']          = 'assets/berkas/akta_tanah/';  // folder upload 
        $config['allowed_types']        = 'png|jpg|jpeg|pdf'; // jenis file
        $config['max_size']             = 8000;
        $config['file_name']            = 'AktaTanah_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('hasil_aktaT')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $aktaT = $file['file_name'];

        $data = [
            'catatan' => 'Permohonan selesai, silahkan unduh berkas anda',
            'berkas_hasil' => $aktaT,
            'status_permohonan' => 5
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
            redirect('admin/Menuutama/cek_dokumen_aktaT/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diselesaikan'
            ));
            redirect('admin/Menuutama/datapermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diselesaikan'
            ));
            redirect('admin/Menuutama/cek_dokumen_aktaT/' . $this->input->post('kode_permohonan'));
        }
    }

    public function tolak_dokumen()
    {
        $pesan = array();
        $data = [
            'catatan' => htmlspecialchars($this->input->post('catatan', true)),
            'status_permohonan' => 6,
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
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Ditolak'
            ));
            redirect('admin/Menuutama/datapermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Ditolak'
            ));
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function tolak_pembayaran($kode_permohonan)
    {
        $pesan = array();
        $data = [
            'catatan' => 'Bukti pembayaran tidak valid, mohon melakukan upload ulang.',
            'status_permohonan' => 7,
        ];

        $where = array(
            'kode_permohonan' => $kode_permohonan
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => implode('', $pesan)
            ));
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Ditolak'
            ));
            redirect('admin/Menuutama/datapermohonan_aktaT');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Ditolak'
            ));
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function getKodeCv()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 2 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_cv()
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

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'NPWP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_npwp')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $npwp = $file['file_name'];

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/foto_direktur/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'FTDR_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_direktur')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $direktur = $file['file_name'];

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 2,
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'nama_cv' => htmlspecialchars($this->input->post('nama_cv', true)),
            'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
            'bidang_usaha' => htmlspecialchars($this->input->post('luas_tanah', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_pbb' => $pbb,
            'scan_npwp' => $npwp,
            'foto_direktur' => $direktur,
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];
        if (empty($pesan)) {
            $result = $this->M_admin->tambah_cv($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formpendirian_cv');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formpendirian_cv');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formpendirian_cv');
        }
    }

    public function getKodeWaris()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 3 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_ahli_waris()
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

        // Upload SK Desa
        $config['upload_path']          = 'assets/berkas/sk_desa/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SKDESA_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sk_desa')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sk_desa = $file['file_name'];

        // Upload Akta Kematian
        $config['upload_path']          = 'assets/berkas/akta_kematian/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'AKKEM_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('akta_kematian')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $akta_kematian = $file['file_name'];

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/sp_ahli_waris/';  // folder upload 
        $config['allowed_types']        = 'pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SPAHWA_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sp_ahli_waris')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sp_ahli_waris = $file['file_name'];

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 3,
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'sk_desa' => $sk_desa,
            'akta_kematian' => $akta_kematian,
            'sp_ahli_waris' => $sp_ahli_waris,
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];
        if (empty($pesan)) {
            $result = $this->M_admin->tambah_waris($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formhakwaris');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formhakwaris');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formhakwaris');
        }
    }
}
