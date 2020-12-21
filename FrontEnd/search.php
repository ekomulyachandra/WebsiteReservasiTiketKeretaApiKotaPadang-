
    
    
<?php
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch($aksi) {
case 'list' :
?>
<h1>Kereta Api Yang Tersedia</h1>  
	
   <div class="card border-secondary mb-3" style="max-width: 80rem;" >
    <?php
  include ('koneksi.php');//koneksi ke mysql
  $data1=mysqli_query($koneksi,"SELECT kereta.*,kereta.id as id,kota1.namakota as dari1, kota2.namakota as ke1,kelas.id as idkelas,kelas.harga as harga ,kelas.namakelas as nama_kelas
    FROM kereta,kelas,kota as kota1, kota as kota2
    where kereta.tanggalberangkat='$_GET[tgl]' and kereta.dari='$_GET[dari]' and kereta.ke='$_GET[ke]' and kereta.id_kelas=kelas.id and kereta.dari=kota1.id  and kereta.ke=kota2.id");
  $no=1;
  while ($row=mysqli_fetch_array($data1)){
  ?>
      <div class="card-header"><?php echo $row['dari1'] ?>-<?php echo $row['ke1'] ?></div>
      <div class="card-body text-secondary">
      <h5 class="card-title"><?php echo $row['jamberangkat'] ?> s/d <?php echo $row['jamtiba'] ?></h5>
      <p class="card-text"><?php echo $row['harga'] ?>/ticket</p>
      <a href="login.php?kode=<?php echo $row['id'] ?>&harga=<?php echo $row['harga'] ?>&tgl=<?php echo $row['tanggalberangkat'] ?>" class="btn btn-primary" id='book' >Book</a>
  </div>
	<?php
	}
	?>
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
case 'pemesanan':

include ('koneksi.php');
$ambil=mysqli_query($koneksi,"SELECT kereta.*,kereta.id as id,kota1.namakota as dari1, kota2.namakota as ke1,kelas.id as idkelas,kelas.harga as harga 
    FROM kereta,kelas,kota as kota1, kota as kota2
    where kereta.id='$_GET[kode]'  and kereta.id_kelas=kelas.id and kereta.dari=kota1.id  and kereta.ke=kota2.id");
$data=mysqli_fetch_array($ambil);
?>
 <section class="ftco-section-parallax">
      <div style="background-color: rgb(235, 168, 52);">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2 style="color: black;">Pemesanan</h2>
                  <a style="color: white;">Kereta Api     : <?php echo $data['nama']?> </a><br>
                  <a style="color: white;"><?php echo $data['dari1']?>-<?php echo $data['ke1']?></a><br>
                  <a style="color: white;">Waktu Keberangkatan  : <?php echo $data['jamberangkat']?> </a><br>
                  <a style="color: white;">Waktu Kedatangan : <?php echo $data['jamtiba']?> </a><br>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <form class="form-horizontal" role="form" action="aksi_pemesanan.php?proses=tambah" method="post">
            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                <h4 class="mb-5">&amp; Booking</h4>
                <div class="fields">
                  <div class="row">
                    <div class="col-md-12">
                      <?php
                      include "nofaktur.php"
                      ?>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Kode Booking" name="faktur" readonly value="<?= $faktur?>" style="display: none;">
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="ID Kereta" name="id_kereta" value="<?=$_GET['kode']?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="nama_pelanggan" value="<?php echo $_SESSION['nama'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $_SESSION['email'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Date from" name="tgl_berangkat" value="<?= $_GET['tgl'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Harga" value="<?= $_GET['harga'] ?>" readonly id="harga" onchange="subtotal()" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="select-wrap one-third">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select id="jumlah" name="jumlah" class="form-control" placeholder="Guest" onchange="subtotal()">
                            <option value="0">Guest</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            <option value="4">6</option>
                            <option value="4">7</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control " placeholder="Total Bayar" id="totalbayar" onchange="subtotal()" name="totalbayar">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="submit" value="Book" name="submit" class="btn btn-primary py-3">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="logout.php" class="btn btn-primary py-3">Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
 <div class="form-group">
   
 </div>

</form>
<?php
break;
}
?>



<script type="text/javascript">
    $('#beli').on('click',function(){
    var id = $('#beli').data('id');
    window.location.href="http://localhost/keretaapi/frontend/?p=search&aksi=list&tgl="+id;
  });


  function subtotal() {
    var hargajual = parseInt(document.getElementById('harga').value);
    var jumlah = parseInt(document.getElementById('jumlah').value);
    var subtotal = hargajual*jumlah;
    document.getElementById('totalbayar').value = subtotal;
    }
</script>
