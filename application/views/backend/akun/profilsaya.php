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
                        <h3 class="card-title">Profil Saya</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/images') ?>/user4-128x128.jpg" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center">Sinta Dwi Ayu</h3>

                                        <p class="text-muted text-center">351210088000999</p>

                                        <strong><i class="fas fa-book mr-1"></i> Jenis Kelamin</strong>

                                        <p class="text-muted">
                                            Perempuan
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat / Tgl. Lahir</strong>

                                        <p class="text-muted">Jember, 20 Januari 1998</p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                        <p class="text-muted">Jl. Mastrip RT. 001 RW. 011</p>

                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> No. HP</strong>

                                        <p class="text-muted">+6281 358 835 721</p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Email</strong>

                                        <p class="text-muted">sintiaadmin@gmail.com</p>



                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Update Data Profil</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-8">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="" placeholder="Sinta Dwi Ayu">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="">NIK</label>
                                                    <input type="number" class="form-control" id="" placeholder="351210088000999">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" id="" placeholder="sintiaadmin@gmail.com

">
                                                </div>

                                                <div class="form-group col">
                                                    <label for="">No Telp/HP</label>
                                                    <input type="number" class="form-control" id="" placeholder="+6281 358 835 721

">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" placeholder"perempuan>
                                                        <option selected disabled>Pilih :</option>
                                                        <option>Laki - Laki</option>
                                                        <option>Perempuan</option>

                                                    </select>

                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Alamat</label>
                                                    <input type="text" class="form-control" id="" placeholder="Jl. Mastrip RT. 001 RW. 011

">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="" placeholder="Jember">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="" placeholder="01/20/1998">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="exampleInputFile">Foto Profil</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Pilih file (.png/.jpg/.jpeg)</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Password</label>
                                                    <input type="password" class="form-control" id="" placeholder="Masukkan password baru">
                                                </div>
                                            </div>


                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary align-self-end">Simpan Perubahan</button>
                                            </div>
                                    </form>
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>

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