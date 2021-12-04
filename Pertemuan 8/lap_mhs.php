<?php
    // memanggil library FPDF
    require('fpdf/fpdf.php');
    // intance object dan memberikan pengaturan halaman PDF
    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    // mencetak string
    $pdf->Cell(190,7,'PROGRAM STUDI TEKNIK INFORMATIKA',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR MAHASISWA MAKUL PEMROGRAMAN WEB DINAMIS',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'NIM',1,0,'C');
    $pdf->Cell(50,6,'NAMA MAHASISWA',1,0,'C');
    $pdf->Cell(15,6,'JKEL',1,0,'C');
    $pdf->Cell(35,6,'ALAMAT',1,0,'C');
    $pdf->Cell(30,6,'TANGGAL LHR',1,1,'C');
    $pdf->SetFont('Arial','',10,'C');

    include 'koneksi.php';
    $mahasiswa = mysqli_query($con, "select * from mahasiswa");

    while ($row = mysqli_fetch_array($mahasiswa)){
        $pdf->Cell(20,6,$row['Nim'],1,0,'C');
        $pdf->Cell(50,6,$row['Nama'],1,0);
        $pdf->Cell(15,6,$row['Jkel'],1,0);
        $pdf->Cell(35,6,$row['Alamat'],1,0);
        $pdf->Cell(30,6,$row['Tgl_Lahr'],1,1,'C');
    }
    $pdf->Output();
?>