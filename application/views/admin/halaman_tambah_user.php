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
					<li class="breadcrumb-item active" aria-current="page">Tambah User</li>
				</ol>
			</nav>
			<section class="wrapper">
				<div class="card-header">
					<h3>HALAMAN TAMBAH USER</h3>
				</div>
				<form method="post" action="<?php echo base_url("admin/tambah_user") ?>">
					<div class="form-group">
						<label for="id_user">ID User</label>
						<input autocomplete="off" required="" type="number" name="id_user" class="form-control" value="<?php echo $kode ?>">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input autocomplete="off" required="" type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input required="" autocomplete="off" type="text" name="password" class="form-control" min="5">
					</div>
					<div class="tombol-bawah">
						<button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
						<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
						<a href="<?php echo base_url('admin/data_user') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
					</div>
				</form>
			</section>
		</div>
	</div>

<?php } ?>