<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm', array(216, 330));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(300,7,'DAFTAR KERETA PT.KAI',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(300,7,'Politeknik Negeri Padang',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(50,6,'NAMA KERETA',1,0);
$pdf->Cell(43,6,'TANGGAL BERANGKAT',1,0);
$pdf->Cell(40,6,'TANGGAL TIBA',1,0);
$pdf->Cell(40,6,'Waktu Berangkat',1,0);
$pdf->Cell(40,6,'Waktu Kedatangan',1,0);
$pdf->Cell(30,6,'DARI',1,0);
$pdf->Cell(30,6,'KE',1,0);
$pdf->Cell(30,6,'KELAS',1,1);


$pdf->SetFont('Arial','',10);
$no=1;
$koneksi=mysqli_connect("localhost","root","","keretaapi"); 
$data = mysqli_query($koneksi, "SELECT kereta.*,kereta.id as id,kota1.namakota as dari1, kota2.namakota as ke1,kelas.id as idkelas,kelas.harga as harga,kelas.namakelas as nama_kelas 
                 FROM kereta,kelas,kota as kota1, kota as kota2
                where kereta.id_kelas=kelas.id and kereta.dari=kota1.id  and kereta.ke=kota2.id");
while ($row = mysqli_fetch_array($data)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(50,6,$row['nama'],1,0);
    $pdf->Cell(43,6,$row['tanggalberangkat'],1,0);
	$pdf->Cell(40,6,$row['tanggaltiba'],1,0);
	$pdf->Cell(40,6,$row['jamberangkat'],1,0);
	$pdf->Cell(40,6,$row['jamtiba'],1,0);
	$pdf->Cell(30,6,$row['dari1'],1,0);
	$pdf->Cell(30,6,$row['ke1'],1,0);
	$pdf->Cell(30,6,$row['nama_kelas'],1,1);


}
$no++;
$pdf->Output();
?>