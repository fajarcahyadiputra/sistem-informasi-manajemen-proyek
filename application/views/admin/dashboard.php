<?php if (!$this->session->userdata('username')) {

  redirect('auth');
} else {
?>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">

    <div class="card">
      <div class="card-header" style="background-color: #E3FDF5">
        <h3 class="text-dark">DASHBOARD</h3>
      </div>
      <div class="card-body" style="padding: 200px">
        <div class="row">
          <div class="col-md-12">
            <h2>
              Selamat Datang Di <br> Sistem Infromasi Manajemen Proyek Perumahan Griya Aldena
            </h2>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!---Container Fluid-->
  </div>

<?php } ?>