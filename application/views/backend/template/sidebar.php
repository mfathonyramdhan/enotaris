<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin/Dashboard') ?>" class="brand-link">
    <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/enotaris.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
    <span class="brand-text font-weight-light">e-Notaris</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/img/foto_profil/') . $user['foto_profil'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $user['nama'] ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <?php if ($user['level_user'] == 1) { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/dashboard') ?>" class="nav-link">
              <!-- active -->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>
        <?php } ?>

        <li class="nav-header">MANAJEMEN AKUN </li>
        <li class="nav-item">
          <a href="<?php echo site_url('admin/ManajemenAkun/profilsaya') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profil Saya
            </p>
          </a>
        </li>
        <?php if ($user['nama_level'] == "admin") { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/ManajemenAkun/dataakun') ?>" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Data Akun

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/ManajemenAkun/tambah_admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Tambah Admin

              </p>
            </a>
          </li>
        <?php } ?>

        <li class="nav-header">LAYANAN NOTARIS
        </li>

        <!-- akta tanah dropdown -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Akta Tanah
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <?php if ($user['nama_level'] == "admin") { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Menuutama/formpermohonan_aktaT') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Formulir Permohonan

                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Menuutama/datapermohonan_admin/1') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Permohonan

                  </p>
                </a>
              </li>
            <?php } ?>
            <?php if ($user['nama_level'] == 'user') { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('user/Menuutama/akta_tanah') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Formulir Permohonan

                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('user/Menuutama/datapermohonan_user/1') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Status Permohonan

                  </p>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>

        <li class="nav-header">LAYANAN PPAT
        </li>

        <!-- pendirian cv/pt dropdown -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Pendirian CV / PT
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo site_url('admin/Menuutama/formpendirian_cv') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Formulir Permohonan

                </p>
              </a>
            </li>
            <?php if ($user['nama_level'] == 'admin') { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Menuutama/datapermohonan_admin/2') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Permohonan

                  </p>
                </a>
              </li>
            <?php } ?>
            <?php if ($user['nama_level'] == 'user') { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('user/Menuutama/datapermohonan_user/2') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Permohonan

                  </p>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>

        <!-- waris dropdown -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Waris
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo site_url('admin/Menuutama/formhakwaris') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Formulir Permohonan

                </p>
              </a>
            </li>
            <?php if ($user['nama_level'] == 'admin') { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/Menuutama/datapermohonan_admin/3') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Permohonan

                  </p>
                </a>
              </li>
            <?php } ?>
            <?php if ($user['nama_level'] == 'user') { ?>
              <li class="nav-item">
                <a href="<?php echo site_url('user/Menuutama/datapermohonan_user/3') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Permohonan

                  </p>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>

        <!-- lain-lain dropdown -->
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Lain - lain
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Menu 1

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Menu 2

                </p>
              </a>
            </li>
          </ul>
        </li> -->

        <?php if ($user['level_user'] == 1) { ?>
          <li class="nav-header">MENU LAPORAN
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan Notaris

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Laporan PPAT

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Laporan Keuangan

              </p>
            </a>
          </li>


          <li class="nav-header">DOKUMENTASI
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Arsip

              </p>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>