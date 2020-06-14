
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <i class="fas fa-dove"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SIMP</div>
    </a>
    <li class="nav-item p-4">
      <span><b>Administrator</b></span>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('admin') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Data Master</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Data Master</h6>
          <a class="collapse-item" href="<?php echo base_url('admin/data_user') ?>">Data User</a>
          <a class="collapse-item" href="<?php echo base_url('admin/data_konsumen') ?>">Data Konsumen</a>
          <a class="collapse-item" href="<?php echo base_url('admin/data_kavling') ?>">Data Kavling</a>
          <a class="collapse-item" href="<?php echo base_url('admin/data_tukang') ?>">Data Tukang</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
      aria-controls="collapseTable">
      <i class="fas fa-fw fa-table"></i>
      <span>Data Keuangan</span>
    </a>
    <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Data Keuangan</h6>
        <a class="collapse-item" href="<?php echo base_url('admin/pembayaran_cash') ?>">Pembayaran Cash</a>
        <a class="collapse-item" href="<?php echo base_url('admin/pembayaran_hutang') ?>">Pembayaran Hutang</a>
        <a class="collapse-item" href="<?php echo base_url('admin/pengajian_tukang') ?>">Pengajian Tukang</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
    aria-controls="collapseTable">
    <i class="fas fa-fw fa-table"></i>
    <span>Proses Pembangunan</span>
  </a>
  <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Proses Pembangunan</h6>
      <a class="collapse-item" href="<?php echo base_url('admin/request_lab') ?>">Request Guru</a>
      <a class="collapse-item" href="<?php echo base_url('admin/riwayat_pengajuan') ?>">Riwayat Request</a>
    </div>
  </div>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
  aria-controls="collapseTable">
  <i class="fas fa-fw fa-table"></i>
  <span>Data Material</span>
</a>
<div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Data Material</h6>
    <a class="collapse-item" href="<?php echo base_url('admin/request_lab') ?>">Request Guru</a>
    <a class="collapse-item" href="<?php echo base_url('admin/riwayat_pengajuan') ?>">Riwayat Request</a>
  </div>
</div>
</li>
<hr class="sidebar-divider">
<div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <!-- TopBar -->
    <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
      <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
        aria-labelledby="searchDropdown">
        <form class="navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
            aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>



    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <img class="img-profile rounded-circle" src="<?php echo base_url('assets/ruangAdmin/') ?>img/boy.png" style="max-width: 60px">
      <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $this->session->userdata('username') ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?php echo base_url('Auth/logout_admin') ?>">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>
</ul>
</nav>
        <!-- Topbar -->