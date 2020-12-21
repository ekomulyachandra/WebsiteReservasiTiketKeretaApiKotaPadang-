<section class="content">
  <div class="box">
    <div class="box-body">
      
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Data Kereta Api</h1>
<table class="table table-condensed" id="tabeljenisbarang">
	<thead>
  <tr>
		<th>No</th>
    <th>Nama</th>
    <th>Tanggal Berangkat</th>
    <th>Tanggal Datang</th>
    <th>Jam Berangkat</th>
    <th>Jam Datang</th>
    <th>Dari</th>
    <th>Ke</th>
    <th>Aksi</th>
	</tr>
  </thead>
  
	<?php
	include ('koneksi.php');//koneksi ke mysql
	$data1=mysqli_query($koneksi,"SELECT kereta.*,kereta.id as id,kota1.namakota as dari1, kota2.namakota as ke1,kelas.id as idkelas,kelas.harga as harga 
    FROM kereta,kelas,kota as kota1, kota as kota2
    where kereta.tanggalberangkat='$_GET[tgl]' and kereta.dari='$_GET[dari]' and kereta.ke='$_GET[ke]' and kereta.id_kelas=kelas.id and kereta.dari=kota1.id  and kereta.ke=kota2.id");
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
    <td><?php echo $row['dari1'] ?></td>
    <td><?php echo $row['ke1'] ?></td>
		<td><button type="button" name="edit" id="beli" data-id="<?php echo $row['id']?>" data-harga="<?php echo $row['harga']?>" class="btn btn-danger"  data-toggle="modal" data-target="#modal-success" 
      >Beli</button>
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

<div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <form class="form-horizontal" role="form" action="aksi_pembelian.php?proses=tambah" method="post">
              <div class="modal-header">
                 <h4 class="modal-title">Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <div class="modal-body">
                  <div class="form-group">
                      <label for="jurusan" class="col-sm-8 control-label" >No Faktur</label>
                      <?php
                      include "nofaktur.php"
                      ?>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" id="faktur"  name="faktur" data
                         value="<?= $faktur?>" readonly >
                      </div>
            </div>
            <div class="form-group">
              <label for="jurusan" class="col-sm-8 control-label">Id Kereta</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="id_kereta"  name="id_kereta" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="jurusan" class="col-sm-8 control-label">Harga</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="harga"  name="harga" value="" readonly >
              </div>
            </div>
            <div class="form-group">
              <label for="jurusan" class="col-sm-8 control-label">Jumlah</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="jumlah"  name="jumlah" onchange="subtotal()" >
              </div>
            </div>
            <div class="form-group">
              <label for="jurusan" class="col-sm-8 control-label">Total Bayar</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="totalbayar"  name="totalbayar" onchange="subtotal()" >
              </div>
            </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline" name="submit">Save changes</button>
              </div>
            </div>
          </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>

<script type="text/javascript">
    
    function subtotal() {
    var hargajual = parseInt(document.getElementById('harga').value);
    var jumlah = parseInt(document.getElementById('jumlah').value);
    var subtotal = hargajual*jumlah;
    document.getElementById('totalbayar').value = subtotal;
    }
    
    document.addEventListener("DOMContentLoaded",function(event){
      document.querySelector('#beli').addEventListener("click",test);
      function test(){
      var id =$(this).data('id');
      document.getElementById('id_kereta').value = id;
      console.log(id);
      var harga =$(this).data('harga');
      console.log(harga);
      document.getElementById('harga').value = harga;

    }
    });
 

        
</script>
