
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
				<li class="breadcrumb-item active" aria-current="page">Edit Konsumnen</li>
			</ol>
		</nav>
		<section class="wrapper">
			<div class="card-header">
				<h3>HALAMAN EDIT KONSUMNEN</h3>
			</div>
			<form method="post" action="<?php echo base_url("admin/edit_konsumen") ?>">
				<div class="form-group">
					<label for="id_konsumen">ID Konsumen</label>
					<input autocomplete="off" required=""  type="number" name="id_konsumen" class="form-control" value="<?php echo $konsumen->id_konsumen ?>">
					<input  required="" hidden="" type="number" name="id_konsumen_lama"  value="<?php echo $konsumen->id_konsumen ?>">

				</div>
				<div class="form-group">
					<label for="nama">Nama</label>
					<input autocomplete="off" required="" type="text" name="nama" class="form-control"  value="<?php echo $konsumen->nama ?>">
				</div>
				<div class="form-group">
					<label for="noktp">NO KTP</label>
					<input required="" autocomplete="off" type="number" name="noktp" class="form-control"  value="<?php echo $konsumen->noktp ?>">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input autocomplete="off" required="" type="text" name="alamat" class="form-control"  value="<?php echo $konsumen->alamat ?>">
				</div>
				<div class="form-group">
					<label for="pekerjaan">Pekerjaan</label>
					<input autocomplete="off" required="" type="text" name="pekerjaan" class="form-control" value="<?php echo $konsumen->pekerjaan ?>">
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<input autocomplete="off" required="" type="text" name="status" class="form-control"  value="<?php echo $konsumen->status ?>">
				</div>
				<div class="form-group">
					<label for="nohp">NO HP</label>
					<input autocomplete="off" required="" type="number" name="nohp" class="form-control"  value="<?php echo $konsumen->nohp ?>">
				</div>
				<div class="tombol-bawah">
					<button type="submit" class="btn btn-primary" style="width: 200px;">Edit <i class="fas fa-edit ml-2"></i></button>
					<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
				</div>
			</form>
		</section>
	</div>
</div>



