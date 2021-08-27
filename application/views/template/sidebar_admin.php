<?php
  $role=$this->session->userdata('role');
  $hidden_kepsekdir="";
  $hidden_umum="";
  $hidden_sdk="";

  if ($role=="1") {
    $hidden_kepsekdir="hidden";
  }
  if ($role=="2") {
    $hidden_umum="hidden";
  }
  if ($role=="3") {
    $hidden_sdk="hidden";
  }
  ?> 
 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=base_url()?>assets/img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light font-weight-bold"><b style="font-size:15px;">SIMPERTI SSB BIREUEN</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>asset/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><b><?php echo $nama; ?></b><br><?=$jabatan?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 text-sm">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">      
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item ">
            <a href="<?=base_url('admin');?>" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item" <?=$hidden_kepsekdir?> <?=$hidden_umum?> <?=$hidden_sdk?>>
            <a href="<?=base_url('admin/divisi');?>" class="nav-link">
              <i class="nav-icon fa fa-building"></i>
              <p>
                Divisi
              </p>
            </a>
          </li>

          <li class="nav-item " <?=$hidden_kepsekdir?> <?=$hidden_umum?> <?=$hidden_sdk?>>
            <a href="<?=base_url('admin/atasan');?>" class="nav-link">
              <i class="nav-icon fa fa-user-tie"></i>
              <p>
                Data Pimpinan
              </p>
            </a>
          </li>

          <li class="nav-item " <?=$hidden_kepsekdir?> <?=$hidden_umum?>  <?=$hidden_sdk?>>
            <a href="<?=base_url('admin/karyawan');?>" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Data SDK/NON SDK
              </p>
            </a>
          </li>

         

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link" <?=$hidden_kepsekdir?> <?=$hidden_umum?>>
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Pengajuan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/izin/');?>" class="nav-link">
                  <i class="far fa fa-book nav-icon"></i>
                  <p>Izin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/cuti/');?>" class="nav-link">
                  <i class="far fa fa-book nav-icon"></i>
                  <p>Cuti</p>
                </a>
              </li>
              </ul>
              </li>

              <li class="nav-item has-treeview menu-close" <?=$hidden_sdk?>>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Persetujuan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/persetujuan_izin/');?>" class="nav-link">
                  <i class="far fa fa-clipboard-check nav-icon"></i>
                  <p>Izin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/persetujuan_cuti/');?>" class="nav-link">
                  <i class="far fa fa-clipboard-check nav-icon"></i>
                  <p>Cuti</p>
                </a>
              </li>
              </ul>
              </li>     

          <li class="nav-item has-treeview menu-close" <?=$hidden_kepsekdir?>>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Status & Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/status_izin/');?>" class="nav-link">
                  <i class="far fa fa-id-card  nav-icon"></i>
                  <p>Izin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/status_cuti/');?>" class="nav-link">
                  <i class="far fa fa-id-card  nav-icon"></i>
                  <p>Cuti</p>
                </a>
              </li>
              </ul>
              </li>     

          <li class="nav-item">
            <a href="<?= base_url('admin/logout')?>" class="nav-link bg-danger">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>