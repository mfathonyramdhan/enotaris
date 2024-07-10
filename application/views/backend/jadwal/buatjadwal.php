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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulir Pengajuan Jadwal Pertemuan</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->






                <form id="jadwalForm" action="<?= base_url('admin/Menuutama/ajukan_jadwal') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_permohonan_jadwal" id="id_permohonan_jadwal">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user'] ?>">
                    <input type="hidden" name="status" id="status" value="1">

                    <div class="card-body">
                        <div class="alert alert-info">
                            <strong>Jadwal buka notaris:</strong> Senin - Jumat (09:00 - 17:00), Sabtu (10:00 - 16:00)
                        </div>
                        <?php

                        // info status pengajuan : 
                        // 1 = diajukan - belum direview
                        // 2 = ditolak - user ajukan ulang
                        // 3 = disetujui

                        ?>


                        <?php if ($user['nama_level'] == 'admin') { ?>
                            <div class="row">
                                <div class="form-group col-12" id="item_auto">
                                    <label for="">Nama Pemohon</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" required>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="row">
                            <div class="form-group col">
                                <label for="">Rencana Tanggal Pertemuan</label>
                                <input type="date" class="form-control" id="tgl_pertemuan" name="tgl_pertemuan">

                                <span class="text-danger" id="notif"></span>
                            </div>

                            <div class="form-group col">
                                <label for="jam_mulai">Jam Mulai</label>
                                <select class="form-control" id="jam_mulai" name="jam_mulai" required>
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
                                <select class="form-control" id="jam_akhir" name="jam_akhir" required>
                                    <option value="">Pilih Jam Akhir</option>
                                    <?php
                                    for ($i = 10; $i <= 17; $i++) {
                                        $jam = str_pad($i, 2, '0', STR_PAD_LEFT) . ":00";
                                        echo "<option value='$jam'>$jam</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-12" id="item_auto">
                                <label for="">Keterangan</label>


                                <input type="text" class="form-control" id="nama" placeholder="Masukkan keterangan" name="keterangan" required>


                            </div>
                        </div>



                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ajukan</button>
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

    $(document).ready(function() {

        $('#nama').autocomplete({
            source: "<?php echo site_url('admin/Menuutama/get_user'); ?>",
            select: function(event, ui) {
                $("#id_user").val(ui.item.id_dosen);
                $("#nama").val(ui.item.description);
            }
        });
        $('#nama').select();

        // !development only : hapus ketika release
        $('#tgl_pertemuan').on('change', function() {
            var coba = $(this).val();
            console.log(coba);
        });

        var userId = $('#id_user').val();
        console.log('ID User:', userId);
        //!development only

        $('#jadwalForm').on('submit', function(e) {
            var jamMulai = $('#jam_mulai').val();
            var jamAkhir = $('#jam_akhir').val();
            var tanggalPertemuan = $('#tgl_pertemuan').val();
            var today = new Date().toISOString().slice(0, 10); // Mendapatkan tanggal hari ini

            if (tanggalPertemuan < today) {
                e.preventDefault();
                Swal.fire({
                    title: 'Perbaiki Formulir!',
                    text: 'Tanggal pertemuan tidak boleh sebelum hari ini',
                    icon: 'error',
                    confirmButtonText: 'Close'
                });
            }

            if (jamMulai >= jamAkhir) {
                e.preventDefault();
                Swal.fire({
                    title: 'Perbaiki Formulir!',
                    text: 'Jam akhir pertemuan tidak boleh sama atau kurang dari jam mulai',
                    icon: 'error',
                    confirmButtonText: 'Close'
                });
            }
        });

    });
</script>
</body>

</html>