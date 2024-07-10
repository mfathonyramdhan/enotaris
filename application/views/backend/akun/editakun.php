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
                        <h3 class="card-title">Edit Data Akun</h3>
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
                                            <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/img/foto_profil/').$detail_akun['foto_profil'] ?>" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?= $detail_akun['nama'] ?></h3>

                                        <p class="text-muted text-center">
                                            <?php 
                                                if(empty($detail_akun['nik'])){
                                                    echo '-';
                                                }else{
                                                    echo $detail_akun['nik'];
                                                }
                                            ?>
                                        </p>

                                        <strong><i class="fas fa-book mr-1"></i> Jenis Kelamin</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($detail_akun['jenis_kelamin'])){
                                                    echo '-';
                                                }else{
                                                    echo $detail_akun['jenis_kelamin'];
                                                }
                                            ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat / Tgl. Lahir</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($detail_akun['tempat_lahir']) && empty($detail_akun['tgl_lahir'])){
                                                    echo '-';
                                                }else{
                                                    echo $detail_akun['tempat_lahir'] . ", " . $detail_akun['tgl_lahir'];
                                                }
                                            ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($detail_akun['alamat'])){
                                                    echo '-';
                                                }else{
                                                    echo $detail_akun['alamat'];
                                                }
                                            ?>
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> No. HP</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($detail_akun['no_hp'])){
                                                    echo '-';
                                                }else{
                                                    echo $detail_akun['no_hp'];
                                                }
                                            ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Email</strong>

                                        <p class="text-muted"><?= $detail_akun['email'] ?></p>



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
                                    <form action="<?= base_url('admin/ManajemenAkun/proses_edit_akun') ?>" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="<?= $detail_akun['id_user'] ?>">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-8">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan Nama Lengkap" value="<?= $detail_akun['nama'] ?>" name="nama">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="">NIK</label>
                                                    <input type="number" class="form-control" id="" placeholder="Masukkan NIK" value="<?= $detail_akun['nik'] ?>" name="nik">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" id="" placeholder="Masukkan Email" value="<?= $detail_akun['email'] ?>" name="email">
                                                </div>

                                                <div class="form-group col">
                                                    <label for="">No Telp/HP</label>
                                                    <input type="number" class="form-control" id="" placeholder="Masukkan No. Telp/HP" value="<?= $detail_akun['no_hp'] ?>" name="no_hp">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <option selected disabled>Pilih :</option>
                                                        <option value="Laki-Laki">Laki - Laki</option>
                                                        <option value="Perempuan">Perempuan</option>

                                                    </select>

                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Alamat</label>
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan Alamat" value="<?= $detail_akun['alamat'] ?>" name="alamat">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan Tempat Lahir" value="<?= $detail_akun['tempat_lahir'] ?>" name="tempat_lahir">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="" value="<?= $detail_akun['tgl_lahir'] ?>" name="tgl_lahir">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="exampleInputFile">Foto Profil</label>
                                                    <br/>
                                                    <img src="#" id="preview" style="max-width: 50%;">
                                                    <br/>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="hidden" value="<?= $detail_akun['foto_profil'] ?>" name="image1">
                                                            <input type="file" class="form-control" id="image" name="image">
                                                            <!-- <label class="custom-file-label" for="exampleInputFile">Pilih file (.png/.jpg/.jpeg)</label> -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Password</label>
                                                    <input type="hidden" name="password1" value="<?= $detail_akun['password'] ?>">
                                                    <input type="password" class="form-control" id="" placeholder="Masukkan password baru" name="password">
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function() {
    readURL(this);
    });
</script>
</body>

</html>