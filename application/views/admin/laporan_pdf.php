<?php if (!$this->session->userdata('username')) {

  redirect('auth');
} else {
?>
  <?php $date = date("Y-m-d") ?>

  <title>Laporan <?php echo $role ?></title>

  <?php if ($role === 'user') { ?>
    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <div class="table-responsive">
      <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th style="text-align: center">Kode User</th>
            <th style="text-align: center">Username</th>
            <th style="text-align: center">Password</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($user as $us) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $us->id_user ?></td>
              <td><?php echo $us->username ?></td>
              <td><?php echo $us->password ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
      </table>
    </div>

  <?php } else if ($role === 'konsumen') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <div class="card-body table-responsive">
      <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th style="text-align: center">Kode Konsumen</th>
            <th style="text-align: center">Nama</th>
            <th style="text-align: center">No.KTP</th>
            <th style="text-align: center">Pekerjaan</th>
            <th style="text-align: center">Alamat</th>
            <th style="text-align: center">Status</th>
            <th style="text-align: center">No HP</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($konsumen as $ks) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $ks->id_konsumen ?></td>
              <td><?php echo $ks->nama ?></td>
              <td><?php echo $ks->noktp ?></td>
              <td><?php echo $ks->pekerjaan ?></td>
              <td><?php echo $ks->alamat ?></td>
              <td><?php echo $ks->status ?></td>
              <td><?php echo $ks->nohp ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
      </table>
    </div>

  <?php } else if ($role === 'kavling') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>


    <div class="card-body table-responsive">
      <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th style="text-align: center">Kode Block</th>
            <th style="text-align: center">No.Block</th>
            <th style="text-align: center">Luas Tanah</th>
            <th style="text-align: center">No Sertifikat</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($kavling as $kv) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $kv->id_block ?></td>
              <td><?php echo $kv->noblock ?></td>
              <td><?php echo $kv->luas_tanah ?></td>
              <td><?php echo $kv->no_sertifikat ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
      </table>
    </div>

  <?php } else if ($role === "tukang") { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <div class="card-body table-responsive">
      <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th style="text-align: center">Kode Tukang</th>
            <th style="text-align: center">Nama</th>
            <th style="text-align: center">Jabatan</th>
            <th style="text-align: center">Alamat</th>
            <th style="text-align: center">Nomer HP</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($tukang as $tk) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $tk->id_tukang ?></td>
              <td><?php echo $tk->nama_tukang ?></td>
              <td><?php echo $tk->jabatan ?></td>
              <td><?php echo $tk->alamat ?></td>
              <td><?php echo $tk->nohp ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
      </table>
    </div>


  <?php } else if ($role === 'cash') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>



    <table border="1" cellspacing="0" width="100%">
      <tr>
        <td width="5%">
          <br>
          <div style="text-align:center; font-weight: 800">
            Cash
          </div>
          <br>
        </td>
        <td width="10%">
          <div style="text-align:center; font-weight: 800">
            Nama
          </div>
        </td>
        <td width="10%">
          <div style="text-align:center; font-weight: 800">
            No Block
          </div>
        </td>
        <td width="5%">
          <div style="text-align:center; font-weight: 800">
            Type
          </div>
        </td>
        <td width="10%">
          <div style="text-align:center; font-weight: 800">
            Uang Muka
          </div>
        </td>
        <td width="8%">
          <div style="text-align:center; font-weight: 800">
            Harga
          </div>
        </td>
        <td width="10%">
          <div style="text-align:center; font-weight: 800">
            Pembayaran
          </div>
        </td>
        <td width="10%">
          <div style="text-align:center; font-weight: 800">
            Jumlah
          </div>
        </td>
        <td width="10%">
          <div style="text-align:center; font-weight: 800">
            Total
          </div>
        </td>
        <td width="10%">
          <div style="text-align:center; font-weight: 800">
            Spesifikasi
          </div>
        </td>
        <td width="15%">
          <div style="text-align:center; font-weight: 800">
            Keterangan
          </div>
        </td>
      </tr>

      <?php foreach ($cash as $ch) : ?>
        <tr>
          <td style="padding: 20px 0px; text-align: center"><?php echo $ch->id_cash ?></td>
          <td style="text-align: center"><?php
                                          $konsumen = $this->db->get_where('tb_konsumen', ['id_konsumen' => $ch->id_konsumen])->row();
                                          echo $konsumen->nama;
                                          ?></td>
          <td style="text-align: center"><?php
                                          $block = $this->db->get_where('tb_kavling', ['id_block' => $ch->id_block])->row();
                                          echo $block->noblock;
                                          ?></td>
          <td style="text-align: center"><?php echo $ch->type ?></td>
          <td style="text-align: center"><?php echo number_format($ch->dp, 0, ',', '.') ?></td>
          <td style="text-align: center"><?php echo number_format($ch->harga, 0, ',', '.') ?></td>
          <td style="text-align: center"><?php echo number_format($ch->pembayaran, 0, ',', '.') ?></td>
          <td style="text-align: center"><?php echo number_format($ch->jumblah, 0, ',', '.') ?></td>
          <td style="text-align: center"><?php echo number_format($ch->total, 0, ',', '.') ?></td>
          <td style="text-align: center"><?php echo $ch->spesifikasi ?></td>
          <td style="word-wrap: break-word; text-align: left">
            <?php echo $ch->keterangan ?>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
    <!-- Bisa buat baru ga cuk? w pen experiment -->

  <?php } else if ($role === 'hutang') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <div class="card-body">
      <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%" style="text-align: center">Kode Hutang</th>
            <th width="20%" style="text-align: center">Nama</th>
            <th width="10%" style="text-align: center">Hutang</th>
            <th width="10%" style="text-align: center">Bayar</th>
            <th width="10%" style="text-align: center">Sisa Hutang</th>
            <th width="50%" style="text-align: center">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($hutang as $ht) : ?>
            <tr>
              <td style="text-align: center"><?php echo $no++ ?></td>
              <td style="text-align: center"><?php echo $ht->id_hutang ?></td>
              <td style="text-align: center"><?php
                                              $konsumen = $this->db->get_where('tb_konsumen', ['id_konsumen' => $ht->id_konsumen])->row();
                                              echo $konsumen->nama;
                                              ?></td>
              <td style="text-align: center"><?php echo number_format($ht->hutang, 0, ',', '.') ?></td>
              <td style="text-align: center"><?php echo number_format($ht->bayar, 0, ',', '.') ?></td>
              <td style="text-align: center"><?php echo number_format($ht->sisa_hutang, 0, ',', '.') ?></td>
              <td style="word-break:  break-all; text-align: left"><?php echo $ht->keterangan ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
      </table>
    </div>


  <?php   } else if ($role === 'penggajian') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <div class="card-body table-responsive">
      <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th style="text-align: center">ID Gaji</th>
            <th style="text-align: center">Nama Tukang</th>
            <th style="text-align: center">Jabatan</th>
            <th style="text-align: center">Gaji</th>
            <th style="text-align: center">Jumblah Masuk</th>
            <th style="text-align: center">Total Gaji</th>
            <th style="text-align: center">Cashbon</th>
            <th style="text-align: center">Sisa Gaji</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($penggajian as $pg) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $pg->id_gaji ?></td>
              <td><?php
                  $tukang = $this->db->get_where('tb_tukang', ['id_tukang' => $pg->id_tukang])->row();
                  echo $tukang->nama_tukang;
                  ?></td>
              <td><?php echo $pg->jabatan ?></td>
              <td><?php echo $pg->gaji ?></td>
              <td><?php echo number_format($pg->jumblah, 0, ',', '.') ?></td>
              <td><?php echo number_format($pg->total_gaji, 0, ',', '.') ?></td>
              <td><?php echo number_format($pg->cashbon, 0, ',', '.') ?></td>
              <td><?php echo number_format($pg->sisa_gaji, 0, ',', '.') ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
      </table>
    </div>


  <?php } else if ($role === 'proses') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <div class="card-body table-responsive">
      <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
        <thead>
          <tr>
            <th width="3%">No</th>
            <th style="text-align: center">ID Proses</th>
            <th style="text-align: center">Nama Tukang</th>
            <th style="text-align: center">Block</th>
            <th style="text-align: center">Bulan</th>
            <th style="text-align: center">Proses</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($proses as $pr) : ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $pr->id_proses ?></td>
              <td><?php
                  $tukang = $this->db->get_where('tb_tukang', ['id_tukang' => $pr->id_tukang])->row();
                  echo $tukang->nama_tukang;
                  ?></td>
              <td><?php
                  $block = $this->db->get_where('tb_kavling', ['id_block' => $pr->id_block])->row();
                  echo $block->noblock;
                  ?></td>
              <td><?php echo $pr->bulan ?></td>
              <td><?php echo $pr->proses ?></td>
            </tr>
        </tbody>
      <?php endforeach ?>
      </table>
    </div>


  <?php  } else if ($role === 'pembelian') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>
        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
      <thead>
        <tr>
          <th width="3%">No</th>
          <th style="text-align: center">ID Pembelian</th>
          <th style="text-align: center">Nama Barang</th>
          <th style="text-align: center">Jumblah</th>
          <th style="text-align: center">Harga</th>
          <th style="text-align: center">Total</th>
          <th style="text-align: center" width="30%">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($pembelian as $pb) : ?>
          <tr>
            <td style="text-align: center"><?php echo $no++ ?></td>
            <td style="text-align: center"><?php echo $pb->id_pembeli ?></td>
            <td style="text-align: center"><?php echo $pb->nama_barang ?></td>
            <td style="text-align: center"><?php echo number_format($pb->jumblah, 0, ',', '.') ?></td>
            <td style="text-align: center"><?php echo number_format($pb->harga, 0, ',', '.') ?></td>
            <td style="text-align: center"><?php echo number_format($pb->total, 0, ',', '.') ?></td>
            <td style="word-break: break-all;"><?php echo $pb->keterangan ?></td>
          </tr>
      </tbody>
    <?php endforeach ?>
    </table>


  <?php  } else if ($role === 'pengeluaran') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>

        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
      <thead>
        <tr>
          <th width="3%">No</th>
          <th style="text-align: center">ID Pengeluaran</th>
          <th style="text-align: center">Block</th>
          <th style="text-align: center">Nama Material</th>
          <th style="text-align: center">Jumblah</th>
          <th style="text-align: center">Harga</th>
          <th style="text-align: center">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($pengeluaran as $pg) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pg->id_keluar ?></td>
            <td><?php echo $pg->id_block ?></td>
            <td><?php echo $pg->nama_material ?></td>
            <td><?php echo number_format($pg->jumblah, 0, ',', '.') ?></td>
            <td><?php echo number_format($pg->harga, 0, ',', '.') ?></td>
            <td><?php echo number_format($pg->total, 0, ',', '.') ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>


  <?php } else if ($role === 'inventaris') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>

        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
      <thead>
        <tr>
          <th width="5%">No</th>
          <th width="20%" style="text-align: center;">ID Inventaris</th>
          <th width="20%" style="text-align: center;">Nama Barang</th>
          <th width="10%" style="text-align: center;">Jumblah</th>
          <th width="45%" style="text-align: center;">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($inventaris as $iv) : ?>
          <tr>
            <td style="text-align: center;"><?php echo $no++ ?></td>
            <td style="text-align: center;"><?php echo $iv->id_inventaris ?></td>
            <td style="text-align: center;"><?php echo $iv->nama_barang ?></td>
            <td style="text-align: center;"><?php echo number_format($iv->jumblah, 0, ',', '.') ?></td>
            <td style="word-break: break-all;"><?php echo $iv->keterangan ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  <?php } else if ($role === 'stok') { ?>

    <h3>
      <center><?php echo $nama_laporan ?></center>
    </h3>
    <br>
    <table style="margin-bottom: 20px">
      <tr>
        <td><b>Data</b></td>
        <td>:</td>

        <td>Data <?php echo $role ?></td>
      </tr>
      <tr>
        <td><b>Tanggal Cetak</b></td>
        <td>:</td>
        <td><?php echo $date ?></td>
      </tr>
    </table>

    <table border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
      <thead>
        <tr>
          <th width="3%">No</th>
          <th style="text-align: center;">ID Stok</th>
          <th style="text-align: center;">Nama Material</th>
          <th style="text-align: center;">Jumblah Stok</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($stok as $st) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $st->id_stok ?></td>
            <td><?php echo $st->nama_material ?></td>
            <td><?php echo number_format($st->jumblah, 0, ',', '.') ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>


  <?php } else { ?>

    <P>Maaf anda masuka lewat mana</P>

  <?php } ?>

<?php } ?>