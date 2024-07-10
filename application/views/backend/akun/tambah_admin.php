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
                        <h3 class="card-title">Tambah Admin</h3>
                    </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                    <form action="<?= base_url('admin/ManajemenAkun/proses_tambah_admin') ?>" method="POST">
                        <div class="card-body">
                        <div class="row">
                            <div class="form-group col-8">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" id="" placeholder="Masukkan Nama Lengkap" name="nama" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="" placeholder="Masukkan Email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="" placeholder="Masukkan Password" name="password1">
                            </div>

                            <div class="form-group col">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="" placeholder="Masukkan ulang password" name="password2">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary align-self-end">Submit</button>
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