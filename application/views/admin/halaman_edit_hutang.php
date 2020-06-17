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
					<li class="breadcrumb-item active" aria-current="page">Edit Hutang</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN EDIT HUTANG</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/edit_hutang") ?>">
					<div class="form-group">
						<label for="id_hutang">ID Hutang</label>
						<input autocomplete="off" required="" type="number" name="id_hutang" class="form-control" value="<?php echo $hutang->id_hutang ?>">
						<input name="id_hutang_lama" hidden="" value="<?php echo $hutang->id_hutang ?>">

					</div>
					<div class="form-group">
						<label for="id_konsumen">Nama Konsumen</label>
						<select required="" name="id_konsumen" id="id_konsumen" class="form-control">
							<?php foreach ($konsumen as $ks) : ?>
								<option <?php echo ($ks->id_konsumen == $hutang->id_konsumen) ? 'selected' : '' ?> value="<?php echo $ks->id_konsumen ?>"><?php echo $ks->nama ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="hutang">Hutang</label>
						<input required="" autocomplete="off" id="hutang" type="text" name="hutang" class="form-control" value="<?php echo $hutang->hutang ?>">
					</div>
					<div class="form-group">
						<label for="bayar">Bayar</label>
						<input required="" autocomplete="off" id="bayar" type="text" name="bayar" class="form-control" value="<?php echo $hutang->bayar ?>">
					</div>
					<div class="form-group">
						<label for="sisa_hutang">Sisa Hutang</label>
						<input required="" autocomplete="off" id="sisa_hutang" type="number" name="sisa_hutang" class="form-control" value="<?php echo $hutang->sisa_hutang ?>">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea class="form-control" rows="3" name="keterangan"><?php echo $hutang->keterangan ?></textarea>
					</div>
					<div class="tombol-bawah">
						<button type="submit" class="btn btn-primary" style="width: 200px;">Edit <i class="fas fa-edit ml-2"></i></button>
						<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
						<a href="<?php echo base_url('admin/pembayaran_hutang') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

<?php } ?>