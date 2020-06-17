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
					<li class="breadcrumb-item active" aria-current="page">Edit Kavling</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN EDIT KAVLING</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/edit_kavling") ?>">
					<div class="form-group">
						<label for="id_kavling">ID Kavling</label>
						<input autocomplete="off" required="" type="number" name="id_kavling" class="form-control" value="<?php echo $kavling->id_block ?>">
						<input type="number" name="id_kavling_lama" hidden="" value="<?php echo $kavling->id_block ?>">

					</div>
					<div class="form-group">
						<label for="no_block">No Block</label>
						<input autocomplete="off" required="" type="number" name="no_block" class="form-control" value="<?php echo $kavling->noblock ?>">
					</div>
					<div class="form-group">
						<label for="luas_tanah">Luas Tanah</label>
						<input required="" autocomplete="off" type="text" name="luas_tanah" class="form-control" value="<?php echo $kavling->luas_tanah ?>">
					</div>
					<div class="form-group">
						<label for="no_sertifikat">No Sertifikat</label>
						<input required="" autocomplete="off" type="text" name="no_sertifikat" class="form-control" value="<?php echo $kavling->no_sertifikat ?>">
					</div>
					<div class="tombol-bawah">
						<button type="submit" class="btn btn-primary" style="width: 200px;">Edit <i class="fas fa-edit ml-2"></i></button>
						<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
						<a href="<?php echo base_url('admin/data_kavling') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

<?php } ?>