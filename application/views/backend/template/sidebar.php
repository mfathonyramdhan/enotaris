<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/enotaris.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
    <span class="brand-text font-weight-light">e-Notaris Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/template/backend/dist') ?>/img/1518167.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Santi Fimanda</a>
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

        <li class="nav-item">
          <a href="<?php echo site_url('admin/dashboard') ?>" class="nav-link">
            <!-- active -->
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>
        </li>

        <li class="nav-header">MANAJEMEN AKUN </li>
        <li class="nav-item">
          <a href="<?php echo site_url('admin/ManajemenAkun/profilsaya') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profil Saya
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('admin/ManajemenAkun/dataakun') ?>" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Data Akun

            </p>
          </a>
        </li>

        <li class="nav-header">MENU UTAMA
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
            <li class="nav-item">
              <a href="<?php echo site_url('user/aktatanah/index') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Formulir Permohonan

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/Menuutama/datapermohonan') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Data Permohonan

                </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- pendirian cv/pt dropdown -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Pendirian CV/PT
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo site_url('admin/Menuutama/formpermohonan') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Formulir Permohonan

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/Menuutama/datapermohonan') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Data Permohonan

                </p>
              </a>
            </li>
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
              <a href="<?php echo site_url('admin/Menuutama/formpermohonan') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Formulir Permohonan

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('admin/Menuutama/datapermohonan') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Data Permohonan

                </p>
              </a>
            </li>
          </ul>
        </li>

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
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>