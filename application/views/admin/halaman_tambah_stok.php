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
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Stok Material</li>
                </ol>
            </nav>
            <section class="wrapper">
                <div class="card-header">
                    <h3>HALAMAN TAMBAH STOK MATERIAL</h3>
                </div>
                <form method="post" action="<?php echo base_url("admin/tambah_stok") ?>">
                    <div class="form-group">
                        <label for="id_stok">ID Stok</label>
                        <input autocomplete="off" required="" type="number" name="id_stok" class="form-control" value="<?php echo $kode ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_material">Nama Material</label>
                        <input autocomplete="off" required="" type="text" name="nama_material" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jumblah">jumblah</label>
                        <input autocomplete="off" required="" type="number" name="jumblah" class="form-control">
                    </div>
                    <div class="tombol-bawah">
                        <button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
                        <button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
                        <a href="<?php echo base_url('admin/data_material_stok') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
                    </div>
                </form>
            </section>
        </div>
    </div>
<?php } ?>