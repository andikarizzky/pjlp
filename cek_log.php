<?php
include 'fungsi/koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$cek      = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
$result   = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);

if($result>0){
	if ($data['level'] == 'IT') {
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:IT/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Admin Sub Bagian Tata Usaha'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf1/Admin Sub Bagian Tata Usaha/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Sub Bagian Tata Usaha'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf1/Sub Bagian Tata Usaha/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Admin Seksi Pelayanan dan Informasi'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf2/Admin Seksi Pelayanan dan Informasi/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Seksi Pelayanan dan Informasi'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf2/Seksi Pelayanan dan Informasi/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Admin Seksi Prasarana dan Sarana'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf3/Admin Seksi Prasarana dan Sarana/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Seksi Prasarana dan Sarana'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf3/Seksi Prasarana dan Sarana/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf4/Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Seksi Konservarsi Peragaan Penelitian dan Pengembangan'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf4/Seksi Konservarsi Peragaan Penelitian dan Pengembangan/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Satuan Pelaksana Pendidikan dan Kerjasama Antar Lembaga Konservarsi'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf4/Satuan Pelaksana Pendidikan dan Kerjasama Antar Lembaga Konservarsi/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Satuan Pelaksana Kesejahteraan Satwa'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf4/Satuan Pelaksana Kesejahteraan Satwa/index.php?pesan=berhasil");

	}elseif($data['level'] == 'Satuan Pelaksana Pakan Satwa'){
	    session_start();
	    $_SESSION['username'] = $data['username'];
	    // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
	    $_SESSION['level'] 	  = $data['level'];
	    $_SESSION['NamaPegawai'] = $data['NamaPegawai'];

    header("location:app/staf4/Satuan Pelaksana Pakan Satwa/index.php?pesan=berhasil");

	}
}else{
    header("location:index.php?pesan=gagal");
}
?>