<?php
include('../../../fungsi/koneksi.php');
    $tgl = $_GET['tgl'];
    $NIP = $_GET['NIP'];
    $Pegawai = $_GET['Pegawai'];
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"DELETE FROM nilai WHERE id_nilai='$id'");

    header("location:index.php?p=disetujui3&tgl=$tgl&NIP=$NIP&Pegawai=$Pegawai")

?>