<?php  
include "../../../fungsi/koneksi.php";
if(isset($_POST['updateFOTO'])) {
	$id = $_POST['id'];
	$uploadImg = $_FILES['uploadImg']['name'];
// ambil data file
	$namaSementara = $_FILES['uploadImg']['tmp_name'];
	$penempatan = $_POST['penempatan'];
// tentukan lokasi file akan dipindahkan
	$dirUpload = "../../staf4/foto/";
// pindahkan file
	$terupload = move_uploaded_file($namaSementara, $dirUpload.$uploadImg); 
	$query = mysqli_query($koneksi, "UPDATE user SET foto='$uploadImg' WHERE id_user ='$id' ");
	if ($query) {
		header("location:index.php?p=myProfile&id=$id");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}
}
?>