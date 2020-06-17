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
					<li class="breadcrumb-item active" aria-current="page">Tambah Hutang</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN TAMBAH HUTANG</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/tambah_hutang") ?>">
					<div class="form-group">
						<label for="id_hutang">ID Hutang</label>
						<input autocomplete="off" required="" type="number" name="id_hutang" class="form-control" value="<?php echo $kode ?>">
					</div>
					<div class="form-group">
						<label for="id_konsumen">Nama Konsumen</label>
						<select required="" name="id_konsumen" id="id_konsumen" class="form-control">
							<option disabled selected>Pilih Konsumen</option>
							<?php foreach ($konsumen as $ks) : ?>
								<option value="<?php echo $ks->id_konsumen ?>"><?php echo $ks->nama ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="hutang">Hutang</label>
						<input required="" autocomplete="off" id="hutang" type="text" name="hutang" class="form-control">
					</div>
					<div class="form-group">
						<label for="bayar">Bayar</label>
						<input required="" autocomplete="off" id="bayar" type="text" name="bayar" class="form-control">
					</div>
					<div class="form-group">
						<label for="sisa_hutang">Sisa Hutang</label>
						<input required="" autocomplete="off" id="sisa_hutang" type="number" name="sisa_hutang" class="form-control">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea class="form-control" rows="3" name="keterangan"></textarea>
					</div>
					<div class="tombol-bawah">
						<button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
						<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
						<a href="<?php echo base_url('admin/pembayaran_hutang') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#bayar').on('keyup', function() {
				const hutang = $('#hutang').val();
				const bayar = $('#bayar').val();
				const hasil = hutang - bayar;
				$('#sisa_hutang').val(hasil)

			})
		})
	</script>
<?php } ?>