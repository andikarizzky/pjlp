<?php  
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])){
	$NIP = $_POST['NIP'];
	$tgl_pemesanan = $_POST['tgl_permintaan'];
	$id = $_POST['id'];
	$Akses = $_POST['Akses'];
	$Keterangan = $_POST['Keterangan'];
	$query = mysqli_query($koneksi, "UPDATE permintaan SET Akses ='$Akses', Keterangan ='$Keterangan' WHERE id_permintaan='$id' ");
	if($query) {
		header("location:index.php?p=detil&NIP=$NIP&pesan=berhasildiedit");
	} else {
		echo 'gagal';
	}
}
?>