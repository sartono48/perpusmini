<?php
// memanggil library FPDF
require('../library/fpdf.php');
include 'koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'LAPORAN DATA PEMINJAMAN/PENGEMBALIAN',0,0,'C');

$pdf->Cell(10,7,'',0,1);
$pdf->Cell(200,10,'PERPUSTAKAAN',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(30,7,'Nama Peminjam' ,1,0,'C');
$pdf->Cell(20,7,'Kelas',1,0,'C');
$pdf->Cell(60,7,'Judul Buku',1,0,'C');
$pdf->Cell(30,7,'Tgl Pinjam',1,0,'C');
$pdf->Cell(30,7,'Tgl Kembali',1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$result = $conn->query("SELECT tb_buku.judul, tb_anggota.nama, tb_anggota.kelas, tgl_pinjam, tgl_kembali, id_pinjam FROM tb_pinjam, tb_buku, tb_anggota 
                        WHERE tb_pinjam.id_buku = tb_buku.id_buku AND tb_pinjam.id_anggota = tb_anggota.id_anggota");

while($d = mysqli_fetch_array($result)){
  $pdf->Cell(10,7, $no++,1,0,'C');
  $pdf->Cell(30,7,$d['nama'] ,1,0);
  $pdf->Cell(20,7,$d['kelas'] ,1,0);
  $pdf->Cell(60,7,$d['judul'] ,1,0);
  $pdf->Cell(30,7,$d['tgl_pinjam'] ,1,0);
  $pdf->Cell(30,7,$d['tgl_kembali'] ,1,1);
}

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

$d = tgl_indo(date('Y-m-d'));

$pdf->Cell(10,7,'',0,1);
$pdf->Cell(300,10,'Kretek, ' .$d ,0,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(300,10,'Kepala Perpustakaan, ',0,0,'C');
$pdf->Cell(10,15,'',0,1);
$pdf->Cell(300,10,'Nama Kepala Perpustakaan',0,0,'C');

$pdf->Output();
 
?>