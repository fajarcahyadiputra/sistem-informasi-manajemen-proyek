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
   <?php if($this->session->flashdata('pesan')): ?>
    <?php echo $this->session->flashdata('pesan'); ?>
  <?php endif ?>
  <div class="card">
    <nav aria-label="breadcrumb" style="background-color: #E3FDF5">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pemabayaran Cash</li>
      </ol>
    </nav>
    <div class="card-header" style="background-color: #E3FDF5">
     <div class="row">
      <div class="col-md-6">
       <h3>DATA PEMBAYARAN CASH</h3>
     </div>
     <div class="col-md-6">
       <div class="tombol-atas">
        <a href="<?php echo base_url('admin/cetak_semua_barcode') ?>"  class="btn btn-outline-info mb-4 " ><i class="fas fa-print mr-1"></i>Ceatak Laporan</a>
        <a  href="<?php echo base_url('admin/halaman_tambah_cash') ?>" class="btn btn-outline-info mb-4 mr-3" ><i class="fas fa-user-plus mr-1"></i>Tambah Cash</a>
      </div>
    </div>
  </div>
</div>
<dic class="card-body table-responsive">
 <table class="table table-bordered table-striped table-hover" id="<?php echo $id_tabel ?>">
  <thead>
   <tr>
    <th width="3%">No</th>
    <th class="text-center">Id Cash</th>
    <th class="text-center">id_Konsumen</th>
    <th class="text-center">id_Block</th>
    <th class="text-center">Type</th>
    <th class="text-center">Uang Muka</th>
    <th class="text-center">Harga</th>
    <th class="text-center">Pembayaran</th>
    <th class="text-center">Jumblah</th>
    <th class="text-center">Aksi</th>
  </tr>
</thead>
<tbody>
 <?php $no=1; foreach($cash as $ch) : ?>
 <tr>
  <td><?php echo $no++ ?></td>
  <td><?php echo $ch->id_cash ?></td>
  <td><?php echo $ch->id_konsumen ?></td>
  <td><?php echo $ch->id_block ?></td>
  <td><?php echo $ch->type ?></td>
  <td><?php echo $ch->dp ?></td>
  <td><?php echo $ch->harga ?></td>
  <td><?php echo $ch->pembayaran ?></td>
  <td><?php echo $ch->jumblah ?></td>
  <td>
   <div class="tombol-aksi">
    <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/halaman_edit_cash/').$ch->id_cash ?>"><i class="fa fa-edit"></i></a>
    <a onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm ml-2" href="<?php echo base_url('admin/hapus_cash/').$ch->id_cash ?>"><i class="fa fa-trash"></i></a>
  </div>
  <div class="text-center">
    <a class="btn btn-info mt-2" href="<?php echo base_url('admin/halaman_detail_cash/').$ch->id_cash ?>"><i class="fa fa-info"></i></a>
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