

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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Akun User dan Admin</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <input type="text" name="search" class="form-control float-right" placeholder="Cari">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>NIK</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $start + 1; ?>
                                        <?php if (count($page_akun) > 0) : ?>
                                        <?php foreach ($page_akun as $b) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td> <?= $b['nama'] ?> </td>

                                                <td class="align-middle">
                                                    <?php
                                                        if(!empty($b['jenis_kelamin'])){
                                                            echo $b['jenis_kelamin'];
                                                        }else{
                                                            echo "-";
                                                        }
                                                    ?>
                                                </td>

                                                <td>
                                                    <?php
                                                        if(!empty($b['nik'])){
                                                            echo $b['nik'];
                                                        }else{
                                                            echo "-";
                                                        }
                                                    ?>
                                                </td>

                                                <td><?= $b['email'] ?> </td>

                                                <td>
                                                    <?php
                                                        if(!empty($b['no_hp'])){
                                                            echo $b['no_hp'];
                                                        }else{
                                                            echo "-";
                                                        }
                                                    ?>
                                                </td>

                                                <td><?= $b['nama_level'] ?> </td>

                                            <td><a href="<?php echo base_url('admin/ManajemenAkun/editakun/').$b['id_user'] ?>"><span class="badge bg-primary" style="margin-right: 10px;"> Edit Data</span></a><a href="#" data-toggle="modal" data-target="#removeModal"><span class="badge bg-danger">Hapus</span></a></td>


                                        </tr>
                                        <?php } ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="9" align="center">
                                                Data tidak ditemukan
                                            </td>
                                        </tr>
                                    <?php endif ?>

                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                            <?php
                                echo $Pagination;
                            ?>
                            </div>
                        </div>
                        <!-- /.card -->
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

<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan menghapus akun ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data ini akan dihapus secara permanen.</div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="<?= base_url('admin/ManajemenAkun/hapus_akun/') . $b['id_user'] ?>">Remove</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<?php $this->load->view('backend/template/js') ?>
<script>
    $('.datepicker').datepicker();
</script>
</body>

</html>