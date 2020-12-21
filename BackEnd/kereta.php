<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Kereta Api</h1>

<p><a href="?p=kereta&aksi=entri" class="btn btn-primary"> + Tambah data</a></p>
<p><a href="laporankereta.php" class="btn btn-primary"> + Cetak data</a></p>
<table class="table table-condensed" id="tabelkereta">
	<thead class="thead-dark">
  <tr>
		<th>No</th>
		<th>Nama</th>
		<th>Tanggal Berangkat</th>
    <th>Tanggal Datang</th>
    <th>Jam keberangkatan</th>
    <th>Jam kedatangan</th>
    <th>Dari</th>
    <th>Ke</th>
    <th>Kelas</th>
    <th>Stok</th>
		<th>Aksi</th>
	</tr>
  </thead>
  
	<?php
	include ('koneksi.php');//koneksi ke mysql
	$data=mysqli_query($koneksi,"SELECT kereta.*, kota1.namakota as dari1, kota2.namakota as ke1, namakelas FROM kereta,kota as kota1, kota as kota2,kelas WHERE kereta.id_kelas=kelas.id and kereta.dari=kota1.id  and kereta.ke=kota2.id ");
	$no=1;
	while ($row=mysqli_fetch_array($data)){
	?>
  <tbody>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['tanggalberangkat'] ?></td>
    <td><?php echo $row['tanggaltiba'] ?></td>
    <td><?php echo $row['jamberangkat'] ?></td>
    <td><?php echo $row['jamtiba'] ?></td>
    <td><?php echo $row['dari1'] ?></td>
    <td><?php echo $row['ke1'] ?></td>
    <td><?php echo $row['namakelas'] ?></td>
    <td><?php echo $row['stok'] ?></td>
		<td><a href="aksi_kereta.php?proses=hapus&kode=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</a>
		<a href="?p=kereta&aksi=edit&kode=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
    
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
<h1>Masukkan Data Kereta Api</h1>
<form class="form-horizontal" role="form" action="aksi_kereta.php?proses=tambah" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="nama">
    </div>
  </div>
  
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Tanggal Berangkat</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  placeholder="Nama" name="tanggalberangkat">
    </div>
  </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Tanggal Tiba</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  placeholder="Nama" name="tanggaltiba">
    </div>
  </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jam Berangkat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="jamberangkat">
    </div>
  </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jam Tiba</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="jamtiba">
    </div>
  </div>

  <div class="col">
      <label for="jurusan" class="col-sm-3 control-label">Dari</label>
      <div class=" col">
         <select class="form-control" id="dari" name="dari">
         <?php 
          $koneksi=mysqli_connect("localhost","root","","keretaapi"); //koneksi ke mysql
          $data=mysqli_query($koneksi,"SELECT * FROM kota");
          while ($row=mysqli_fetch_array($data)) {
            echo "<option value=$row[id]>$row[namakota]</option>";
          }
          ?>
          </select>
      </div>
    </div>

  <div class="col">
      <label for="jurusan" class="col-sm-3 control-label">Ke</label>
      <div class=" col">
       <select class="form-control" id="ke" name="ke">
         <?php 
          $koneksi=mysqli_connect("localhost","root","","keretaapi"); //koneksi ke mysql
          $data=mysqli_query($koneksi,"SELECT * FROM kota");
          while ($row=mysqli_fetch_array($data)) {
            echo "<option value=$row[id]>$row[namakota]</option>";
          }
          ?>
          </select>
      </div>
    </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Kelas Kereta</label>
    <div class="col-sm-10">
      <select class="form-control" id="id_jenis" name="id_kelas">
    <?php 
    $koneksi=mysqli_connect("localhost","root","","keretaapi"); //koneksi ke mysql
    $data=mysqli_query($koneksi,"SELECT * FROM kelas");
    while ($row=mysqli_fetch_array($data)) {
      echo "<option value=$row[id]>$row[namakelas]</option>";
    }
    ?>
    </select>
    </div>
  </div>
 
 <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Stok Penumpang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Stok Penumpang" name="stok">
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
$ambil=mysqli_query($koneksi,"SELECT * FROM kereta WHERE id='$_GET[kode]'");
$data=mysqli_fetch_array($ambil);
?>
<h1>Edit Data Petugas Kereta Api</h1>
<form class="form-horizontal" role="form" action="aksi_kereta.php?proses=ubah&kode=<?= $data['id']?>" method="post">
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="nama" value="<?=$data['nama']?>">
    </div>
  </div>
  
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Tanggal Berangkat</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  placeholder="Nama" name="tanggalberangkat" value="<?= $data['tanggalberangkat']?>" >
    </div>
  </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Tanggal Tiba</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  placeholder="Nama" name="tanggaltiba" value="<?= $data['tanggaltiba']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jam Berangkat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="jamberangkat" value="<?=$data['jamberangkat']?>">
    </div>
  </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Jam Tiba</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Nama" name="jamtiba" value="<?=$data['jamtiba']?>">
    </div>
  </div>

  <div class="col">
      <label for="jurusan" class="col-sm-3 control-label">Dari</label>
      <div class=" col">
         <select class="form-control" id="dari" name="dari">
         <?php 
          $koneksi=mysqli_connect("localhost","root","","keretaapi"); //koneksi ke mysql
          $data=mysqli_query($koneksi,"SELECT * FROM kota");
          while ($row=mysqli_fetch_array($data)) {
            echo "<option value=$row[id]>$row[namakota]</option>";
          }
          ?>
          </select>
      </div>
    </div>
  
  <div class="col">
      <label for="jurusan" class="col-sm-3 control-label">Ke</label>
      <div class=" col">
       <select class="form-control" id="ke" name="ke">
         <?php 
          $koneksi=mysqli_connect("localhost","root","","keretaapi"); //koneksi ke mysql
          $data2=mysqli_query($koneksi,"SELECT * FROM kota");
          while ($row=mysqli_fetch_array($data2)) {
            echo "<option value=$row[id]>$row[namakota]</option>";
          }
          ?>
          </select>
      </div>
    </div>

  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Kelas Kereta</label>
    <div class="col-sm-10">
      <select class="form-control" id="id_jenis" name="id_kelas">
    <?php 
    $koneksi=mysqli_connect("localhost","root","","keretaapi"); //koneksi ke mysql
    $data1=mysqli_query($koneksi,"SELECT * FROM kelas");
    while ($row=mysqli_fetch_array($data1)) {
      echo "<option value=$row[id]>$row[namakelas]</option>";
    }
    ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Stok Penumpang</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="Stok Penumpang" name="stok" >
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