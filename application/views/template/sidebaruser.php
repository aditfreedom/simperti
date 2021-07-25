 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=base_url()?>assets/img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b style="font-size:15px;">PPDB KAB BIREUEN</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>assets/img/team/tutwuri.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nama_siswa;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 text-sm">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">      
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item ">
            <a href="<?=base_url('user');?>" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>


          <li class="nav-item ">
            <a href="<?=base_url('user/isi_formulir/'.$id_pesertadidik);?>" class="nav-link">
              <i class="nav-icon fa fa-money-check-alt"></i>
              <p>
                Isi Formulir
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="<?=base_url('user/statusformulir/'.$id_pesertadidik);?>" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Status Formulir
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="<?=base_url('user/pengumumankelulusan/'.$id_pesertadidik);?>" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Pengumuman Kelulusan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('user/logout')?>" class="nav-link text-light" style="background-color:#FF0064;">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p >
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