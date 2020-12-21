<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Pelanggan Kereta Api</h1>

<p><a href="?p=pelanggan&aksi=entri" class="btn btn-primary"> + Tambah data</a></p>
<table class="table table-condensed" id="tabelpelanggan">
	<thead>
  <tr>
		<th>No</th>
		<th>Nama</th>
		<th>Email</th>
    <th>Alamat</th>
    <th>Kota</th>
    <th>Tanggal Lahir</th>
    <th>No Hp</th>
		<th>Aksi</th>
	</tr>
  </thead>
  
	<?php
	include ('koneksi.php');//koneksi ke mysql
	$data=mysqli_query($koneksi,"SELECT * FROM pelanggan");
	$no=1;
	while ($row=mysqli_fetch_array($data)){
	?>
  <tbody>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['alamat'] ?></td>
		<td><?php echo $row['kota'] ?></td>
    <td><?php echo $row['tgl_lahir'] ?></td>
    <td><?php echo $row['nohp'] ?></td>
		<td><a href="aksi_pelanggan.php?proses=hapus&kode=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</a>
		<a href="?p=pelanggan&aksi=edit&kode=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
    
		</td>
	</tr>
	<?php
	$no++;
	}
	?>
  </tbody>
</table>

<?php
break;
case 'entri':
?>
<h1>Masukkan Data Pelanggan</h1>
<form class="form-horizontal" role="form" action="aksi_pelanggan.php?proses=tambah" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="nama">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Kota</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="kota" name="kota">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  placeholder="Tanggal Lahir" name="tgl_lahir">
    </div>
  </div>
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">No Hp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="No Hp" name="nohp">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>

<?php
break;
case 'edit':

include ('koneksi.php');
$ambil=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id='$_GET[kode]'");
$data=mysqli_fetch_array($ambil);
?>
<h1>Edit Kelas Kereta Api</h1>
<form class="form-horizontal" role="form" action="aksi_pelanggan.php?proses=ubah&kode=<?= $data['id']?>" method="post" enctype="multipart/form-data">
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama Kelas" name="nama" value="<?= $data['nama']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Email" name="email" value="<?= $data['email']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  placeholder="Password" name="password" value="<?= $data['password']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Alamat" name="alamat" value="<?= $data['alamat']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Kota</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="kota" name="kota" value="<?= $data['kota']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  placeholder="Tanggal Lahir" name="tgl_lahir" value="<?= $data['tgl_lahir']?>">
    </div>
  </div>
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">No Hp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="No Hp" name="nohp" value="<?= $data['nohp']?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
<?php
break;
}
?>
</div>
  </div>
  
</section>