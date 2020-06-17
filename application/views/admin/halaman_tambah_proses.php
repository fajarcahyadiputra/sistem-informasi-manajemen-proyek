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
					<li class="breadcrumb-item active" aria-current="page">Tambah Proses Pembangunan</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN TAMBAH PROSES PEMBANGUNAN</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/tambah_proses") ?>">
					<div class="form-group">
						<label for="id_proses">ID Proses</label>
						<input autocomplete="off" required="" type="number" name="id_proses" class="form-control" value="<?php echo $kode ?>">
					</div>
					<div class="form-group">
						<label for="id_tukang">Nama Tukang</label>
						<select required="" name="id_tukang" id="id_tukang" class="form-control">
							<option disabled="" selected="">Pilih Tukang</option>
							<?php foreach ($tukang as $tk) : ?>
								<option value="<?php echo $tk->id_tukang ?>"><?php echo $tk->nama_tukang ?></option>
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
						<label for="bulan">Bulan</label>
						<input autocomplete="off" required="" type="date" name="bulan" class="form-control">
					</div>
					<div class="form-group">
						<label for="proses">Proses</label>
						<input autocomplete="off" required="" type="text" name="proses" class="form-control">
					</div>
					<div class="tombol-bawah">
						<button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
						<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
						<a href="<?php echo base_url('admin/proses_pembangunan') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

<?php } ?>