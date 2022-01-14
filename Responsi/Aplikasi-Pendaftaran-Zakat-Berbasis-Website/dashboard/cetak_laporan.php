<?php
    // memanggil library FPDF
    require('../config/pdf.php');
    // intance object dan memberikan pengaturan halaman PDF
    $result = getApiData("JSON");
    $pdf = new pdf();
    $pdf->SetCellMargin(2);
    // membuat halaman baru
    $pdf->AddPage('L', 'A4');
    $pdf->judulKop('LAPORAN REKAP ZAKAT FITRAH MASJID AL-MUHAJIRIN',
                'RAMADHAN 1444 H TAHUN 2022','Perumahan Puri Melati, SendangTirto, Berbah, Sleman, Yogyakarta');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetX(30);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(10,10,'No.',1,0,'C');
    $pdf->Cell(30,10,'Tanggal Zakat',1,0,'C');
    $pdf->Cell(50,10,'Nama Penzakat',1,0,'C');
    $pdf->Cell(35,10,'Jumlah Anggota',1,0,'C');
    $pdf->Cell(30,10,'Jenis Zakat',1,0,'C');
    $pdf->Cell(50,10,'Metode Pembayaran',1,0,'C');
    $pdf->Cell(30,10,'Jumlah Bayar',1,1,'C');
    $pdf->SetFont('Times','',10,'C');
    $i = 0;
    foreach ($result['Penzakat'] as $row) {
        $pdf->SetX(30);
        $pdf->Cell(10,10, ++$i .".",1,0,'C');
        $pdf->Cell(30,10, date("d/m/Y", strtotime($row['Tanggal'])),1,0,'C');
        $pdf->Cell(50,10, $row['Nama_Lngkp'],1,0,'L');
        $pdf->Cell(35,10, $row['Jum_Jiwa']." Orang" ,1,0,'C');
        $pdf->Cell(30,10, $row['Nama_Zakat'],1,0,'C');
        $pdf->Cell(50,10, $row['Jenis_Metode'],1,0,'C');
        $pdf->Cell(30,10, change($row['Jum_Bayar']),1,1,'C');
    }
    $pdf->SetFont('Times','B',10,'C');
    $pdf->SetX(30);
    $pdf->Cell(235, 10, "Total Zakat:", 0, 1, 'L');
    $pdf->SetFont('Times','',10,'C');
    $pdf->SetX(35);
    $pdf->Cell(235, 5, "1. Zakat Beras ", 0, 0, 'L');
    $pdf->SetX(35);
    $pdf->Cell(50, 5, change(CheckNull($result['Statistik'][0]['ZB'])), 0, 1, 'R');
    $pdf->SetX(35);
    $pdf->Cell(235, 5, "2. Zakat Uang", 0, 0, 'L');
    $pdf->SetX(35);
    $pdf->Cell(50, 5, change(CheckNull($result['Statistik'][0]['ZU'])), 0, 1, 'R');
    $pdf->Output();
?>