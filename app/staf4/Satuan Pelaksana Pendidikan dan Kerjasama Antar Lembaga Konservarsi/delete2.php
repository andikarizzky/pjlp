<?php
include('../../../fungsi/koneksi.php');
$id=$_GET['id'];
$query=mysqli_query($koneksi,"delete from permintaan WHERE id_permintaan='$id'");
if($query) {
	header('location:index.php?p=formpesan');
} else {
	echo 'gagal';
}
?>