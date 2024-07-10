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
                    <h3 class="card-title">Konfirmasi Pembayaran</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="row">
                        <h4>Lakukan Pembayaran Sebesar :</h4>
                        <h4 class="bg bg-warning" style="border-radius: 5%; padding:5px; margin-left:10px;">Rp. <?= $permohonan['biaya'] ?></h4>
                    </div>
                    <div class="row">
                        <h4>Ke Rekening : </h4>
                    </div>
                    <div>
                        <div class="imgPembayaran" style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 300px;
                            padding-bottom: 20px;">
                            <img src="<?= base_url('/assets/img/pembayaran/bankBri.png') ?>" class="img-fluid" alt="" data-aos="fade-up" class="section-title text-center wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;" />
                        </div>

                        <h3 style="text-align: center;">7748-01-004303-53-6</h3>
                        <p style="text-align: center;">BRI a/n <strong>Sherli Hardhyarti</strong> </p>
                    </div>
                    <form action="<?= base_url('user/Menuutama/proses_bayar') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Bukti Pembayaran</label>
                                <div class="custom-file">
                                    <input type="hidden" name="kode_permohonan" value="<?= $permohonan['kode_permohonan'] ?>">
                                    <input type="hidden" name="jenis_permohonan" value="<?= $permohonan['jenis_permohonan'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="bukti_pembayaran">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary align-self-end">Upload</button>
                        </div>
                    </form>
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