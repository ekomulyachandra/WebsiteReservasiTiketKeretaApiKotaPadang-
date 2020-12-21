<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Petugas Kereta Api</h1>

<p><a href="?p=petugas&aksi=entri" class="btn btn-primary"> + Tambah data</a></p>
<table class="table table-condensed" id="tabelpetugas">
	<thead>
  <tr>
		<th>No</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
    <th>No Telp</th>
    <th>Alamat</th>
    <th>Jabatan</th>
		<th>Aksi</th>
	</tr>
  </thead>
  
	<?php
	include ('koneksi.php');//koneksi ke mysql
	$data=mysqli_query($koneksi,"SELECT * FROM petugas");
	$no=1;
	while ($row=mysqli_fetch_array($data)){
	?>
  <tbody>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['jekel'] ?></td>
    <td><?php echo $row['notelp'] ?></td>
    <td><?php echo $row['alamat'] ?></td>
    <td><?php echo $row['jabatan'] ?></td>
		<td><a href="aksi_petugas.php?proses=hapus&kode=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</a>
		<a href="?p=petugas&aksi=edit&kode=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
    
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
<h1>Masukkan Petugas Kereta Api</h1>
<form class="form-horizontal" role="form" action="aksi_petugas.php?proses=tambah" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="nama">
    </div>
  </div>
 
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jenis Kelamin</label>
    <div class="col-sm-10">
      <select name="jekel" id="level">
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan" >Perempuan</option>
        </select>
    </div>
</div>
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">No Telp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="No Telp" name="notelp">
    </div>
</div>
<div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jabatan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Jabatan" name="jabatan">
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
$ambil=mysqli_query($koneksi,"SELECT * FROM petugas WHERE id='$_GET[kode]'");
$data=mysqli_fetch_array($ambil);
?>
<h1>Edit Data Petugas Kereta Api</h1>
<form class="form-horizontal" role="form" action="aksi_petugas.php?proses=ubah&kode=<?= $data['id']?>" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="nama">
    </div>
  </div>
   <div class="row mt-2">
      <div class="col-md-2">
          Jenis Kelamin
      </div>
      <div class="col-md-5">
        <select name="jekel" id="level">
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan" >Perempuan</option>
        </select>
      </div>
  </div>
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">No Telp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="No Telp" name="notelp">
    </div>
</div>
<div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Alamat" name="alamat">
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