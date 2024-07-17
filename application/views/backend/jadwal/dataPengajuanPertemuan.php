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
                                <th>Catatan Notaris</th>
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
                                        <td><?= $d['catatan'] ?></td>
                                        <td>
                                            <?php if ($user['nama_level'] == 'admin') { ?>
                                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#actionModal" data-id="<?= $d['id'] ?>">Pilih Aksi</a>
                                            <?php } else { ?>
                                                <?php if ($d['status'] != 2) { ?>
                                                    <div title="Pengajuan sudah disetujui, tidak dapat diedit" style="margin-bottom: 5px;"><a href="#" class="btn btn-warning btn-sm disabled">Edit</a></div>
                                                <?php } else if ($d['status'] == 4) { ?>
                                                    <div title="Pengajuan sedang direview, tidak dapat diedit" style="margin-bottom: 5px;"><a href="#" class="btn btn-warning btn-sm disabled">Edit</a></div>
                                                <?php } else { ?>
                                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" data-id="<?= $d['id'] ?>" data-tanggal="<?= $d['tgl'] ?>" data-jam_mulai="<?= $d['jam_mulai'] ?>" data-jam_akhir="<?= $d['jam_akhir'] ?>" data-keterangan="<?= $d['keterangan'] ?>" style="margin-bottom: 5px;">Edit</a>

                                                <?php } ?>
                                                <?php if ($d['status'] != 4) { ?>
                                                    <a href=" <?= base_url('admin/ManajemenJadwal/hapusPengajuanPertemuan/' . $d['id']) ?>" class="btn btn-danger btn-sm " onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                                                <?php } ?>
                                            <?php } ?>




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

<!-- Modal -->
<div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/ManajemenJadwal/handle_action') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionModalLabel">Pilih Aksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" value="setujui" class="btn btn-success">Setujui</button>
                    <button type="submit" name="action" value="tolak" class="btn btn-danger">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk edit data-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('admin/ManajemenJadwal/updatePengajuanPertemuan') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Pengajuan Pertemuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id" value="">
                    <div class="form-group">
                        <label for="edit-tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="edit-tanggal" required>
                    </div>
                    <div class="form-group col">
                        <label for="jam_mulai">Jam Mulai</label>
                        <select class="form-control" id="edit-jam-mulai" name="jam_mulai" required>
                            <option value="">Pilih Jam Mulai</option>
                            <?php
                            for ($i = 9; $i <= 16; $i++) {
                                $jam = str_pad($i, 2, '0', STR_PAD_LEFT) . ":00";
                                echo "<option value='$jam'>$jam</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="jam_akhir">Jam Akhir</label>
                        <select class="form-control" id="edit-jam-akhir" name="jam_akhir" required>
                            <option value="">Pilih Jam Akhir</option>
                            <?php
                            for ($i = 10; $i <= 17; $i++) {
                                $jam = str_pad($i, 2, '0', STR_PAD_LEFT) . ":00";
                                echo "<option value='$jam'>$jam</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="edit-keterangan" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php $this->load->view('backend/template/footer') ?>

</div>



<?php $this->load->view('backend/template/js') ?>
<script>
    $('#actionModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
    })


    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var tanggal = button.data('tanggal')
        var jamMulai = button.data('jam_mulai')
        var jamAkhir = button.data('jam_akhir')
        var keterangan = button.data('keterangan')

        var modal = $(this)
        modal.find('.modal-body #edit-id').val(id)
        modal.find('.modal-body #edit-tanggal').val(tanggal)
        modal.find('.modal-body #edit-jam-mulai').val(jamMulai)
        modal.find('.modal-body #edit-jam-akhir').val(jamAkhir)
        modal.find('.modal-body #edit-keterangan').val(keterangan)
    })
</script>

</body>

</html>