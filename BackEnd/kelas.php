<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Kelas Kereta Api</h1>

<p><a href="?p=kelas&aksi=entri" class="btn btn-primary"> + Tambah data</a></p>
<table class="table table-condensed" id="tabelkelas">
	<thead>
  <tr>
		<th>No</th>
		<th>Kelas</th>
		<th>Harga</th>
		<th>Aksi</th>
	</tr>
  </thead>
  
	<?php
	include ('koneksi.php');//koneksi ke mysql
	$data=mysqli_query($koneksi,"SELECT * FROM kelas");
	$no=1;
	while ($row=mysqli_fetch_array($data)){
	?>
  <tbody>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['namakelas'] ?></td>
		<td><?php echo $row['harga'] ?></td>
		<td><a href="aksi_kelas.php?proses=hapus&kode=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</a>
		<a href="?p=kelas&aksi=edit&kode=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
    
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
<h1>Masukkan Kelas Kereta Api</h1>
<form class="form-horizontal" role="form" action="aksi_kelas.php?proses=tambah" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama Kelas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama Kelas" name="namakelas">
    </div>
  </div>
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Harga" name="harga">
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
$ambil=mysqli_query($koneksi,"SELECT * FROM kelas WHERE id='$_GET[kode]'");
$data=mysqli_fetch_array($ambil);
?>
<h1>Edit Kelas Kereta Api</h1>
<form class="form-horizontal" role="form" action="aksi_kelas.php?proses=ubah&kode=<?= $data['id']?>" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama Kelas</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="namakelas" value="<?= $data['namakelas']?>">
    </div>
  </div>
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="harga" value="<?= $data['harga']?>">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <Input type="submit" name="submit" class="btn btn-primary">
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