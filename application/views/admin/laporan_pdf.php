<?php $date = date("Y-m-d") ?>

<title>Laporan <?php echo $role ?></title>

<?php if($role === 'user'){ ?>
  <h3><center><?php echo $nama_laporan ?></center></h3>
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
   <?php $no=1; foreach($user as $us) : ?>
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

<?php }else if($role === 'konsumen'){ ?>

  <h3><center><?php echo $nama_laporan ?></center></h3>
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
      <th  width="3%">No</th>
      <th  style="text-align: center">Kode Konsumen</th>
      <th  style="text-align: center">Nama</th>
      <th  style="text-align: center">No.KTP</th>
      <th  style="text-align: center">Pekerjaan</th>
      <th  style="text-align: center">Alamat</th>
      <th  style="text-align: center">Status</th>
      <th  style="text-align: center">No HP</th>
    </tr>
  </thead>
  <tbody>
   <?php $no=1; foreach($konsumen as $ks) : ?>
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

<?php }else if($role === 'kavling'){ ?>

  <h3><center><?php echo $nama_laporan ?></center></h3>
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
   <?php $no=1; foreach($kavling as $kv) : ?>
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

<?php }else if($role === "tukang"){ ?>

  <h3><center><?php echo $nama_laporan ?></center></h3>
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
 <table  border="1" cellspacing="0" style="width: 100%;" cellpadding="10">
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
 <?php $no=1; foreach($tukang as $tk) : ?>
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


<?php } ?>