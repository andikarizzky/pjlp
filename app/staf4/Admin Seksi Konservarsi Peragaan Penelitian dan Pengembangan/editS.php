<?php
include('../../../fungsi/koneksi.php');
$id=$_GET['id'];
$NIP=$_POST['NIP'];
$komentar=$_POST['komentar'];
$query = mysqli_query($koneksi, "UPDATE permintaan SET status=2, komentar ='$komentar' WHERE id_permintaan='$id' ");
if($query) {
	header("location:index.php?p=detil&NIP=$NIP&pesan=berhasilditolak");
} else {
	echo 'gagal';
}
?>