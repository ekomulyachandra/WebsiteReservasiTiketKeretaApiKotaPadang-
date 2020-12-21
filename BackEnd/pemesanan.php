<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>PEMESANAN</h1>
<br>
<br>
<form>
<div class="container">
  <div class="row">
   <div class="col">
      <label for="jurusan" class="col-sm-8 control-label">Tanggal</label>
      <div class=" col">
        <input type="date" class="form-control"  id="tgl_berangkat" placeholder="Tanggal Berangkat" name="tanggalberangkat">
      </div>
    </div>
  </div>
  <br>
  <br>
  <button id="btn-cari" type="button" class="form-control" align='center'>Cari</button>
  <br>
  <br>
</div>
</form>
<?php
break;
case 'entri':
?>
<h1>Data Tiket Kereta Api</h1>
<table class="table table-condensed">
  <thead>
  <tr>
    <?php 
    $tgl=isset($_GET['tgl'])?$_GET['tgl']:'';
    $dari=isset($_GET['dari'])?$_GET['dari']:'';
    $ke=isset($_GET['ke'])?$_GET['ke']:'';
    ?>
    <th>No</th>
    <th>Nama</th>
    <th><?php echo $tgl?></th>
    <th>Tanggal Datang</th>
    <th>Jam Berangkat</th>
    <th>Jam Datang</th>
    <th><?= $dari ?></th>
    <th><?= $ke?></th>
    <th>Kelas</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <?php
  include ('koneksi.php');//koneksi ke mysql
  if(isset($_POST['submit'])){
  $data1=mysqli_query($koneksi,"SELECT * FROM kereta WHERE tanggalberangkat like '$_GET[tgl]'");
  $no=1;
  while ($row=mysqli_fetch_array($data1)){
  ?>
  <tbody>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['nama'] ?></td>
    <td><?php echo $row['tanggalberangkat'] ?></td>
    <td><?php echo $row['tanggaltiba'] ?></td>
    <td><?php echo $row['jamberangkat'] ?></td>
    <td><?php echo $row['jamtiba'] ?></td>
    <td><?php echo $row['dari'] ?></td>
    <td><?php echo $row['ke'] ?></td>
    <td><a href="aksi_petugas.php?proses=hapus&kode=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</a>
    <a href="?p=petugas&aksi=edit&kode=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
    
    </td>
  </tr>
  <?php
  $no++;
  }
}
  ?>
  </tbody>
</table>


<?php
break;
case 'edit':
?>
<h1>Data Reservasi Tiket Kereta Api</h1>

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
  $data=mysqli_query($koneksi,"SELECT * from pembelian,kereta WHERE pembelian.id_kereta=kereta.id and status='belum dibayar' and tanggalberangkat like '$_GET[tgl]' order by tanggalberangkat desc");
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

<h1>Data Pembelian Kereta Api</h1>

<table class="table table-condensed" id="tabelpembelian">
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

  </tr>
  </thead>
  
  <?php
  include ('koneksi.php');//koneksi ke mysql
  $data=mysqli_query($koneksi,"SELECT * from pembelian,kereta WHERE pembelian.id_kereta=kereta.id and status='sudah dibayar' and tanggalberangkat like '$_GET[tgl]' order by tanggalberangkat");
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
  </tr>
  <?php
  $no++;
  }
  ?>
  </tbody>
</table>
<div class="form-group">
    <label for="jurusan" class="col-sm-8 control-label">Pendapatan</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="total_bayar"  name="total_bayar" readonly>
    </div>
  </div>
<?php
break;
}
?>
</div>
  </div>
  
</section>

<script type="text/javascript">
  $('#btn-cari').on('click',function(){
    var tgl = $('#tgl_berangkat').val();
    var dari = $('#dari').val();
    var ke = $('#ke').val();
    window.location.href="http://localhost/keretaapi/backend/index.php?p=reservasi&aksi=edit&tgl="+tgl;
  });
  var table = document.getElementById("tabelpembelian"),sumVal=0;
    for(var i = 1;i <table.rows.length;i++){
      sumVal = sumVal+parseInt(table.rows[i].cells[7].innerHTML);
    }
    document.getElementById('total_bayar').value = sumVal;

    $(document).ready(function(){
        $('#tabelreservasi').DataTable();
    });
</script>