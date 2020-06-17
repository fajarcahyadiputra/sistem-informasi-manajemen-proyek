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
          <li class="breadcrumb-item active" aria-current="page">Data Proses Pembangunan</li>
        </ol>
      </nav>
      <div class="card-header" style="background-color: #E3FDF5">
        <div class="row">
          <div class="col-md-6">
            <h3>DATA PROSES PEMBANGUNAN</h3>
          </div>
          <div class="col-md-6">
            <div class="tombol-atas">
              <a target="_blank" href="<?php echo base_url('admin/cetak_laporan/proses/tb_proses') ?>" class="btn btn-outline-info mb-4 "><i class="fas fa-print mr-1"></i>Ceatak Laporan</a>
              <a href="<?php echo base_url('admin/halaman_tambah_proses') ?>" class="btn btn-outline-info mb-4 mr-3"><i class="fas fa-user-plus mr-1"></i>Tambah Proses</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-striped table-hover" id="<?php echo $id_tabel ?>">
          <thead>
            <tr>
              <th width="3%">No</th>
              <th class="text-center">ID Proses</th>
              <th class="text-center">Nama Tukang</th>
              <th class="text-center">Block</th>
              <th class="text-center">Bulan</th>
              <th class="text-center">Proses</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($proses as $pr) : ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pr->id_proses ?></td>
                <td><?php
                    $tukang = $this->db->get_where('tb_tukang', ['id_tukang' => $pr->id_tukang])->row();
                    echo $tukang->nama_tukang;
                    ?></td>
                <td><?php
                    $block = $this->db->get_where('tb_kavling', ['id_block' => $pr->id_block])->row();
                    echo $block->noblock;
                    ?></td>
                <td><?php echo $pr->bulan ?></td>
                <td><?php echo $pr->proses ?></td>
                <td>
                  <div class="tombol-aksi">
                    <a class="btn btn-info" href="<?php echo base_url('admin/halaman_edit_proses/') . $pr->id_proses ?>"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Yakin?')" class="btn btn-danger ml-2" href="<?php echo base_url('admin/hapus_proses/') . $pr->id_proses ?>"><i class="fa fa-trash"></i></a>
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