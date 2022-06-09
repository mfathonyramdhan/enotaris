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
        $data['notaris_diajukan'] = $this->M_admin->jumlah_notaris_diajukan();
        $data['notaris_pembayaran'] = $this->M_admin->jumlah_notaris_menunggu_pembayaran();
        $data['notaris_diproses'] = $this->M_admin->jumlah_notaris_diproses();
        $data['notaris_selesai'] = $this->M_admin->jumlah_notaris_selesai();
        $data['ppat_diajukan'] = $this->M_admin->jumlah_ppat_diajukan();
        $data['ppat_pembayaran'] = $this->M_admin->jumlah_ppat_menunggu_pembayaran();
        $data['ppat_diproses'] = $this->M_admin->jumlah_ppat_diproses();
        $data['ppat_selesai'] = $this->M_admin->jumlah_ppat_selesai();

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
        } elseif ($jenis == 4) {
            $this->load->view('backend/menuutama/datapermohonan_sewa', $data);
        } elseif ($jenis == 5) {
            $this->load->view('backend/menuutama/datapermohonan_rrups', $data);
        } elseif ($jenis == 6) {
            $this->load->view('backend/menuutama/datapermohonan_yayasan', $data);
        } elseif ($jenis == 7) {
            $this->load->view('backend/menuutama/datapermohonan_janjiLain', $data);
        } elseif ($jenis == 8) {
            $this->load->view('backend/menuutama/datapermohonan_hibah', $data);
        } elseif ($jenis == 9) {
            $this->load->view('backend/menuutama/datapermohonan_jualbelitanah', $data);
        } elseif ($jenis == 10) {
            $this->load->view('backend/menuutama/datapermohonan_tukartanah', $data);
        } elseif ($jenis == 11) {
            $this->load->view('backend/menuutama/datapermohonan_kuasa', $data);
        } elseif ($jenis == 12) {
            $this->load->view('backend/menuutama/datapermohonan_bagihak', $data);
        } elseif ($jenis == 13) {
            $this->load->view('backend/menuutama/datapermohonan_apht', $data);
        } elseif ($jenis == 'laporan_notaris') {
            $this->load->view('backend/menuutama/laporan_notaris', $data);
        } elseif ($jenis == 'laporan_ppat') {
            $this->load->view('backend/menuutama/laporan_ppat', $data);
        } elseif ($jenis == 'arsip') {
            $this->load->view('backend/menuutama/arsip', $data);
        }
    }

    // ---------------------------------------LAYANAN NOTARIS
    public function formperjanjian_sewa()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formperjanjian_sewa', $data);
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


    public function formperubahan_rrups()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formperubahan_rrups', $data);
    }


    public function formpendirian_yayasan()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formpendirian_yayasan', $data);
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

    public function formperjanjian_lainlain()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formperjanjian_lainlain', $data);
    }

    // ----------------------------------------------LAYANAN PPAT
    public function formhibah()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formhibah', $data);
    }


    public function formjualbelitanah()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formjualbelitanah', $data);
    }
    public function formtukartanah()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formtukartanah', $data);
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

    public function formkuasa()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formkuasa', $data);
    }

    public function formbagihak()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formbagihak', $data);
    }

    public function formapht()
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Formulir Permohonan';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/formapht', $data);
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
            'jenis_layanan' => 'ppat',
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
            $result = $this->M_admin->tambah_permohonan($data);
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

    public function cek_dokumen($kode_permohonan)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['cek_dokumen'] = $this->M_admin->cek_dokumen($kode_permohonan);
        $data['page_title'] = 'Detail Riwayat';
        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/cek_dokumen', $data);
    }

    public function setujui_permohonan()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));
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
            redirect('admin/Menuutama/datapermohonan_admin/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Disetujui'
            ));
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function proses_permohonan()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));
        $kode_permohonan = htmlspecialchars($this->input->post('kode_permohonan', true));
        $permohonan = $this->M_admin->cek_dokumen($kode_permohonan);
        $saldo = $this->M_admin->saldo_terakhir();

        $pesan = array();
        $data = [
            'tgl_pelunasan' => date('Y-m-d'),
            'catatan' => 'Permohonan Sedang Diproses',
            'status_permohonan' => 4
        ];

        $where = array(
            'kode_permohonan' => $kode_permohonan
        );

        if (empty($pesan)) {
            $result = $this->M_admin->update_aktaT($where, $data);

            $saldo_terakhir = $saldo['saldo_terakhir'] + $permohonan['biaya'];

            $array = [
                'jumlah' => $permohonan['biaya'],
                'status' => 'Pemasukan',
                'tanggal' => date('Y-m-d'),
                'bulan' => date('F'),
                'saldo_terakhir' => $saldo_terakhir,
                'keterangan' => 'Pemasukan dari Kode Permohonan' . $kode_permohonan
            ];

            $this->M_admin->tambah_keuangan($array);
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
                'isi_pesan' => 'Permohonan Berhasil Diproses'
            ));
            redirect('admin/Menuutama/datapermohonan_admin/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diproses'
            ));
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function upload_hasil()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));
        $pesan = array();
        // Upload Bukti Pembayaran
        $config['upload_path']          = 'assets/berkas/hasil_permohonan/';  // folder upload 
        $config['allowed_types']        = 'png|jpg|jpeg|jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 8000;
        $config['file_name']            = 'HASIL_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('hasil_aktaT')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $aktaT = $file['file_name'];

        $data = [
            'catatan' => 'Permohonan selesai, silahkan ambil berkas anda ke kantor kami. ',
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
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diselesaikan'
            ));
            redirect('admin/Menuutama/datapermohonan_admin/' . $jenis);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diselesaikan'
            ));
            redirect('admin/Menuutama/cek_dokumen/' . $this->input->post('kode_permohonan'));
        }
    }

    public function tolak_dokumen()
    {
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));
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
            redirect('admin/Menuutama/datapermohonan_admin/' . $jenis);
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
        $jenis = htmlspecialchars($this->input->post('jenis_permohonan', true));
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
            redirect('admin/Menuutama/datapermohonan_admin/' . $jenis);
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
            'jenis_layanan' => 'notaris',
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
            $result = $this->M_admin->tambah_permohonan($data);
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
            'jenis_layanan' => 'notaris',
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
            $result = $this->M_admin->tambah_permohonan($data);
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

    public function getKodeSewa()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 4 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_sewa()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload Sertifikat Asli
        $config['upload_path']          = 'assets/berkas/sertif_asli/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SERTIF_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_sertif')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sertif = $file['file_name'];

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
            'jenis_permohonan' => 4,
            'jenis_layanan' => 'notaris',
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'sertif_asli' => $sertif,
            'scan_pbb' => $pbb,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];
        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formperjanjian_sewa');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formperjanjian_sewa');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formperjanjian_sewa');
        }
    }

    public function getKodeRrups()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 5 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_rrups()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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


        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 5,
            'jenis_layanan' => 'notaris',
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_npwp' => $npwp,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];
        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formperubahan_rrups');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formperubahan_rrups');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formperubahan_rrups');
        }
    }

    public function getKodeYayasan()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 6 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_yayasan()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 6,
            'jenis_layanan' => 'notaris',
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_npwp' => $npwp,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formpendirian_yayasan');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formpendirian_yayasan');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formpendirian_yayasan');
        }
    }

    public function tambah_jualbelitanah()
    {
        $pesan = array();

        // Upload Surat Nikah scan_snikah
        $config['upload_path']          = 'assets/berkas/snikah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SNKH_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scansnikah')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $snikah = $file['file_name'];

        // Upload BPJS
        $config['upload_path']          = 'assets/berkas/bpjs/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'BPJS_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_bpjs')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $bpjs = $file['file_name'];

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload Sertif tanah
        $config['upload_path']          = 'assets/berkas/sertif_tanah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SRTF_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sertif_tanah')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sertiftanah = $file['file_name'];

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 9,
            'jenis_layanan' => 'ppat',
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'scan_snikah' => $snikah,
            'scan_bpjs' => $bpjs,
            'scan_npwp' => $npwp,
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_pbb' => $pbb,
            'sertif_tanah' => $sertiftanah,
            'jbtnh_namapenjual' => htmlspecialchars($this->input->post('jbtnh_namapenjual', true)),
            'jbtnh_namapembeli' => htmlspecialchars($this->input->post('jbtnh_namapembeli', true)),
            'jbtnh_nohppenjual' => htmlspecialchars($this->input->post('jbtnh_nohppenjual', true)),
            'jbtnh_nohppembeli' => htmlspecialchars($this->input->post('jbtnh_nohppembeli', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),

            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formjualbelitanah');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formjualbelitanah');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formjualbelitanah');
        }
    }

    public function getKodeJbtnh()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 9 ORDER BY kode_permohonan DESC LIMIT 1");
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



    public function getKodePerlain()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 7 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_perlain()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 7,
            'jenis_layanan' => 'notaris',
            // 'deadline' => htmlspecialchars($this->input->post('deadline', true)),
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formperjanjian_lainlain');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formperjanjian_lainlain');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formperjanjian_lainlain');
        }
    }

    public function laporan_keuangan($start = 0)
    {
        $data['user'] = $this->M_admin->data_user($this->session->userdata('id_user'));
        $data['page_title'] = 'Laporan Keuangan';

        $q = isset($_GET['search']) ? $_GET['search'] : '';
        $data['daftar_akta'] = $this->M_admin->tampil_laporan_keuangan();

        // $this->load->database();
        $jumlah_data = $this->M_admin->jumlah_laporan_keuangan($q);

        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/Menuutama/datapermohonan_admin/');
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
        $data['page_akta'] = $this->M_admin->data_laporan_keuangan($config['per_page'], $start, $q);
        $data['start'] = $start;
        $data['keyword'] = $q;
        $data['Pagination'] = $this->pagination->create_links();

        $this->load->view('backend/template/meta', $data);
        $this->load->view('backend/template/navbar', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/menuutama/laporan_keuangan', $data);
    }

    public function tambah_tukartanah()
    {
        $pesan = array();

        // Upload KTP1
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload KTP2
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $ktp2 = $file['file_name'];

        // Upload KK1
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload KK2
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $kk2 = $file['file_name'];

        // Upload Surat Nikah scan_snikah1
        $config['upload_path']          = 'assets/berkas/snikah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SNKH_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_snikah')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $snikah = $file['file_name'];

        // Upload Surat Nikah scan_snikah2
        $config['upload_path']          = 'assets/berkas/snikah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SNKH_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_snikah2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $snikah2 = $file['file_name'];

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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


        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'PBB_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_pbb2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $pbb2 = $file['file_name'];

        // Upload Sertif tanah
        $config['upload_path']          = 'assets/berkas/sertif_tanah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SRTF_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sertif_tanah')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sertiftanah = $file['file_name'];

        // Upload Sertif tanah
        $config['upload_path']          = 'assets/berkas/sertif_tanah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SRTF_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sertif_tanah2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sertiftanah2 = $file['file_name'];

        // Upload NPWP
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['upload_path']          = 'assets/berkas/npwp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'NPWP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_npwp2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $npwp2 = $file['file_name'];

        // Upload BPJS
        $config['upload_path']          = 'assets/berkas/bpjs/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'BPJS_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_bpjs')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $bpjs = $file['file_name'];

        // Upload BPJS
        $config['upload_path']          = 'assets/berkas/bpjs/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'BPJS_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_bpjs2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $bpjs2 = $file['file_name'];


        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 10,
            'jenis_layanan' => 'ppat',
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
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formtukartanah');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formtukartanah');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formtukartanah');
        }
    }

    public function getKodeTkrtnh()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 10 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_kuasa()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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


        // Upload Sertif / akta
        $config['upload_path']          = 'assets/berkas/sertif_asli/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SERTIF_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sertif_asli')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sertif = $file['file_name'];

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
            'jenis_permohonan' => 11,
            'jenis_layanan' => 'ppat',
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_pbb' => $pbb,
            'sertif_asli' => $sertif,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formkuasa');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formkuasa');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formkuasa');
        }
    }

    public function getKodeKuasa()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 11 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function getKodeBagihak()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 12 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_bagihak()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|zip|rar'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|zip|rar'; // jenis file
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


        //Upload Scan Surat Keterangan Kematian atau Akta Kematian 
        $config['upload_path']          = 'assets/berkas/sk_desa/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/akta_kematian/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload PBB
        $config['upload_path']          = 'assets/berkas/pbb/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
            'jenis_permohonan' => 12,
            'jenis_layanan' => 'ppat',
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'akta_kematian' => $akta_kematian,
            'sk_desa' => $sk_desa,
            'scan_pbb' => $pbb,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formbagihak');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formbagihak');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formbagihak');
        }
    }

    public function getKodeApht()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 13 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_apht()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|zip|rar'; // jenis file
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


        // Upload Scan Sertifikat yang Dijaminkan
        $config['upload_path']          = 'assets/berkas/sertif_asli/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SERTIF_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sertif_asli')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $sertif = $file['file_name'];

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 13,
            'jenis_layanan' => 'ppat',
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'sertif_asli' => $sertif,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formapht');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formapht');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formapht');
        }
    }

    public function getKodeHibah()
    {
        $hasil = $this->db->query("select id_permohonan, kode_permohonan from tb_permohonan WHERE jenis_permohonan = 8 ORDER BY kode_permohonan DESC LIMIT 1");
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

    public function tambah_hibah()
    {
        $pesan = array();

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
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

        // Upload KTP
        $config['upload_path']          = 'assets/berkas/ktp/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KTP_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_ktp2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $ktp2 = $file['file_name'];



        // Upload KK
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|zip|rar'; // jenis file
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

        // Upload KK
        $config['upload_path']          = 'assets/berkas/kk/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|zip|rar'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'KK_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_kk2')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $kk2 = $file['file_name'];


        // Upload Scan Surat Nikah Pemberi Hibah
        $config['upload_path']          = 'assets/berkas/snikah/';  // folder upload 
        $config['allowed_types']        = 'jpg|png|jpeg|pdf'; // jenis file
        $config['max_size']             = 5000;
        $config['file_name']            = 'SNKH_' . $this->input->post('kode_permohonan');

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('scan_snikah')) //sesuai dengan name pada form 
        {
            array_push($pesan, $this->upload->display_errors());
        }
        $file = $this->upload->data();
        $snikah = $file['file_name'];

        $data = [
            'kode_permohonan' => htmlspecialchars($this->input->post('kode_permohonan', true)),
            'pemohon' => htmlspecialchars($this->input->post('id_user', true)),
            'jenis_permohonan' => 8,
            'jenis_layanan' => 'ppat',
            'scan_ktp' => $ktp,
            'scan_kk' => $kk,
            'scan_ktp2' => $ktp2,
            'scan_kk2' => $kk2,
            'scan_snikah' => $snikah,
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'status_permohonan' => 1,
            'tgl_permohonan' => date('Y-m-d'),
            'tahun_permohonan' => date('Y')
        ];

        if (empty($pesan)) {
            $result = $this->M_admin->tambah_permohonan($data);
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Isi Form Dengan Valid!'
            ));
            redirect('admin/Menuutama/formhibah');
        }
        if ($result == true) {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => true,
                'isi_pesan' => 'Permohonan Berhasil Diajukan'
            ));
            redirect('admin/Menuutama/formhibah');
        } else {
            $this->session->set_flashdata('pesan', array(
                'status_pesan' => false,
                'isi_pesan' => 'Permohonan Gagal Diajukan'
            ));
            redirect('admin/Menuutama/formhibah');
        }
    }
}
