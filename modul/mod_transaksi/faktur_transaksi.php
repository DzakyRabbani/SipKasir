<?php
session_start();

include "../../fungsi/koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include"../../fungsi/pdf/fpdf.php";
include "../../fungsi/format_number.php";

$query = mysqli_query($koneksi,"select * from d_transaksi
								WHERE id_transaksi = '$_GET[id]'")or die(mysqli_error());
$num = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if ($num == 0) {
	echo "<script language='javascript'>
				alert('Data penjualan tidak ditemukan atau masih kosong');
				window.location='../../index.php?modul=penjualan';
	</script>";
}

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A5');

$pdf->SetFont('Courier', 'I', 7);
$pdf->setXY(140,1);

$pdf->Ln();
$pdf->SetFont('Courier', '', 10);
$pdf->setX(10);
$pdf->Cell(0, 4, 'DZAKY KASIR ', '', 0, 'L');
$pdf->setX(140);
$pdf->Cell(0, 4, 'Tanggal ', '', 0, 'L');
$pdf->setX(160);
$pdf->Cell(0, 4, ': '.format_sqltoindo(date('Y-m-d')), '', 1, 'L');
$pdf->Cell(0, 4, 'Jl. Ciomas No. 69, Bogor', '', 1, 'L');$pdf->setX(150);
$pdf->setX(10);
$pdf->Cell(0, 4, 'Telp. ', '', 1, 'L');
$pdf->setX(10);
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(0, 4, 'FAKTUR PENJUALAN', '', 1, 'C');
$pdf->Ln();

$pdf->SetFont('Courier', '', 10);

$w = array(6, 50, 50, 50, 50 ,50); //163
//=========0, 1,  2,  3,  4,  5,  6, 7=====//
$pdf->setX(5);
$pdf->SetFont('courier', 'B', 8);
$pdf->Cell($w[1], 6, 'ID USER', 'TB', 0, 'C');
$pdf->Cell($w[2], 6, 'ID ORDER', 'TB', 0, 'C');
$pdf->Cell($w[3], 6, 'NAMA USER', 'TB', 0, 'C');
$pdf->Cell($w[4], 6, 'TANGGAL', 'TB', 0, 'C');
$pdf->Cell($w[5], 6, 'TOTAL BAYAR', 'TB', 0, 'C');
$pdf->Ln(7);

$pdf->setX(5);
$pdf->SetFont('courier', '', 8);
$pdf->Cell($w[1], 6, $data['id_user'], 'TB', 0, 'C');
$pdf->Cell($w[2], 6, $data['id_order'], 'TB', 0, 'C');
$pdf->Cell($w[3], 6, $data['nama_user'], 'TB', 0, 'C');
$pdf->Cell($w[4], 6, format_date($data['tanggal']), 'TB', 0, 'C');
$pdf->Cell($w[5], 6, format_money($data['total_bayar']), 'TB', 0, 'C');
$pdf->Ln();

$pdf->setX(5);
$pdf->SetFont('courier', 'B', 9);
$pdf->Cell($w[1], 6, '', 'T', 0, 'C');
$pdf->Cell($w[2], 6, '', 'T', 0, 'C');
$pdf->Cell($w[3], 6, 'Jumlah', 'T', 0, 'C');
$pdf->Cell($w[4], 6, format_money($data['total_bayar']), 'T', 0, 'C');
$pdf->Ln();

//footer selalu sama
$pdf->SetFont('courier', '', 8);
$pdf->Ln();
$pdf->setX(20);
$pdf->Cell(163 / 2, 6, 'MENGETAHUI,', 0, 0, 'C');
$pdf->Cell(163 / 2, 6, 'PENERIMA,', 0, 0, 'C');

$pdf->SetFont('courier', '', 8);
$pdf->Ln(20);
$pdf->setX(20);
$pdf->Cell(163 / 2, 6, 'DZAKY RABBANI', 0, 0, 'C', 0);

$pdf->Ln(20);
$pdf->Cell(0, 6, 'Barang yang dibeli tidak dapat dikembalikan, kecuali ada perjanjian.', 0, 1, 'C', 0);
$pdf->Output();
?>