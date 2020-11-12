<?php  
include "../../../fungsi/koneksi.php";
if (isset($_GET['id']) && isset($_GET['tgl']) && isset($_GET['NIP']) && isset($_GET['Pegawai'])) {
	$id = $_GET['id'];
	$tgl = $_GET['tgl'];
	$NIP = $_GET['NIP'];
	$Pegawai = $_GET['Pegawai'];	
	$query = mysqli_query($koneksi, "UPDATE permintaan SET status=1 WHERE id_permintaan='$id' ");
	if($query) {
		header("location:index.php?p=detil3Tunggu&tgl=$tgl&NIP=$NIP&Pegawai=$Pegawai");
	} else {
		echo "error : " . mysqli_error($koneksi);
	}
}
?>