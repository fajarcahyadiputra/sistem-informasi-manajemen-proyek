  <!-- Container Fluid-->
  <style>
  	.tombol-atas{
  		display: flex;
  		flex-direction: row-reverse;
  	}
  	.tombol-aksi{
  		display: flex;
  		justify-content: center;
  	}
  </style>
  <div class="container-fluid mb-5" id="container-wrapper">
    <div class="card">
      <nav aria-label="breadcrumb" style="background-color: #E3FDF5">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data Konsumen</li>
        </ol>
      </nav>
      <div class="card-header" style="background-color: #E3FDF5">
       <div class="row">
        <div class="col-md-6">
         <h3>DATA KONSUMEN</h3>
       </div>
       <div class="col-md-6">
         <div class="tombol-atas">
          <a href="<?php echo base_url('admin/cetak_semua_barcode') ?>"  class="btn btn-outline-info mb-4 " ><i class="fas fa-print mr-1"></i>Ceatak Laporan</a>
          <a  href="<?php echo base_url('admin/halaman_tambah_user') ?>" class="btn btn-outline-info mb-4 mr-3" ><i class="fas fa-user-plus mr-1"></i>Tambah Konsumen</a>
        </div>
      </div>
    </div>
  </div>
  <dic class="card-body table-responsive">
   <table class="table table-bordered table-striped table-hover" id="<?php echo $id_tabel ?>">
    <thead>
     <tr>
      <th width="3%">No</th>
      <th class="text-center">Kode Konsumen</th>
      <th class="text-center">Nama</th>
      <th class="text-center">No.KTP</th>
      <th class="text-center">Pekerjaan</th>
      <th class="text-center">Alamat</th>
      <th class="text-center">Status</th>
      <th class="text-center">No HP</th>
      <th class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
   <?php $no=1; foreach($konsumen as $ks) : ?>
   <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $ks->id_konsumen ?></td>
    <td><?php echo $ks->nama ?></td>
    <td><?php echo $ks->noktp ?></td>
    <td><?php echo $ks->pekerjaan ?></td>
    <td><?php echo $ks->alamat ?></td>
    <td><?php echo $ks->status ?></td>
    <td><?php echo $ks->nohp ?></td>
    <td>
     <div class="tombol-aksi">
      <a class="btn btn-info" href=""><i class="fa fa-edit"></i></a>
      <a class="btn btn-danger ml-2" href=""><i class="fa fa-trash"></i></a>
    </div>
  </td>
</tr>
</tbody>
<?php endforeach ?>
</table>
</dic>
</div>
</div>
 <!-- end container fluid -->