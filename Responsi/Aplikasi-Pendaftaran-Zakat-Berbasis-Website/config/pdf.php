<?php
include "../config/function.php";
include "../assets/fpdf/fpdf.php";
class pdf extends FPDF{
	function gambar_logo($image) {
		$this->Image($image, 10, 2, 30, 35);
	}

	function judulKop($text1, $text2, $text3) {
		$this->Cell(1);
		$this->SetFont('Times', 'B', '20');
		$this->Cell(0,7,$text1,0,1,'C');
		$this->Cell(1);
		$this->SetFont('Times', 'B', '14');
		$this->Cell(0,7,$text2,0,1,'C');
		$this->Cell(1);
		$this->SetFont('Times','I','12');
		$this->Cell(0,7,$text3,0,1,'C');
		$this->Cell(1);
	}

	function garis(){
		$this->SetLineWidth(1);
		$this->Line(10,36,200,36);
		$this->SetLineWidth(0);
		$this->Line(10,37,200,37);
		$this->Cell(10, 10);
	}
	function SetCellMargin($margin) {
		$this->cMargin = $margin;
	}
}