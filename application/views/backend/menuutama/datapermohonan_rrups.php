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
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 300px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Cari">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title"><?php echo $page_title ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Kode Pengajuan Permohonan</th>
                                <th>Nama Pemohon</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Permohonan</th>
                                <th style="width: 40px">Status</th>
                                <th style="width: 200px">Keterangan</th>
                                <th style="width: 200px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $start + 1; ?>
                            <?php if (count($page_akta) > 0) : ?>
                                <?php foreach ($page_akta as $b) { ?>
                                    <tr>
                                        <td> <?= $no++ ?> </td>
                                        <td> <?= $b['kode_permohonan'] ?> </td>
                                        <td> <?= $b['nama'] ?> </td>
                                        <td> <?= $b['tgl_permohonan'] ?> </td>
                                        <td> <?= $b['nama_jenis_permohonan'] ?> </td>
                                        <td>
                                            <?php if ($b['status_permohonan'] == 1) { ?>
                                                <span class="badge bg-warning"><?= $b['nama_status_permohonan'] ?></span>
                                            <?php } else if ($b['status_permohonan'] == 2 || $b['status_permohonan'] == 5) { ?>
                                                <span class="badge bg-primary"><?= $b['nama_status_permohonan'] ?></span>
                                            <?php } else if ($b['status_permohonan'] == 3) { ?>
                                                <span class="badge bg-info"><?= $b['nama_status_permohonan'] ?></span>
                                            <?php } else if ($b['status_permohonan'] == 4) { ?>
                                                <span class="badge bg-success"><?= $b['nama_status_permohonan'] ?></span>
                                            <?php } else if ($b['status_permohonan'] == 6 || $b['status_permohonan'] == 7) { ?>
                                                <span class="badge bg-danger"><?= $b['nama_status_permohonan'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($b['keterangan'] == '') {
                                                echo 'Tidak Ada Catatan';
                                            } else {
                                                echo $b['keterangan'];
                                            }
                                            ?>
                                        </td>
                                        <td> <a href="<?= base_url('admin/Menuutama/cek_dokumen_aktaT/') . $b['kode_permohonan']; ?>"><span class="badge bg-warning" style="margin-right:10px;">Cek Dokumen</span></a> <a href="#"> <span class="badge bg-warning">Pembayaran</span></a></td>
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <?php
                    echo $Pagination;
                    ?>
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
</body>

</html>