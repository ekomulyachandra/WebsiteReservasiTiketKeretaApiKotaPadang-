<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'Kode Reservasi',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Kereta Api Politeknik Negeri Padang',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(190,7,'Kode Reservasi',0,1,'C');



$pdf->SetFont('Arial','',10);
$no=1;
$pdf->Cell(55,6,'',0,0);
$koneksi=mysqli_connect("localhost","root","","keretaapi") or die(mysqli_error()); 
$faktur ="".$_GET['kode'];
$data1 = mysqli_query($koneksi, "select * from pembelian where faktur =$faktur");
while ($roww = mysqli_fetch_array($data1)){
    $pdf->Cell(50,6,$roww['faktur'],1,0);
}

$pdf->Output();
?>