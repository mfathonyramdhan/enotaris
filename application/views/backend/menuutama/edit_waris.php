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
                    <h3 class="card-title">Formulir Pengurusan Hak Waris</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('user/Menuutama/update_waris') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="kode_permohonan" id="kode_permohonan" value="<?= $dokumen['kode_permohonan'] ?>">
                    <input type="hidden" name="jenis_permohonan" id="jenis_permohonan" value="<?= $dokumen['jenis_permohonan'] ?>">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $dokumen['pemohon'] ?>">
                    <div class="card-body">

                        <div class="row">

                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan Surat Keterangan Dari Desa atau Lurah Setempat</label>
                                <div class="custom-file">
                                    <input type="hidden" name="sk_desa1" value="<?= $dokumen['sk_desa'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="sk_desa">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan Surat Keterangan Kematian atau Akta Kematian</label>
                                <div class="custom-file">
                                    <input type="hidden" name="akta_kematian1" value="<?= $dokumen['akta_kematian'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="akta_kematian">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan Surat Pernyataan Ahli Waris Bermaterai</label>
                                <div class="custom-file">
                                    <input type="hidden" name="sp_ahli_waris1" value="<?= $dokumen['sp_ahli_waris'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="sp_ahli_waris">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan Kartu Keluarga</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_kk1" value="<?= $dokumen['scan_kk'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_kk">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan KTP</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_ktp1" value="<?= $dokumen['scan_ktp'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_ktp">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>


                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                </form>
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