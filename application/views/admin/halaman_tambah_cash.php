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
					<li class="breadcrumb-item active" aria-current="page">Tambah Pembayaran Cash</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN TAMBAH PEMBAYARAN CASH</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/tambah_cash") ?>">
					<div class="form-group">
						<label for="id_cash">ID Cash</label>
						<input autocomplete="off" required="" type="number" name="id_cash" class="form-control" value="<?php echo $kode ?>">
					</div>
					<div class="form-group">
						<label for="id_konsumen">Nama Konsumen</label>
						<select required="" name="id_konsumen" id="id_konsumen" class="form-control">
							<option disabled="" selected="">Pilih Konsumen</option>
							<?php foreach ($konsumen as $ks) : ?>
								<option value="<?php echo $ks->id_konsumen ?>"><?php echo $ks->nama ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="block">Block</label>
						<select required="" name="block" id="block" class="form-control">
							<option disabled="" selected="">Pilih Block</option>
							<?php foreach ($block as $bl) : ?>
								<option value="<?php echo $bl->id_block ?>"><?php echo $bl->noblock ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="type">Type</label>
						<input autocomplete="off" required="" type="text" name="type" class="form-control">
					</div>
					<div class="form-group">
						<label for="spesifikasi">Spesifikasi</label>
						<input autocomplete="off" required="" type="text" name="spesifikasi" class="form-control">
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input autocomplete="off" required="" type="number" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label for="uang_muka">Uang Muka</label>
						<input autocomplete="off" required="" type="number" name="uang_muka" class="form-control">
					</div>
					<div class="form-group">
						<label for="pembayaran">Pembayaran</label>
						<input autocomplete="off" required="" type="number" name="pembayaran" class="form-control">
					</div>
					<div class="form-group">
						<label for="jumblah">Jumblah</label>
						<input autocomplete="off" required="" type="number" name="jumblah" class="form-control">
					</div>
					<div class="form-group">
						<label for="total">Total</label>
						<input autocomplete="off" required="" type="number" name="total" class="form-control">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea rows="3" class="form-control" name="keterangan"></textarea>
					</div>
					<div class="tombol-bawah">
						<button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
						<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
						<a href="<?php echo base_url('admin/pembayaran_cash') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

<?php } ?>