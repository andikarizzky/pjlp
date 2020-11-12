<?php  
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $AtasanSatu = $_POST['AtasanSatu'];
    $AtasanDua = $_POST['AtasanDua'];
    $NamaPegawai = $_POST['NamaPegawai'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $tmp = $_POST['tmp'];
    $tgl = $_POST['tgl']; 
    $Agama = $_POST['Agama'];
    $NoHp = $_POST['NoHp'];
    $Alamat = $_POST['Alamat'];
    $Email = $_POST['Email'];
    $NipAtasanSatu = $_POST['NipAtasanSatu'];
    $NipAtasanDua = $_POST['NipAtasanDua'];
    $penempatan = $_POST['penempatan'];
    $query = mysqli_query($koneksi, "UPDATE user SET AtasanSatu='$AtasanSatu', AtasanDua='$AtasanDua', jenisKelamin='$jenisKelamin', NamaPegawai='$NamaPegawai', tempat_lahir='$tmp', tanggal_lahir='$tgl', Agama='$Agama', NoHp='$NoHp', Alamat='$Alamat', Email='$Email', NipAtasanSatu='$NipAtasanSatu', NipAtasanDua='$NipAtasanDua', penempatan='$penempatan' WHERE id_user ='$id' ");
    if ($query) {
        header("location:index.php?p=myProfile&id=$id");
    } else {
        echo 'error' . mysqli_error($koneksi);
    }
}
?>