<?php if (!$this->session->userdata('username')) {

  redirect('auth');
} else {
?>
  <!-- Container Fluid-->
  <style>
    .tombol-atas {
      display: flex;
      flex-direction: row-reverse;
    }

    .tombol-aksi {
      display: flex;
      justify-content: center;
    }
  </style>
  <div class="container-fluid mb-5" id="container-wrapper">
    <?php if ($this->session->flashdata('pesan')) : ?>
      <?php echo $this->session->flashdata('pesan'); ?>
    <?php endif ?>
    <div class="card">
      <nav aria-label="breadcrumb" style="background-color: #E3FDF5">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Pengeluaran</li>
        </ol>
      </nav>
      <div class="card-header" style="background-color: #E3FDF5">
        <div class="row">
          <div class="col-md-6">
            <h3>DATA PENGELUARAN</h3>
          </div>
          <div class="col-md-6">
            <div class="tombol-atas">
              <a target="_blank" href="<?php echo base_url('admin/cetak_laporan/pengeluaran/tb_pengeluaran') ?>" class="btn btn-outline-info mb-4 "><i class="fas fa-print mr-1"></i>Ceatak Laporan</a>
              <a href="<?php echo base_url('admin/halaman_tambah_pengeluaran') ?>" class="btn btn-outline-info mb-4 mr-3"><i class="fas fa-user-plus mr-1"></i>Tambah Pengeluaran</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover" id="<?php echo $id_tabel ?>">
          <thead>
            <tr>
              <th width="3%">No</th>
              <th class="text-center">ID Pengeluaran</th>
              <th class="text-center">Block</th>
              <th class="text-center">Nama Material</th>
              <th class="text-center">Jumblah</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Total</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($pengeluaran as $pg) : ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pg->id_keluar ?></td>
                <td><?php echo $pg->id_block ?></td>
                <td><?php echo $pg->nama_material ?></td>
                <td><?php echo number_format($pg->jumblah, 0, ',', '.') ?></td>
                <td><?php echo number_format($pg->harga, 0, ',', '.') ?></td>
                <td><?php echo number_format($pg->total, 0, ',', '.') ?></td>
                <td>
                  <div class="tombol-aksi">
                    <a class="btn btn-info" href="<?php echo base_url('admin/halaman_edit_pengeluaran/') . $pg->id_keluar ?>"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Yakin?')" class="btn btn-danger ml-2" href="<?php echo base_url('admin/hapus_pengeluaran/') . $pg->id_keluar ?>"><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- end container fluid -->
<?php } ?>