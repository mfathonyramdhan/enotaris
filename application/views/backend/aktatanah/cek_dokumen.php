

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
            if (!empty($pesan) && $pesan['status_pesan'] == true) {
                echo '<div class = "alert alert-success">' . $pesan['isi_pesan'] . '</div>';
            } else if (!empty($pesan) && $pesan['status_pesan'] == false) {
                echo '<div class = "alert alert-danger">' . $pesan['isi_pesan'] . '</div>';
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
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Data Pemohon :</h4> 
                            </div>
                            <div class="col-md-5">
                                <h4>Data Tanah :</h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-7">
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
                                                        if($cek_dokumen['alamat'] == ''){
                                                            echo '-';
                                                        }else{
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
                                                        if($cek_dokumen['nik'] == ''){
                                                            echo '-';
                                                        }else{
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
                                                        if($cek_dokumen['no_hp'] == ''){
                                                            echo '-';
                                                        }else{
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
                                <div class="row">
                                    <div class="col-md-5">
                                        Lokasi
                                    </div>
                                    <div class="col-md-1">
                                        :
                                    </div>
                                    <div class="col-md-6">
                                        <?= $cek_dokumen['lokasi_tanah'] ?>
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
                        <br>
                        <h4>Dokumen :</h4>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <a href="<?= base_url('assets/berkas/ktp/'.$cek_dokumen['scan_ktp']) ?>" id="ktp" class="btn btn-info btn-small" target="_blank">Lihat KTP</a>
                            </div>
                            <div class="col-md-3">
                                <a href="<?= base_url('assets/berkas/kk/'.$cek_dokumen['scan_kk']) ?>" class="btn btn-info btn-small" target="_blank">Lihat KK</a>
                            </div>
                            <div class="col-md-3">
                                <a href="<?= base_url('assets/berkas/pbb/'.$cek_dokumen['scan_pbb']) ?>" class="btn btn-info btn-small" target_blank>Lihat KTP</a>
                            </div>
                            <?php if($cek_dokumen['status_permohonan'] == 3){ ?>
                            <div class="col-md-3">
                                <a href="<?= base_url('assets/berkas/bukti_pembayaran/'.$cek_dokumen['bukti_pembayaran']) ?>" class="btn btn-info btn-small" target_blank>Lihat Bukti Pembayaran</a>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($cek_dokumen['status_permohonan'] == 1){ ?>
                        <br>
                            <h4>Catatan :</h4>
                        <br>
                        <form action="<?= base_url('admin/Menuutama/setujui_aktaT') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kode_permohonan" value="<?= $cek_dokumen['kode_permohonan'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="">Biaya</label>
                                    <input type="number" class="form-control" id="" placeholder="Masukkan Biaya" name="biaya" required>
                                </div>
                                <div class="form-group col-8">
                                    <label for="">Catatan</label>
                                    <input type="text" class="form-control" id="" placeholder="Masukkan Catatan" name="catatan" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary align-self-end">Setujui</button>
                                <a href="" class="btn btn-danger align-self-end">Tolak</a>
                            </div>
                        </form>
                        <?php } ?>
                    </div>    
                </div>
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
    $('.datepicker').datepicker();
</script>
</body>

</html>