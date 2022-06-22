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
                    <center class="mb-3">Menunggu Konfirmasi : <span class="text-danger"><?= $ppat_diajukan ?> Permohonan</span> | Menunggu Pembayaran : <span class="text-warning"><?= $ppat_pembayaran ?> Permohonan</span> | Dalam Pengerjaan : <span class="text-primary"><?= $ppat_diproses ?> Permohonan</span> | Selesai : <span class="text-success"><?= $ppat_selesai ?> Permohonan</span></center>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>No. Bulanan</th>
                                <th>Kode Pengajuan Permohonan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Nama Pemohon</th>
                                <th>Jenis Permohonan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = $start + 1; ?>
                            <?php if (count($page_akta) > 0) : ?>
                                <?php foreach ($page_akta as $b) { ?>
                                    <tr>
                                        <td> <?= $no++ ?> </td>
                                        <td> <?= $b['nobulanan'] ?> </td>
                                        <td> <?= $b['kode_permohonan'] ?> </td>
                                        <td> <?= $b['tgl_permohonan'] ?> </td>
                                        <td> <?= $b['nama'] ?> </td>
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
                                        <abbr title="Edit"> <a href="javascript:void(0)" onclick="edit('<?= $b['kode_permohonan'] ?>')" data-bs-toggle="modal" data-bs-target="#Modal" class="btn btn-primary"><i class="fas fa-edit"></i>Edit no Bulanan</a></abbr>
                                        </td>
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

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Edit No. Bulanan :</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/Menuutama/editNobulanan2'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						
						<label>No. Bulanan</label>
						<input type="text" class="form-control" id="nobulanan" name="nobulanan">
						
					</div>
				</div>
				<div class="modal-footer">
                <input type="hidden" name="kode_permohonan" id="kode_permohonan">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('backend/template/footer') ?>


</div>
<!-- ./wrapper -->

<!-- JS -->
<?php $this->load->view('backend/template/js') ?>

<script type="text/javascript">


	function edit(id) {
		$('#Modal').modal('show');
		$.ajax({
			url: "<?= site_url('admin/Menuutama/getNobulanan') ?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var i;
				for (i = 0; i < data.length; i++) {
					$('#kode_permohonan').val(data[i].kode_permohonan);
					$('#nobulanan').val(data[i].nobulanan);
				}
			}
		});
	}
</script>
</body>

</html>