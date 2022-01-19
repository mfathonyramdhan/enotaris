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
        <?php if ($user['email'] == '' || $user['no_hp'] == '' || $user['jenis_kelamin'] == '' || $user['alamat'] == '' || $user['tempat_lahir'] == '' || $user['tgl_lahir'] == '' || $user['foto_profil'] == '') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Hello <?= $user['nama'] ?>!</strong> Segera lengkapi data diri anda.
        </div>
      <?php } ?>
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
                                            <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/img/foto_profil/').$user['foto_profil'] ?>" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?= $user['nama'] ?></h3>

                                        <p class="text-muted text-center">
                                            <?php 
                                                if(empty($user['nik'])){
                                                    echo '-';
                                                }else{
                                                    echo $user['nik'];
                                                }
                                            ?>
                                        </p>

                                        <strong><i class="fas fa-book mr-1"></i> Jenis Kelamin</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($user['jenis_kelamin'])){
                                                    echo '-';
                                                }else{
                                                    echo $user['jenis_kelamin'];
                                                }
                                            ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat / Tgl. Lahir</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($user['tempat_lahir']) && empty($user['tgl_lahir'])){
                                                    echo '-';
                                                }else{
                                                    echo $user['tempat_lahir'] . ", " . $user['tgl_lahir'];
                                                }
                                            ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($user['alamat'])){
                                                    echo '-';
                                                }else{
                                                    echo $user['alamat'];
                                                }
                                            ?>
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> No. HP</strong>

                                        <p class="text-muted">
                                            <?php 
                                                if(empty($user['no_hp'])){
                                                    echo '-';
                                                }else{
                                                    echo $user['no_hp'];
                                                }
                                            ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Email</strong>

                                        <p class="text-muted"><?= $user['email'] ?></p>



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
                                    <form action="<?= base_url('admin/ManajemenAkun/update_akun') ?>" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-8">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan Nama Lengkap" value="<?= $user['nama'] ?>" name="nama">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="">NIK</label>
                                                    <input type="number" class="form-control" id="" placeholder="Masukkan NIK" value="<?= $user['nik'] ?>" name="nik">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Email</label>
                                                    <input type="email" class="form-control" id="" placeholder="Masukkan Email" value="<?= $user['email'] ?>" name="email">
                                                </div>

                                                <div class="form-group col">
                                                    <label for="">No Telp/HP</label>
                                                    <input type="number" class="form-control" id="" placeholder="Masukkan No. Telp/HP" value="<?= $user['no_hp'] ?>" name="no_hp">
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
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan Alamat" value="<?= $user['alamat'] ?>" name="alamat">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label for="">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan Tempat Lahir" value="<?= $user['tempat_lahir'] ?>" name="tempat_lahir">
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tgl_lahir" value="<?= $user['tgl_lahir'] ?>" name="tgl_lahir">
                                                    <span class="text-danger" id="notif"></span>
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
                                                            <input type="hidden" value="<?= $user['foto_profil'] ?>" name="image1">
                                                            <input type="file" class="form-control" id="image" name="image">
                                                            <!-- <label class="custom-file-label" for="exampleInputFile">Pilih file (.png/.jpg/.jpeg)</label> -->
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label for="">Password</label>
                                                    <input type="hidden" name="password1" value="<?= $user['password'] ?>">
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

    var coba = $('#tgl_lahir').val();
    console.log(coba);

    $(function() {
    $("#tgl_lahir").on("change",function(){
        var selected = $(this).val();
        var date1 = new Date(selected);
        var date2 = new Date();
        var waktu = date2.getTime() - date1.getTime();
        var tahun = waktu/(1000*3600*24*365);
        var hasil = Math.ceil(tahun);
        if(hasil < 17){
            $('#notif').html('*Usia harus lebih dari atau sama dengan 17 Tahun')
        }
    });
});
</script>
</body>

</html>