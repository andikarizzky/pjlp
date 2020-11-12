<?php  
session_start();	
include "../../../fungsi/koneksi.php";
if (isset($_GET['id']) && isset($_GET['tgl']) && isset($_GET['NIP']) && isset($_GET['Pegawai'])) {
	$id = $_GET['id'];
	$tgl = $_GET['tgl'];
	$NIP = $_GET['NIP'];
	$Pegawai = $_GET['Pegawai'];	
	$query = mysqli_query($koneksi, "UPDATE permintaan SET status=1, komentar=' ' WHERE id_permintaan='$id' ");
	if($query) {
		$_SESSION['pesan2'] = '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="bottom-center" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
		</div>';
		header("location:index.php?p=datapesanan2Tolak");
	} else {
		echo "error : " . mysqli_error($koneksi);
	}
}
?>