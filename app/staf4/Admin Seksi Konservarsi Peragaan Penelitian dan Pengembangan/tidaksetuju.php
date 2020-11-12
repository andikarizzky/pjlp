<?php  
include "../../../fungsi/koneksi.php";
if (isset($_GET['id']) && isset($_GET['NIP'])) {
	$id = $_GET['id'];
	$NIP = $_GET['NIP'];
	$query = mysqli_query($koneksi, "UPDATE permintaan SET status = '2' WHERE id_permintaan='$id' ");
	if($query) {
		header("location:index.php?p=detil&NIP=$NIP&pesan=berhasilditolak");
	} else {
		echo "error : " . mysqli_error($koneksi);
	}
}
?>