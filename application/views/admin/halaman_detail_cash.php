<?php if (!$this->session->userdata('username')) {

	redirect('auth');
} else {
?>
	<style>
		.card {
			margin: 20px;
		}

		.wrapper {
			margin: 30px;

		}

		form {
			margin: 20px;
		}

		.wrapper h3 {
			text-align: center;
		}

		.tombol-bawah {
			display: flex;
		}
	</style>
	<div class="conatiner-fluid" id="container-wrapper">
		<div class="card">
			<nav aria-label="breadcrumb" style="background-color: #E3FDF5">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail Pembayaran Cash</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN DETAIL PEMBAYARAN CASH</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/tambah_cash") ?>">
					<div class="form-group">
						<label for="id_cash">ID Cash</label>
						<input readonly="" class="form-control" value="<?php echo $cash->id_cash ?>">
					</div>
					<div class="form-group">
						<label for="id_konsumen">Id Konsumen</label>
						<input readonly name="id_cash" class="form-control" value="<?php echo $cash->id_konsumen ?>">
					</div>
					<div class="form-group">
						<label for="block">Id Block</label>
						<input readonly name="id_cash" class="form-control" value="<?php echo $cash->id_block ?>">
					</div>
					<div class="form-group">
						<label for="type">Type</label>
						<input readonly name="type" class="form-control" value="<?php echo $cash->type ?>">
					</div>
					<div class="form-group">
						<label for="spesifikasi">Spesifikasi</label>
						<input readonly name="spesifikasi" class="form-control" value="<?php echo $cash->spesifikasi ?>">
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input readonly name="harga" class="form-control" value="<?php echo $cash->harga ?>">
					</div>
					<div class="form-group">
						<label for="uang_muka">Uang Muka</label>
						<input readonly name="uang_muka" class="form-control" value="<?php echo $cash->dp ?>">
					</div>
					<div class="form-group">
						<label for="pembayaran">Pembayaran</label>
						<input readonly name="pembayaran" class="form-control" value="<?php echo $cash->pembayaran ?>">
					</div>
					<div class="form-group">
						<label for="jumblah">Jumblah</label>
						<input readonly name="jumblah" class="form-control" value="<?php echo $cash->jumblah ?>">
					</div>
					<div class="form-group">
						<label for="jumblah">Total</label>
						<input readonly name="total" class="form-control" value="<?php echo $cash->total ?>">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea rows="3" class="form-control" readonly name="keterangan"><?php echo $cash->keterangan ?></textarea>
					</div>
					<div class="tombol-bawah">
						<a href="<?php echo base_url('admin/pembayaran_cash') ?>" class="btn btn-warning ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

<?php } ?>