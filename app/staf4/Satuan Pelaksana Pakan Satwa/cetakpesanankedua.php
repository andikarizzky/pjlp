 <?php
 require('../../../assets/pdf/fpdf.php');

 include "../../../fungsi/koneksi.php";
 include "../../../fungsi/fungsi.php";

 {
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}



//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//Image( file name , x position , y position , width [optional] , height [optional] )


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);



//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'TUTORIALSWB | JASA PEMBUATAN WEBSITE',0,0);
$pdf->Cell(59 ,5,'CONTOH INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Jl. Hj Ridi, No.35',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(130 ,5,'Jakarta Selatan Indonesia',0,0);


$query=mysqli_query($koneksi,"select * from permintaan where status=0 and tglManual='2019-08-02' ");
if (mysqli_num_rows($query)){                
	$row = mysqli_fetch_assoc($query);
}

$pdf->Cell(25 ,5,'Tanggal  :',0,0);
$pdf->Cell(34 ,5,$row['Keterangan'],0,1);//end of line

$pdf->Cell(130 ,5,'Nomor Telp (+62) 81524737292',0,0);
$pdf->Cell(25 ,5,'Nomor    :',0,0);
$pdf->Cell(34 ,5,$row['Keterangan'],0,1);//end of line

$pdf->Cell(130 ,5,'Fax (##) #######',0,0);
$pdf->Cell(25 ,5,'Teknisi   :',0,0);
$pdf->Cell(34 ,5,$row['Keterangan'],0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100 ,5,'DETAILS INVOICE CHECK',0,1);//end of line
$pdf->Cell(100 ,5,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5, $row['Keterangan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Lokasi',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['Keterangan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Nama Teknisi',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['Keterangan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Penanggung Jawab',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['Keterangan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Nama Fasilitas',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['Keterangan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Update Check',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['Keterangan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Status',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(90 ,5,$row['Keterangan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line


$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Check Details',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->MultiCell(120 ,5,$row['Keterangan'],0,1);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(182,4,"Di Cetak Pada : ".date("D-d/m/Y"),0,0,'R');
//set font to arial, bold, 14pt

$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);

$pdf->Cell(130 ,4,'PEMILIK RUMAH',0,0);
$pdf->Cell(59 ,5,'APARAT KEAMANAN',0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(289 ,20,'',0,1);//end of line

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',10);




//$pdf->Cell(59 ,5,'Approve',0,1);//end of line
//$pdf->Cell(300 ,5,'Approve',0,1);//end of line




$pdf->Output("Laporan Check.pdf","I");
?>