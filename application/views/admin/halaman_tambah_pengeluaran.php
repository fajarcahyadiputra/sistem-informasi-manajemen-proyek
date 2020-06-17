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
					<li class="breadcrumb-item active" aria-current="page">Tambah Pengeluaran</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN TAMBAH PENGELUARAN</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/tambah_pengeluaran") ?>">
					<div class="form-group">
						<label for="id_pengeluaran">ID Pengeluaran</label>
						<input autocomplete="off" required="" type="number" name="id_pengeluaran" class="form-control" value="<?php echo $kode ?>">
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
						<label for="nama_material">Nama Material</label>
						<input required="" autocomplete="off" id="nama_material" type="text" name="nama_material" class="form-control">
					</div>
					<div class="form-group">
						<label for="jumblah">Jumblah</label>
						<input required="" autocomplete="off" id="jumblah" type="number" name="jumblah" class="form-control">
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input required="" autocomplete="off" id="harga" type="number" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label for="total">Total</label>
						<input required="" autocomplete="off" id="total" type="number" name="total" class="form-control">
					</div>
					<div class="tombol-bawah">
						<button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
						<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
						<a href="<?php echo base_url('admin/data_pengeluaran_material') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#harga').on('keyup', function() {
				const jumblah = $('#jumblah').val();
				const harga = $('#harga').val();
				const hasil = jumblah * harga;
				$('#total').val(hasil)

			})
			$('#jumblah').on('keyup', function() {
				const jumblah = $('#jumblah').val();
				const harga = $('#harga').val();
				const hasil = jumblah * harga;
				$('#total').val(hasil)

			})
		})
	</script>

<?php } ?>