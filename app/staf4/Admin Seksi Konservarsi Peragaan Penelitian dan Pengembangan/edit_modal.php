<?php  
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])){
	$NIP = $_POST['NIP'];
	$id = $_POST['id'];
	$komentar = $_POST['komentar'];
	$query = mysqli_query($koneksi, "UPDATE permintaan SET status=2, komentar ='$komentar' WHERE id_permintaan='$id' ");
	if($query) {
		header("location:index.php?p=datapesanan2Tunggu&pesan=berhasilditolak");
	} else {
		echo 'gagal';
	}
}
?>