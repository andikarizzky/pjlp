<?php
include('../../../fungsi/koneksi.php');
$id=$_GET['id'];
$query=mysqli_query($koneksi,"delete from permintaan where id_permintaan='$id'");
if($query) {
	header('location:index.php?p=datapesanan&pesan=berhasilhapus');
} else {
	echo 'gagal';
}
?>