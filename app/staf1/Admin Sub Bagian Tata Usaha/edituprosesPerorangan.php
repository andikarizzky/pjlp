<?php  
include "../../../fungsi/koneksi.php";
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    $AtasanSatu = $_POST['AtasanSatu'];
    $AtasanDua = $_POST['AtasanDua'];
    $NipPegawai = $_POST['NipPegawai'];
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
    $uploadImg = $_FILES['uploadImg']['name'];
// ambil data file
    $namaSementara = $_FILES['uploadImg']['tmp_name'];
    $penempatan = $_POST['penempatan'];
// tentukan lokasi file akan dipindahkan
    $dirUpload = "../../staf1/foto/";
// pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$uploadImg); 
    $query = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', level='$level', AtasanSatu='$AtasanSatu', AtasanDua='$AtasanDua', NipPegawai='$NipPegawai', jenisKelamin='$jenisKelamin', NamaPegawai='$NamaPegawai', tempat_lahir='$tmp', tanggal_lahir='$tgl', Agama='$Agama', NoHp='$NoHp', Alamat='$Alamat', Email='$Email', NipAtasanSatu='$NipAtasanSatu', NipAtasanDua='$NipAtasanDua', foto='$uploadImg', penempatan='$penempatan' WHERE id_user ='$id' ");
    if ($query) {
        header("location:index.php?p=userStaff&pesan=berhasil");
    } else {
        echo 'error' . mysqli_error($koneksi);
    }
}
?>