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
            <div class="card">
                <div class="card-header">
                    <!-- <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 300px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Cari">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div> -->
                    <h3 class="card-title"><?php echo $page_title ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr align="center">
                                <th style="width: 10px">No</th>
                                <th style="width: 40px">ID Pengajuan Pertemuan</th>
                                <th>Nama Pemohon</th>
                                <th>Tanggal</th>
                                <th>Jam Mulai - Akhir</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php if (count($data) > 0) : ?>
                                <?php foreach ($data as $d) { ?>
                                    <tr align="center">
                                        <td><?= $no++ ?></td>
                                        <td><?= $d['id'] ?></td>
                                        <td><?= $d['nama'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($d['tgl'])) ?></td>
                                        <td><?= $d['jam_mulai'] . '.00' . ' s/d ' . $d['jam_akhir'] . '.00' ?></td>
                                        <td>
                                            <?php if ($d['status'] == 1) { ?>
                                                <span class="badge bg-warning">Diajukan - Belum Direview</span>
                                            <?php } else if ($d['status'] == 2) { ?>
                                                <span class="badge bg-danger">Ditolak - User Ajukan Ulang</span>
                                            <?php } else if ($d['status'] == 3) { ?>
                                                <span class="badge bg-info">Diajukan Ulang - Belum Direview</span>
                                            <?php } else if ($d['status'] == 4) { ?>
                                                <span class="badge bg-success">Disetujui</span>
                                            <?php } ?>
                                        </td>
                                        <td><?= $d['keterangan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('controller_name/edit/' . $d['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url('admin/ManajemenJadwal/hapusPengajuanPertemuan/' . $d['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" align="center">Data tidak ditemukan</td>
                                </tr>
                            <?php endif ?>
                        </tbody>


                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <!-- Pagination placeholder -->
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