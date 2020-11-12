<?php  
include "../../../fungsi/koneksi.php";
if(isset($_POST['updatePW'])) {
	$id = $_POST['id'];
	$password = md5($_POST['password']);
	$query = mysqli_query($koneksi, "UPDATE user SET password='$password' WHERE id_user ='$id' ");
	if ($query) {
		header("location:index.php?p=myProfile&id=$id");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}
}
?>