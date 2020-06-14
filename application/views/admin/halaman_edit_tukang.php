
<style>
	.card{
		margin:20px;
	}
	.wrapper{
		margin: 30px;

	}
	form{
		margin: 20px;
	}
	.wrapper h3{
		text-align: center;
	}
	.tombol-bawah{
		display: flex;
	}
</style>
<div class="conatiner-fluid" id="container-wrapper">
	<div class="card" >
		<nav aria-label="breadcrumb" style="background-color: #E3FDF5">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('admin') ?>">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Tambah Edit</li>
			</ol>
		</nav>
		<section class="wrapper">
			<div class="card-header">
				<h3>HALAMAN EDIT TUKANG</h3>
			</div>
			<form method="post" action="<?php echo base_url("admin/edit_tukang") ?>">
				<div class="form-group">
					<label for="id_tukang">ID Tukang</label>
					<input autocomplete="off" required=""  type="number" name="id_tukang" class="form-control" value="<?php echo $tukang->id_tukang ?>">
					<input   type="number" name="id_tukang_lama" hidden="" value="<?php echo $tukang->id_tukang ?>">

				</div>
				<div class="form-group">
					<label for="nama">Nama Tukang</label>
					<input autocomplete="off" required="" type="text" name="nama" class="form-control" value="<?php echo $tukang->nama_tukang ?>">
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan</label>
					<input required="" autocomplete="off" type="text" name="jabatan" class="form-control" value="<?php echo $tukang->jabatan ?>">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input required="" autocomplete="off" type="text" name="alamat" class="form-control" value="<?php echo $tukang->alamat ?>">
				</div>
				<div class="form-group">
					<label for="nohp">NO HP</label>
					<input required="" autocomplete="off" type="number" name="nohp" class="form-control" value="<?php echo $tukang->nohp ?>">
				</div>
				<div class="tombol-bawah">
					<button type="submit" class="btn btn-primary" style="width: 200px;">Edit <i class="fas fa-edit ml-2"></i></button>
					<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
				</div>
			</form>
		</section>
	</div>
</div>



