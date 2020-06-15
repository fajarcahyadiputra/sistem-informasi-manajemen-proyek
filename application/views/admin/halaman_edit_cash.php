
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
				<li class="breadcrumb-item active" aria-current="page">Edit Pembayaran Cash</li>
			</ol>
		</nav>
		<section class="wrapper">
			<div class="card-header">
				<h3>HALAMAN EDIT PEMBAYARAN CASH</h3>
			</div>
			<form method="post" action="<?php echo base_url("admin/edit_cash") ?>">
				<div class="form-group">
					<label for="id_cash">ID Cash</label>
					<input autocomplete="off" required=""  type="number" name="id_cash" class="form-control" value="<?php echo $cash->id_cash ?>">
					<input hidden="" type="number" name="id_cash_lama" class="form-control" value="<?php echo $cash->id_cash ?>">

				</div>
				<div class="form-group">
					<label for="id_konsumen">Nama Konsumen</label>
					<select required="" name="id_konsumen" id="id_konsumen" class="form-control">
						<!-- <option disabled="" selected="">Pilih Konsumen</option> -->
						<?php foreach ($konsumen as $ks): ?>
							<option <?php if($ks->id_konsumen === $cash->id_konsumen){echo 'selected';}?> value="<?php echo $ks->id_konsumen ?>"><?php echo $ks->nama?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="block">Block</label>
					<select required="" name="block" id="block" class="form-control">
						<?php foreach ($block as $bl): ?>
							<option <?php echo ($bl->id_block === $cash->id_block) ? 'selected':''; ?> value="<?php echo $bl->id_block ?>"><?php echo $bl->noblock?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="type">Type</label>
					<input autocomplete="off" required="" type="text" name="type" class="form-control" value="<?php echo $cash->type ?>">
				</div>
				<div class="form-group">
					<label for="spesifikasi">Spesifikasi</label>
					<input autocomplete="off" required="" type="text" name="spesifikasi" class="form-control" value="<?php echo $cash->spesifikasi ?>">
				</div>
				<div class="form-group">
					<label for="harga">Harga</label>
					<input autocomplete="off" required="" type="number" name="harga" class="form-control" value="<?php echo $cash->harga ?>">
				</div>
				<div class="form-group">
					<label for="uang_muka">Uang Muka</label>
					<input autocomplete="off" required="" type="number" name="uang_muka" class="form-control" value="<?php echo $cash->dp ?>">
				</div>
				<div class="form-group">
					<label for="pembayaran">Pembayaran</label>
					<input autocomplete="off" required="" type="number" name="pembayaran" class="form-control" value="<?php echo $cash->pembayaran ?>">
				</div>
				<div class="form-group">
					<label for="jumblah">Jumblah</label>
					<input autocomplete="off" required="" type="number" name="jumblah" class="form-control" value="<?php echo $cash->jumblah ?>">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<textarea rows="3" class="form-control" name="keterangan"><?php echo $cash->keterangan ?></textarea>
				</div>
				<div class="tombol-bawah">
					<button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
					<button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
				</div>
			</form>
		</section>
	</div>
</div>



