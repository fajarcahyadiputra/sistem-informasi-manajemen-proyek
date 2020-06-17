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
                    <li class="breadcrumb-item active" aria-current="page">Edit Inventaris</li>
                </ol>
            </nav>
            <section class="wrapper">
                <div class="card-header">
                    <h3>HALAMAN EDIT INVENTARIS</h3>
                </div>
                <form method="post" action="<?php echo base_url("admin/edit_inventaris") ?>">
                    <div class="form-group">
                        <label for="id_inventaris">ID Inventaris</label>
                        <input autocomplete="off" required="" type="number" name="id_inventaris" class="form-control" value="<?php echo $inven->id_inventaris ?>">
                        <input type="number" name="id_inventaris_lama" hidden value="<?php echo $inven->id_inventaris ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input autocomplete="off" required="" type="text" name="nama_barang" class="form-control" value="<?php echo $inven->nama_barang ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumblah">Jumblah</label>
                        <input required="" autocomplete="off" type="number" name="jumblah" class="form-control" value="<?php echo $inven->jumblah ?>">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"><?php echo $inven->keterangan ?></textarea>
                    </div>
                    <div class="tombol-bawah">
                        <button type="submit" class="btn btn-primary" style="width: 200px;">Tambah <i class="fas fa-plus ml-2"></i></button>
                        <button type="reset" class="btn btn-warning ml-2" style="width:200px">Reset</button>
                        <a href="<?php echo base_url('admin/data_inventaris_barang') ?>" class="btn btn-primary ml-2" style="width:200px">Kembali</a>
                    </div>
                </form>
            </section>
        </div>
    </div>
<?php } ?>