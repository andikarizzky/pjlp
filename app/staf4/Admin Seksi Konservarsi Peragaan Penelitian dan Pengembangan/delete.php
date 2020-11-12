<?php
include('../../../fungsi/koneksi.php');
$id=$_GET['id'];
$query=mysqli_query($koneksi,"delete from user where id_user='$id'");
if($query) {
	header('location:index.php?p=userAdmin&pesan=berhasilhapus');
} else {
	echo 'gagal';
}
?>