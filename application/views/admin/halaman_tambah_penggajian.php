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
          <li class="breadcrumb-item active" aria-current="page">Tambah Penggajian Tukang</li>
        </ol>
      </nav>
      <section class="wrapper">
        <div class="card-header">
          <h3>HALAMAN TAMBAH PENGGAJIAN TUKANG</h3>
        </div>
        <form method="post" action="<?php echo base_url("admin/tambah_penggajian") ?>">
          <div class="form-group">
            <label for="id_gaji">ID Gaji</label>
            <input autocomplete="off" required="" type="number" name="id_gaji" class="form-control" value="<?php echo $kode ?>">
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
            <label for="jabatan">Jabatan</label>
            <input autocomplete="off" required="" type="text" name="jabatan" class="form-control">
          </div>
          <div class="form-group">
            <label for="gaji">gaji</label>
            <input autocomplete="off" required="" type="number" name="gaji" class="form-control">
          </div>
          <div class="form-group">
            <label for="jumblah">Jumblah Masuk</label>
            <input autocomplete="off" required="" type="number" name="jumblah" class="form-control">
          </div>
          <div class="form-group">
            <label for="total_gaji">Total Gaji</label>
            <input autocomplete="off" required="" type="number" id="total_gaji" name="total_gaji" class="form-control">
          </div>
          <div class="form-group">
            <label for="cashbon">Cashbon</label>
            <input autocomplete="off" required="" type="number" id="cashbon" name="cashbon" class="form-control">
          </div>
          <div class="form-group">
            <label for="sisa_gaji">Sisa Gaji</label>
            <input autocomplete="off" required="" type="number" id="sisa_gaji" name="sisa_gaji" class="form-control">
          </div>
          <div class="tombol-bawah">
            <button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
            <button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
            <a href="<?php echo base_url('admin/penggajian_tukang') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
          </div>
        </form>
      </section>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#cashbon').on('keyup', function() {
        const total_gaji = $('#total_gaji').val();
        const cashbon = $('#cashbon').val();
        const hasil = total_gaji - cashbon;
        $('#sisa_gaji').val(hasil)

      })
    })
  </script>

<?php } ?>