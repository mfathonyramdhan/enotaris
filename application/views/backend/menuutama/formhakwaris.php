

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
                        <h3 class="card-title">Formulir Pengurusan Hak Waris</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('#') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="kode_permohonan" id="kode_permohonan">
                        <div class="card-body">
                            

                           

                            <div class="row">

                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan Surat Keterangan Dari Desa atau Lurah Setempat</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="scan_ktp">
                                        <span class="text-danger">*Masukkan file berformat .pdf</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan Surat Keterangan Kematian atau Akta Kematian</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="scan_kk">
                                        <span class="text-danger">*Masukkan file berformat .pdf</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan Surat Pernyataan Ahli Waris Bermaterai</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="scan_pbb">
                                        <span class="text-danger">*Masukkan file berformat .pdf</span>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan Kartu Keluarga</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="scan_pbb">
                                       <span class="text-danger">*Masukkan file berformat .pdf</span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan KTP</label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="scan_pbb">
                                        <span class="text-danger">*Masukkan file berformat .pdf</span>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="#" class="btn btn-primary">Ajukan</button>
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

    $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>user/Menuutama/getKodeAkta',
                beforeSend: function() {
                    $('.loading').show();
                },
                success: function(data) {

                    var html = JSON.parse(data);
                    var kode = 'AKNAH_' + html;
                    var nodaf = kode;
                    $('#kode_permohonan').val(nodaf);
                }
            });
        });

    $(document).ready(function() {

    $('#nama').autocomplete({
        source: "<?php echo site_url('admin/Menuutama/get_user'); ?>",
        select: function(event, ui) {
            $("#id_user").val(ui.item.id_dosen);
            $("#nama").val(ui.item.description);
        }
    });
    $('#nama').select();
    });
</script>
</body>

</html>