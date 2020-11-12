<?php  
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$AtasanSatu = $_POST['AtasanSatu'];
	$AtasanDua = $_POST['AtasanDua'];
	$level = $_POST['level'];	
	$query = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', AtasanSatu='$AtasanSatu', AtasanDua='$AtasanDua', level='$level' WHERE id_user ='$id' ");
	if ($query) {
		echo "<script>alert('Data Berhasil Disimpan');location='index.php?p=myProfile&id=$id';</script>";			
	} else {
		echo 'error' . mysqli_error($koneksi);
	}
}
?>