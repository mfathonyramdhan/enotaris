<?php $this->load->view('backend/template/meta') ?>
<div class="wrapper">


    <!-- Navbar -->
    <?php $this->load->view('backend/template/navbar') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('backend/template/sidebar') ?>

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
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Lokasi</label>
                                    <input type="text" class="form-control" id="" placeholder="Masukkan Lokasi tanah">
                                </div>
                                <div class="form-group col">
                                    <label for="">Luas Tanah (m2)</label>
                                    <input type="number" class="form-control" id="" placeholder="Masukkan luas tanah">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label>Status kepemilikan</label>
                                    <select class="form-control">
                                        <option selected disabled>Pilih status kepemilikan tanah :</option>
                                        <option>Milik Sendiri</option>
                                        <option>Milik Orang Tua</option>
                                        <option>Milik Pemerintah</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan KTP</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Pilih file (.pdf)</label>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan KK</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Pilih file (.pdf)</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="exampleInputFile">Upload Scan PBB</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Pilih file (.pdf)</label>
                                        </div>

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