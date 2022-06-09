<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $page_title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $page_title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    $pesan = $this->session->flashdata('pesan');
    if (!empty($pesan)) {
        if ($pesan['status_pesan'] == true && !empty($pesan)) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Berhasil",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "success",
                            confirmButtonText: "Close"
                        });
                    </script>';
        } else if ($pesan['status_pesan'] == false && !empty($pesan)) {
            echo '
                    <script>
                        Swal.fire({
                            title: "Gagal",
                            text: "' . $pesan['isi_pesan'] . '",
                            type: "error",
                            confirmButtonText: "Close"
                        });
                    </script>';
        }
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Riwayat</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <?php if ($cek_dokumen['status_permohonan'] == 3 || $cek_dokumen['status_permohonan'] == 4) { ?>
                        <div class="text-right">
                            <a href="<?= base_url('assets/berkas/bukti_pembayaran/' . $cek_dokumen['bukti_pembayaran']) ?>" class="btn btn-info btn-small" target_blank>Lihat Bukti Pembayaran</a>
                        </div>
                    <?php } ?>
                    <!-- AKTA TANAH -->
                    <?php if ($cek_dokumen['jenis_permohonan'] == 1) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h4>Data Tanah :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        Lokasi
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-6">
                                        <?= $cek_dokumen['lokasi'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        Luas Tanah
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-6">
                                        <?= $cek_dokumen['luas_tanah'] ?> m2
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        Status Kepemilikan
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-6">
                                        <?= $cek_dokumen['status_kepemilikan'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PERJANJIAN SEWA -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 4) { ?>
                        <h4>Data Pemohon :</h4>
                        <br>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Nama Lengkap</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p><?= $cek_dokumen['nama'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p><?= $cek_dokumen['email'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Alamat</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['alamat'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['alamat'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>NIK</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['nik'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['nik'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>No.Telp</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-7">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['no_hp'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['no_hp'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PENDIRIAN CV / PT -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 2) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h4>Data CV / PT :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        Nama CV / PT
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-6">
                                        <?= $cek_dokumen['nama_cv'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        Bidang Usaha
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-6">
                                        <?= $cek_dokumen['bidang_usaha'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        Lokasi CV / PT
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-6">
                                        <?= $cek_dokumen['lokasi'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- WARIS -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 3) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- PERUBAHAN RRUPS & PENDIRIAN YAYASAN-->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 5 | 6) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- perjanjian lain lain -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 7) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- 08 - hibah -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 8) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- 09 - jbtnh -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 9) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">


                                <h4>Data Jual Beli Tanah :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Nama Penjual</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['jbtnh_namapenjual'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['jbtnh_namapenjual'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Nama Pembeli</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['jbtnh_namapembeli'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['jbtnh_namapembeli'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <p>No. HP Penjual</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['jbtnh_nohppenjual'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['jbtnh_nohppenjual'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <p>No. HP Pembeli</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['jbtnh_nohppembeli'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['jbtnh_nohppembeli'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <!-- 10 - tkrtnh -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 10) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">


                                        <h4>Data Tukar Tanah :</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Pihak 1</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['tkrtnh_namapihak1'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['tkrtnh_namapihak1'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Pihak 2</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['tkrtnh_namapihak2'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['tkrtnh_namapihak2'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>No. HP Pihak 1</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['tkrtnh_nohppihak1'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['tkrtnh_nohppihak1'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>No. HP Pihak 2</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['tkrtnh_nohppihak2'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['tkrtnh_nohppihak2'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- 11 - kuasa  -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 11) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-md-5">
                                <h4>Data Tukar Tanah :</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Nama Pihak 1</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['tkrtnh_namapihak1'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['tkrtnh_namapihak1'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <p>Nama Pihak 2</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['tkrtnh_namapihak2'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['tkrtnh_namapihak2'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <p>No. HP Pihak 1</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['tkrtnh_nohppihak1'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['tkrtnh_nohppihak1'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <p>No. HP Pihak 2</p>
                                    </div>
                                    <div class="col-md-1">
                                        <p>:</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p>
                                            <?php
                                            if ($cek_dokumen['tkrtnh_nohppihak2'] == '') {
                                                echo '-';
                                            } else {
                                                echo $cek_dokumen['tkrtnh_nohppihak2'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <!-- 12 - kuasa -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 12) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>



                        </div>

                        <!-- 13 - apht -->
                    <?php } elseif ($cek_dokumen['jenis_permohonan'] == 13) { ?>
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Nama Akun Pemohon</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['nama'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><?= $cek_dokumen['email'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>Alamat</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-5">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['alamat'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['alamat'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>NIK</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['nik'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['nik'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No.Telp</p>
                                            </div>
                                            <div class="col-md-1">
                                                <p>:</p>
                                            </div>
                                            <div class="col-md-7">
                                                <p>
                                                    <?php
                                                    if ($cek_dokumen['no_hp'] == '') {
                                                        echo '-';
                                                    } else {
                                                        echo $cek_dokumen['no_hp'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>



                        </div>

                    <?php } ?>
                    <br>
                    <h4>Dokumen :</h4>
                    <br>
                    <div class="row justify-content-center">
                        <!-- akta tanah -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 1) { ?>

                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/pbb/' . $cek_dokumen['scan_pbb']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat PBB</a>
                            </div>
                        <?php } ?>

                        <!-- pendirian cv/pt -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 2) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/pbb/' . $cek_dokumen['scan_pbb']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat PBB</a>
                            </div>

                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/npwp/' . $cek_dokumen['scan_npwp']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat NPWP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/foto_direktur/' . $cek_dokumen['foto_direktur']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat Foto Direktur</a>
                            </div>
                        <?php } ?>

                        <!-- WARIS -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 3) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/sk_desa/' . $cek_dokumen['sk_desa']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat SK dari Desa</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/akta_kematian/' . $cek_dokumen['akta_kematian']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat SK / Akta Kematian</a>
                            </div>

                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/sp_ahli_waris/' . $cek_dokumen['sp_ahli_waris']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat SP Ahli Waris</a>
                            </div>
                        <?php } ?>

                        <!-- perjanjian sewa -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 4) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/pbb/' . $cek_dokumen['scan_pbb']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat PBB</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/sertif_asli/' . $cek_dokumen['sertif_asli']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat Sertifikat Asli</a>
                            </div>
                        <?php } ?>

                        <!-- perubahan rrups-->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 5) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>


                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/npwp/' . $cek_dokumen['scan_npwp']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat NPWP</a>
                            </div>

                        <?php } ?>

                        <!-- pendirian yayasan -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 6) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>


                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/npwp/' . $cek_dokumen['scan_npwp']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Lihat NPWP</a>
                            </div>

                        <?php } ?>

                        <!-- pendirian yayasan -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 7) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>

                        <?php } ?>

                        <!-- pendirian yayasan -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 7) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>

                        <?php } ?>

                        <!-- hibah-->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 8) { ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP Pemberi</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK Pemberi</a>
                            </div>

                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/scan_snikah/' . $cek_dokumen['scan_snikah']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Surat Nikah Pemberi</a>
                            </div>

                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/ktp2/' . $cek_dokumen['scan_ktp2']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP Penerima</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK Penerima</a>
                            </div>



                        <?php } ?>

                        <!-- jbtnh -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 9) { ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP Penjual</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK Penjual</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/npwp/' . $cek_dokumen['scan_npwp']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat NPWP Penjual</a>
                                </div>



                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/snikah/' . $cek_dokumen['scan_snikah']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat Surat Nikah Penjual</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/pbb/' . $cek_dokumen['scan_pbb']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Scan PBB</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/sertif_tanah/' . $cek_dokumen['sertif_tanah']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Scan Sertif Tanah</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/bpjs/' . $cek_dokumen['scan_bpjs']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat BPJS Pembeli</a>
                                </div>
                            </div>

                        <?php } ?>

                        <!-- jbtnh -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 10) { ?>
                            <div class="row" style="padding-bottom: 50px;">
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">KTP Pihak 1</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">KK Pihak 1</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/snikah/' . $cek_dokumen['scan_snikah']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Surat Nikah Pihak 1</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/pbb/' . $cek_dokumen['scan_pbb']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Scan PBB Pihak 1</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/sertif_tanah/' . $cek_dokumen['sertif_tanah']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Sertif Tanah Pihak 1</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/bpjs/' . $cek_dokumen['scan_bpjs']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">BPJS Pihak 1</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/npwp/' . $cek_dokumen['scan_npwp']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">NPWP Pihak 1</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">KTP Pihak 2</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">KK Pihak 2</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/snikah/' . $cek_dokumen['scan_snikah2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Surat Nikah Pihak 2</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/pbb/' . $cek_dokumen['scan_pbb2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Scan PBB Pihak 2</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/sertif_tanah/' . $cek_dokumen['sertif_tanah2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Sertif Tanah Pihak 2</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/bpjs/' . $cek_dokumen['scan_bpjs2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">BPJS Pihak 2</a>
                                </div>

                                <div class="col-md-2">
                                    <a href="<?= base_url('assets/berkas/npwp/' . $cek_dokumen['scan_npwp2']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">NPWP Pihak 2</a>
                                </div>
                            </div>

                        <?php } ?>

                        <!-- 11 - kuasa  -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 11) { ?>
                            <div class="row" style="padding-bottom: 50px;">
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP </a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                                </div>

                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/sertif_asli/' . $cek_dokumen['sertif_asli']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Akta / Sertifikat</a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/pbb/' . $cek_dokumen['scan_pbb']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat PBB</a>
                                </div>

                            </div>

                        <?php } ?>

                        <!-- 12 - kuasa -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 12) { ?>
                            <div class="row" style="padding-bottom: 50px;">
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP Ahli Waris</a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK Ahli Waris</a>
                                </div>

                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/sk_desa/' . $cek_dokumen['sk_desa']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Surat Waris dari Desa</a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/akta_kematian/' . $cek_dokumen['akta_kematian']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Akta Kematian</a>
                                </div>

                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/sertif_asli/' . $cek_dokumen['sertif_asli']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Akta Tanah</a>
                                </div>

                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/scan_pbb/' . $cek_dokumen['scan_pbb']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat PBB</a>
                                </div>

                            </div>

                        <?php } ?>

                        <!-- 13 - apht -->
                        <?php if ($cek_dokumen['jenis_permohonan'] == 13) { ?>
                            <div class="row" style="padding-bottom: 50px;">
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/ktp/' . $cek_dokumen['scan_ktp']) ?>" target="_blank" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP </a>
                                </div>
                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/kk/' . $cek_dokumen['scan_kk']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                                </div>


                                <div class="col">
                                    <a href="<?= base_url('assets/berkas/sertif_asli/' . $cek_dokumen['sertif_asli']) ?>" target="_blank" class="btn btn-info btn-small" target="_blank">Lihat Sertifikat Jaminan</a>
                                </div>


                            </div>

                        <?php } ?>

                    </div>

                    <?php if ($cek_dokumen['status_permohonan'] == 1) { ?>
                        <br>
                        <br>
                        <div class="row justify-content-center">
                            <a href="#" onclick="form_setujui()" id="setujui" class="btn btn-primary align-self-end">Setujui</a>&nbsp
                            <a href="#" onclick="form_tolak()" id="tolak" class="btn btn-danger align-self-end">Tolak</a>
                        </div>
                    <?php } ?>

                    <div id="form_setujui">
                        <form action="<?= base_url('admin/Menuutama/setujui_permohonan') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kode_permohonan" value="<?= $cek_dokumen['kode_permohonan'] ?>">
                            <input type="hidden" name="jenis_permohonan" value="<?= $cek_dokumen['jenis_permohonan'] ?>">
                            <div class="row justify-content-center">
                                <div class="form-group col-8">
                                    <label for="">Biaya</label>
                                    <input type="number" class="form-control" id="" min="0" placeholder="Masukkan Biaya" name="biaya" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="">Estimasi Penyelesaian Permohonan</label>
                                    <input type="date" class="form-control" id="" name="deadline" required>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>

                    <div id="form_tolak">
                        <form action="<?= base_url('admin/Menuutama/tolak_dokumen') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kode_permohonan" value="<?= $cek_dokumen['kode_permohonan'] ?>">
                            <div class="row justify-content-center">
                                <div class="form-group col-8">
                                    <label for="">Alasan Penolakan</label>
                                    <input type="text" class="form-control" id="" placeholder="Masukkan Keterangan Alasan Penolakan" name="catatan" required>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                    <?php if ($cek_dokumen['status_permohonan'] == 3) { ?>
                        <br>
                        <br>
                        <div class="row justify-content-center">
                            <form action="<?= base_url('admin/Menuutama/proses_permohonan') ?>" method="POST">
                                <input type="hidden" name="kode_permohonan" value="<?= $cek_dokumen['kode_permohonan'] ?>">
                                <input type="hidden" name="jenis_permohonan" value="<?= $cek_dokumen['jenis_permohonan'] ?>">
                                <button type="submit" class="btn btn-primary align-self-end">Proses Permohonan</button>
                                <a href="<?= base_url('admin/Menuutama/tolak_pembayaran/' . $cek_dokumen['kode_permohonan']) ?>" class="btn btn-danger align-self-end">Tolak</a>

                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <br>
            <?php if ($cek_dokumen['status_permohonan'] == 4) { ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload File Dokumen Hasil Permohonan</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="<?= base_url('admin/Menuutama/upload_hasil') ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload File Dokumen Hasil Permohonan</label>
                                    <div class="custom-file">
                                        <input type="hidden" name="kode_permohonan" value="<?= $cek_dokumen['kode_permohonan'] ?>">
                                        <input type="hidden" name="jenis_permohonan" value="<?= $cek_dokumen['jenis_permohonan'] ?>">
                                        <input type="file" class="form-control" id="exampleInputFile" name="hasil_aktaT">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary align-self-end">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
            <?php if ($cek_dokumen['status_permohonan'] == 5) { ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Berkas Hasil</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <center>
                            <div class="col-md-3">
                                <a href="<?= base_url('assets/berkas/hasil_permohonan/' . $cek_dokumen['berkas_hasil']) ?>" target="_blank" class="btn btn-info btn-small" target_blank>Download Berkas</a>
                            </div>
                        </center>
                    </div>
                </div>
            <?php } ?>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('backend/template/footer') ?>


</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('backend/template/js') ?>

<script>
    $('#form_setujui').hide();
    $('#form_tolak').hide();

    $('.datepicker').datepicker();

    function form_setujui() {
        var x = document.getElementById("form_setujui");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function form_tolak() {
        var x = document.getElementById("form_tolak");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
</body>

</html>