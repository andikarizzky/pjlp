<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/guidv4.php";

if(isset($_POST['simpan'])) {
    $id = guidv4();
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
    $dirUpload = "../../staf4/foto/";
// pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$uploadImg); 
    $query =("INSERT INTO user(id_user,username,password,level,AtasanSatu,AtasanDua,NipPegawai,NamaPegawai,jenisKelamin, tempat_lahir, tanggal_lahir, Agama,NoHp,Alamat,Email,NipAtasanSatu,NipAtasanDua,foto,penempatan) VALUES ('$id','$username', '$password', '$level','$AtasanSatu', '$AtasanDua', '$NipPegawai', '$NamaPegawai', '$jenisKelamin', '$tmp', '$tgl', '$Agama', '$NoHp', '$Alamat', '$Email', '$NipAtasanSatu', '$NipAtasanDua', '$uploadImg', '$penempatan') ");        
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil) {
        header("location:index.php?p=tambahuser&pesan=berhasil");
    } else {
        die("ada kesalahan : " . mysqli_error($koneksi));
    }
}
?>