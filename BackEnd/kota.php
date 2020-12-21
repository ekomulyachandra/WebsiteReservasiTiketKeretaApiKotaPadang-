<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Kota</h1>

<p><a href="?p=kota&aksi=entri" class="btn btn-primary"> + Tambah data</a></p>
<table class="table table-condensed" id="tabelkota">
	<thead>
  <tr>
		<th>No</th>
		<th>Nama </th>
		<th>Aksi</th>
	</tr>
  </thead>
  
	<?php
	include ('koneksi.php');//koneksi ke mysql
	$data=mysqli_query($koneksi,"SELECT * FROM kota");
	$no=1;
	while ($row=mysqli_fetch_array($data)){
	?>
  <tbody>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['namakota'] ?></td>
		<td><a href="aksi_kota.php?proses=hapus&kode=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</a>
		<a href="?p=kota&aksi=edit&kode=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
    
		</td>
	</tr>
	<?php
	$no++;
	}
	?>
  </tbody>
  <tfoot>
    
  </tfoot>
</table>

<?php
break;
case 'entri':
?>
<h1>Masukkan Data Kota</h1>
<form class="form-horizontal" role="form" action="aksi_kota.php?proses=tambah" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="nama">
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
$ambil=mysqli_query($koneksi,"SELECT * FROM kota WHERE id='$_GET[kode]'");
$data=mysqli_fetch_array($ambil);
?>
<h1>Edit Data Kota</h1>
<form class="form-horizontal" role="form" action="aksi_kota.php?proses=ubah&kode=<?= $data['id']?>" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama Kota</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="nama" value="<?=$data['namakota']?>">
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