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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php if ($user['email'] == '' || $user['no_hp'] == '' || $user['jenis_kelamin'] == '' || $user['alamat'] == '' || $user['tempat_lahir'] == '' || $user['tgl_lahir'] == '' || $user['foto_profil'] == '') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Hello <?= $user['nama'] ?>!</strong> Segera lengkapi data diri anda di menu Profil Saya.
        </div>
      <?php } ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jumlah_user ?></h3>

              <p>Pemohon</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= number_format($saldo_terakhir['saldo_terakhir'], 0, ",", ".") ?></h3>

              <p>Pendapatan (Rp)</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3 class="text-light"><?= $jumlah_permohonan ?></h3>

              <p class="text-light">Permohonan</p>
            </div>
            <div class="icon">
              <i class="fas fa-file"></i>
            </div>
            <!-- <a href="#" class="small-box-footer"><span class="text-light">More info</span> <i class="fas fa-arrow-circle-right text-light"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= count($reminder) ?></h3>

              <p>Pengingat</p>
            </div>
            <div class="icon">
              <i class="fas fa-bell"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Grafik Jumlah Permohonan
              </h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                  <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col connectedSortable">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Reminder / Pengingat </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Kode Permohonan</th>
                    <th>Tanggal Deadline</th>
                    <th style="width: 40px">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($reminder) > 0) { ?>
                    <?php
                    $no = 1;
                    foreach ($reminder as $r) { ?>

                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r['kode_permohonan'] ?></td>
                        <td>
                          <?= $r['deadline'] ?>
                        </td>
                        <?php
                        $now = strtotime(date('Y-m-d'));
                        $dl = strtotime($r['deadline']);
                        $interval = abs($dl - $now);
                        $years = floor($interval / (365 * 60 * 60 * 24));
                        $months = floor(($interval - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                        $days = floor(($interval - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                        ?>
                        <td><span class="badge bg-danger"><?= $days ?> Hari Lagi</span></td>
                      </tr>
                    <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td colspan="4" align="center">
                        Tidak Ada Permohonan Yang Harus Diselesaikan
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div> -->
          </div>
          <!-- Map card -->
          <div class="card bg-gradient-primary" style="display : none">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="fas fa-map-marker-alt mr-1"></i>
                Visitors
              </h3>
              <!-- card tools -->
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                  <i class="far fa-calendar-alt"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <div class="card-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.card-body-->
            <div class="card-footer bg-transparent">
              <div class="row">
                <div class="col-4 text-center">
                  <div id="sparkline-1"></div>
                  <div class="text-white">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <div id="sparkline-2"></div>
                  <div class="text-white">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="text-white">Sales</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.card -->

          <!-- solid sales graph -->

          <!-- /.card -->

          <!-- Calendar -->

          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
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