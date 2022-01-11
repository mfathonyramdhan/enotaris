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
                        <h3 class="card-title">Formulir Permohonan Client</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-8">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="" placeholder="Nama Lengkap Client">
                                </div>
                                <div class="form-group col-4">
                                    <label for="">NIK</label>
                                    <input type="number" class="form-control" id="" placeholder="NIK Client">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" id="" placeholder="Alamat Email Client">
                                </div>
                                <div class="form-group col">
                                    <label for="">No Telp/HP</label>
                                    <input type="text" class="form-control" id="" placeholder="No Telp/HP Client">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" id="" placeholder="Alamat Client">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Jenis Pengurusan</label>
                                    <select class="form-control">
                                        <option selected disabled>Pilih Jenis Pengurusan :</option>
                                        <option>Akta Tanah</option>
                                        <option>Pendirian CV/PT</option>
                                        <option>Waris</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-8">
                                    <label for="">Lokasi</label>
                                    <input type="text" class="form-control" id="" placeholder="Masukkan Lokasi">
                                </div>
                                <div class="form-group col-4">
                                    <label for="">Keterangan Permohonan Pengurusan/Sifat Akta</label>
                                    <input type="number" class="form-control" id="" placeholder="Masukkan keterangan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" name="" class="form-control">
                                </div>
                                <div class="form-group col">
                                    <label>Tanggal Deadline</label>
                                    <input type="date" name="" class="form-control">
                                </div>
                            </div>
                            <hr style="border-bottom: 1px dashed #000" />
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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