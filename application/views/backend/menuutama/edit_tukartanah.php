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
                    <h3 class="card-title">Formulir Tukar Menukar Tanah</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('user/Menuutama/update_tukartanah') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="kode_permohonan" id="kode_permohonan" value="<?= $dokumen['kode_permohonan'] ?>">
                    <input type="hidden" name="jenis_permohonan" id="jenis_permohonan" value="<?= $dokumen['jenis_permohonan'] ?>">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $dokumen['pemohon'] ?>">

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col" id="item_auto">
                                <label for="">Nama Pihak Penukar 1</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="tkrtnh_namapihak1" value="<?= $dokumen['tkrtnh_namapihak1'] ?>" required>
                            </div>

                            <div class="form-group col" id="item_auto">
                                <label for="">Nama Pihak Penukar 2</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="tkrtnh_namapihak2" value="<?= $dokumen['tkrtnh_namapihak2'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">No. HP Pihak Penukar 1</label>
                                <input type="number" class="form-control" id="" placeholder="Masukkan Lokasi tanah" name="tkrtnh_nohppihak1" value="<?= $dokumen['tkrtnh_nohppihak1'] ?>" required>
                            </div>
                            <div class="form-group col">
                                <label for="">No. HP Pihak Penukar 2</label>
                                <input type="number" class="form-control" id="" placeholder="Masukkan luas tanah" name="tkrtnh_nohppihak2" value="<?= $dokumen['tkrtnh_nohppihak2'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan KTP Pihak Penukar 1</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_ktp1" value="<?= $dokumen['scan_ktp'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_ktp">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan KTP Pihak Penukar 2</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_ktp2_1" value="<?= $dokumen['scan_ktp2'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_ktp2">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan KK Pihak Penukar 1</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_kk1" value="<?= $dokumen['scan_kk'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_kk">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan KK Pihak Penukar 2</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_kk2_1" value="<?= $dokumen['scan_kk2'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_kk2">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Surat Nikah Pihak Penukar 1</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_snikah1" value="<?= $dokumen['scan_snikah'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_snikah">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Surat Nikah Pihak Penukar 2</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_snikah2_1" value="<?= $dokumen['scan_snikah2'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_snikah2">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan PBB Tanah Pihak Penukar 1</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_pbb1" value="<?= $dokumen['scan_pbb'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_pbb">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan PBB Tanah Pihak Penukar 2</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_pbb2_1" value="<?= $dokumen['scan_pbb2'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_pbb2">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan Sertifikat Tanah Pihak Penukar 1</label>
                                <div class="custom-file">
                                    <input type="hidden" name="sertif_tanah1" value="<?= $dokumen['sertif_tanah'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="sertif_tanah">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan Sertifikat Tanah Pihak Penukar 2</label>
                                <div class="custom-file">
                                    <input type="hidden" name="sertif_tanah2_1" value="<?= $dokumen['sertif_tanah2'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="sertif_tanah2">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan NPWP Pihak Penukar 1</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_npwp1" value="<?= $dokumen['scan_npwp'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_npwp">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan NPWP Pihak Penukar 2</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_npwp2_1" value="<?= $dokumen['scan_npwp2'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_npwp2">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan BPJS Pihak Penukar 1</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_bpjs1" value="<?= $dokumen['scan_bpjs'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_bpjs">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>

                            <div class="form-group col">
                                <label for="exampleInputFile">Upload Scan BPJS Pihak Penukar 2</label>
                                <div class="custom-file">
                                    <input type="hidden" name="scan_bpjs2_1" value="<?= $dokumen['scan_bpjs2'] ?>">
                                    <input type="file" class="form-control" id="exampleInputFile" name="scan_bpjs2">
                                    <span class="text-danger">*Masukkan file berformat .pdf</span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-12" id="item_auto">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan keterangan" name="keterangan" value="<?= $dokumen['keterangan'] ?>" required>
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