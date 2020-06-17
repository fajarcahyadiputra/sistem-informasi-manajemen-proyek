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
          <li class="breadcrumb-item active" aria-current="page">Data Pembelian</li>
        </ol>
      </nav>
      <div class="card-header" style="background-color: #E3FDF5">
        <div class="row">
          <div class="col-md-6">
            <h3>DATA PEMBELIAN</h3>
          </div>
          <div class="col-md-6">
            <div class="tombol-atas">
              <a target="_blank" href="<?php echo base_url('admin/cetak_laporan/pembelian/tb_pembelian') ?>" class="btn btn-outline-info mb-4 "><i class="fas fa-print mr-1"></i>Ceatak Laporan</a>
              <a href="<?php echo base_url('admin/halaman_tambah_pembelian') ?>" class="btn btn-outline-info mb-4 mr-3"><i class="fas fa-user-plus mr-1"></i>Tambah Pembelian</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover" id="<?php echo $id_tabel ?>">
          <thead>
            <tr>
              <th width="3%">No</th>
              <th class="text-center">ID Pembelian</th>
              <th class="text-center">Nama Barang</th>
              <th class="text-center">Jumblah</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Total</th>
              <th class="text-center" width="30%">Keterangan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($pembelian as $pb) : ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pb->id_pembeli ?></td>
                <td><?php echo $pb->nama_barang ?></td>
                <td><?php echo number_format($pb->jumblah, 0, ',', '.') ?></td>
                <td><?php echo number_format($pb->harga, 0, ',', '.') ?></td>
                <td><?php echo number_format($pb->total, 0, ',', '.') ?></td>
                <td><textarea style="border:none;" readonly="" cols="30" rows="3"><?php echo $pb->keterangan ?></textarea></td>
                <td>
                  <div class="tombol-aksi">
                    <a class="btn btn-info" href="<?php echo base_url('admin/halaman_edit_pembelian/') . $pb->id_pembeli ?>"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Yakin?')" class="btn btn-danger ml-2" href="<?php echo base_url('admin/hapus_pembelian/') . $pb->id_pembeli ?>"><i class="fa fa-trash"></i></a>
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