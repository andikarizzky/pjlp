<!DOCTYPE html>
<html>
<head>
</head>
<body>
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #3C8DBC; color: #fff; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #3C8DBC; border-top: solid 1mm #AAAADD; padding: 2mm}
  h1 {color: #000033}
  h2 {color: #000055}
  h3 {color: #000077}
</style>
<!-- Setting Margin header/ kop -->
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
  .tabel2 {
    border-collapse: collapse;
  }
  .tabel2 th, .tabel2 td {
      padding: 5px 5px;
      border: 1px solid #959595;
  }
   div.kanan {
     width:300px;
	 float:right;
     margin-right:-159px;
     margin-top:-1px;
  }
  div.kiri {
	  width:300px;
	  float:left;
	  margin-left:1px;
	  display:inline;
  }
  </style>
<table>
    <tr>
      <th rowspan="3"><img src="../../../assets/images/logopemkot.png" style="width:100px;height:100px" /></th>
      <td style="text-align: center; " style="width: 520px;"><font style="font-size: 18px"><b>PEMERINTAH KOTA JAKARTA SELATAN <br> TAMAN MARGASATWA RAGUNAN </b></font>
      <br><br>Taman Margasatwa Ragunan
Jl. Harsono RM. No. 1, Ragunan, Pasar Minggu,
Jakarta Selatan 12550 Indonesia<br>Tel. (021) 7884 7114 // Fax. (021) 780 5280</td>
	  <th rowspan="3"><img src="../../../assets/images/logoragunan2.jpg" style="width:100px;height:100px" /></th>
    </tr>
  </table>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>LAPORAN AKTIVITAS PEGAWAI</u></p>
  <table class="tabel2" align="center">
    <thead>
      <tr>
        <td style="text-align: center; "><b>No.</b></td>
        <td style="text-align: center; "><b>Nama</b></td>
		<td style="text-align: center; "><b>Tanggal Keluar</b></td>
        <td style="text-align: center; "><b>Laporan</b></td>
        <td style="text-align: center; "><b>Staff</b></td>
        <td style="text-align: center; "><b>Jam</b></td>
      </tr>
    </thead>
    <tbody>
      <?php
	include "../../../fungsi/fungsi.php";
       include "../../../fungsi/koneksi.php";
       $query = mysqli_query($koneksi, "SELECT * FROM permintaan where Akses='Sub Bagian Tata Usaha' AND status=1"); 
      $i   = 1;
      while($data=mysqli_fetch_assoc($query))
      {
      ?>
      <tr>
        <td style="text-align: center; width=15px;"><?php echo $i; ?></td>
        <td style="text-align: center; width=100px;"><?php echo $data['NIP']; ?></td>
		<td style="text-align: center; width=70px;"><?php echo tanggal_indo($data['tgl_permintaan']); ?></td>
        <td style="text-align: center; width=70px;"><?php echo $data['Keterangan']; ?></td>        
        <td style="text-align: center; width=50px;"><?php echo $data['Akses']; ?></td>        
        <td style="text-align: center; width=50px;"><?php echo $data['jam']; ?></td>                
      </tr>
    <?php
    $i++;
    }
    ?>
    </tbody>
  </table>
  <div class="kiri">
      <p>Mengetahui :<br>Jabatan X</p>
      <br>
      <br>
      <br>
      <p><b><u>M. Azharuddin, S.T</u><br>NIK : X</b></p>
  </div>
  <div class="kanan">
      <p>Mengetahui :<br>Jabatan X</p>
      <br>
      <br>
      <br>
      <p><b><u>Irwan Saputra, A.Md</u><br>NIK : X</b></p>
  </div>
  <script>
    window.print();
  </script>
</body>
</html>