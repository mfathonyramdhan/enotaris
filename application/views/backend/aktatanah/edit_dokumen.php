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
                    <h3 class="card-title">Formulir Permohonan Akta Tanah oleh Client</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('user/Menuutama/update_dokumen_aktaT') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="kode_permohonan" id="kode_permohonan" value="<?= $dokumen['kode_permohonan'] ?>">
                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Lokasi</label>
                                <input type="text" class="form-control" id="" placeholder="Masukkan Lokasi tanah" name="lokasi" value="<?= $dokumen['lokasi'] ?>" required>
                            </div>
                            <div class="form-group col">
                                <label for="">Luas Tanah (m2)</label>
                                <input type="number" class="form-control" id="" placeholder="Masukkan luas tanah" name="luas_tanah" value="<?= $dokumen['luas_tanah'] ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-8">
                                <label>Status kepemilikan</label>
                                <select class="form-control" name="status_kepemilikan" required>
                                    <option selected disabled>Pilih status kepemilikan tanah :</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Milik Orang Tua">Milik Orang Tua</option>
                                    <option value="Milik Pemerintah">Milik Pemerintah</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="">Deadline</label>
                                <input type="date" class="form-control" id="" placeholder="Masukkan Deadline" name="deadline" value="<?= $dokumen['deadline'] ?>" required>
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

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan KK</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_kk1" value="<?= $dokumen['scan_kk'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_kk">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan PBB</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_pbb1" value="<?= $dokumen['scan_pbb'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_pbb">
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