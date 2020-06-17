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
          <li class="breadcrumb-item active" aria-current="page">Edit Penggajian Tukang</li>
        </ol>
      </nav>
      <section class="wrapper">
        <div class="card-header">
          <h3>HALAMAN EDIT PENGGAJIAN TUKANG</h3>
        </div>
        <form method="post" action="<?php echo base_url("admin/edit_penggajian") ?>">
          <div class="form-group">
            <label for="id_gaji">ID Gaji</label>
            <input autocomplete="off" required="" type="number" name="id_gaji" class="form-control" value="<?php echo $penggajian->id_gaji ?>">
            <input name="id_gaji_lama" hidden="" value="<?php echo $penggajian->id_gaji ?>">

          </div>
          <div class="form-group">
            <label for="id_tukang">Nama Tukang</label>
            <select required="" name="id_tukang" id="id_tukang" class="form-control">
              <option disabled="" selected="">Pilih Tukang</option>
              <?php foreach ($tukang as $tk) : ?>
                <option <?php echo ($tk->id_tukang === $penggajian->id_tukang) ? 'selected' : '' ?> value="<?php echo $tk->id_tukang ?>"><?php echo $tk->nama_tukang ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input autocomplete="off" required="" type="text" name="jabatan" class="form-control" value="<?php echo $penggajian->jabatan ?>">
          </div>
          <div class="form-group">
            <label for="gaji">gaji</label>
            <input autocomplete="off" required="" type="number" name="gaji" class="form-control" value="<?php echo $penggajian->gaji ?>">
          </div>
          <div class="form-group">
            <label for="jumblah">Jumblah Masuk</label>
            <input autocomplete="off" required="" type="number" name="jumblah" class="form-control" value="<?php echo $penggajian->jumblah ?>">
          </div>
          <div class="form-group">
            <label for="total_gaji">Total Gaji</label>
            <input autocomplete="off" required="" type="number" id="total_gaji" name="total_gaji" class="form-control" value="<?php echo $penggajian->total_gaji ?>">
          </div>
          <div class="form-group">
            <label for="cashbon">Cashbon</label>
            <input autocomplete="off" required="" type="number" id="cashbon" name="cashbon" class="form-control" value="<?php echo $penggajian->cashbon ?>">
          </div>
          <div class="form-group">
            <label for="sisa_gaji">Sisa Gaji</label>
            <input autocomplete="off" required="" type="number" id="sisa_gaji" name="sisa_gaji" class="form-control" value="<?php echo $penggajian->sisa_gaji ?>">
          </div>
          <div class="tombol-bawah">
            <button type="submit" class="btn btn-primary" style="width: 200px;">Edit <i class="fas fa-edit ml-2"></i></button>
            <button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
            <a href="<?php echo base_url('admin/penggajian_tukang') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
          </div>
        </form>
      </section>
    </div>
  </div>


<?php } ?>