<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Reservasi Kereta Api</h1>

<table class="table table-condensed" id="tabelreservasi">
	<thead class="thead-dark">
  <tr>
		<th>No</th>
		<th>Kode Reservasi</th>
		<th>Nama Kereta</th>
    <th>Nama Pelanggan</th>
    <th>Email</th>
    <th>Tanggal Berangkat</th>
    <th>Jumlah</th>
    <th>Total Bayar</th>
    <th>Status</th>
    <th>Aksi</th>
	</tr>
  </thead>
  
	<?php
	include ('koneksi.php');//koneksi ke mysql
	$data=mysqli_query($koneksi,"SELECT * from pembelian,kereta WHERE pembelian.id_kereta=kereta.id");
	$no=1;
	while ($row=mysqli_fetch_array($data)){
	?>
  <tbody>
	<tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['faktur'] ?></td>
    <td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['nama_pelanggan'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['tanggalberangkat'] ?></td>
    <td><?php echo $row['jumlah'] ?></td>
    <td><?php echo $row['totalbayar'] ?></td>
    <td><?php echo $row['status'] ?></td>
    <td>
      <a href="aksi_pembelian.php?proses=check&kode=<?php echo $row['faktur'] ?>" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Check</a>    
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
      <input type="text" class="form-control"  placeholder="Nama" name="nama" value="<?=$data['id']?>">
    </div>
  </div>
  
  <div class="form-group">
    <label for="jurusan" class="col-sm-2 control-label">Tanggal Berangkat</label>
    <div class="col-sm-10">
      <input type="date" class="form-control"  placeholder="Nama" name="tanggalberangkat" >
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