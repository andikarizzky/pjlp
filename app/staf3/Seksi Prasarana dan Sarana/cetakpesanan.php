<?php 
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
$id  = isset($_GET['id']) ? $_GET['id'] : false;
$NIP = $_GET['NIP'];
$tgl= $_GET['tgl'];
?>
<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
</style>
<!-- Setting Margin header/ kop -->
<!-- Setting CSS Tabel data yang akan ditampilkan -->
<style type="text/css">
  .tabel2 {
    border-collapse: collapse;
  }
  .tabel2 th, .tabel2 td {
    padding: 5px 5px;
    border: 1px solid #000;
  }
  div.kanan {
   position: absolute;
   bottom: 100px;
   right: -1px;
 }
 div.kiri {
   position: absolute;
   bottom: 100px;
   left: -1px;     
 }
 div.kanan2 {
  position: absolute;
  top: 124px;
  right: -1px;     
}
</style>
<?php 
$query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$NIP' ");
if (mysqli_num_rows($query2)){                
  $data = mysqli_fetch_assoc($query2);
} else {
  echo 'gagal';
}
?>
<?php 
$query3 = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE NIP='$NIP' AND  status=1 AND tglManual='$tgl' ");
if (mysqli_num_rows($query3)){                
  $data3 = mysqli_fetch_assoc($query3);
} else {
  echo 'gagal';
}
?>
<table align="center">
  <tr>
    <td align="center" style="width: 620px;"><font style="font-size: 18px">PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA <br>  <b> UNIT PENGELOLA TAMAN MARGASATWA RAGUNAN </b>
    </font>
    <br>Taman Margasatwa Ragunan
    Jl. Harsono RM. No. 1, Ragunan, Jakarta Selatan Kode Pos 12550<br>Tel. (021) 7884 7114, Fax. (021) 780 5280</td>
  </tr>
</table>
<hr>
<br>
<table align="left">
  <tr>
    <td><br>Nama</td>
    <td><br>:</td>
    <td><br><?= $data['NamaPegawai'] ?></td>
  </tr>
  <tr>
    <td><br>NIP</td>
    <td><br>:</td>
    <td><br><?= $data['username'] ?></td>
  </tr>
  <tr>
    <td><br>Tempat Tugas</td>
    <td><br>:</td>
    <td><br><?= $data['penempatan'] ?></td>
  </tr>
  <tr>
    <td><br>Tanggal</td>
    <td><br>:</td>
    <td><br><?= tanggal_indo($data3['tglManual']); ?></td>
  </tr>
  <tr>
    <td><br>Pengawas</td>
    <td><br>:</td>
    <td><br><?= $data['AtasanSatu'] ?></td>
  </tr>
</table> 
<div class="kanan2">
  <img style="width:100px;height:111px" src="../../staf3/gambar/<?php echo $data['gambar'];?>">
</div>
<br>
<br>
<br>
<br>
<div class="isi" style="margin: 0 auto;">
 <table class="tabel2" align="center">
  <thead>
    <tr>
      <td style="text-align: center; "><b>NO</b></td> 
      <td style="text-align: center; "><b>WAKTU</b></td>        
      <td style="text-align: center; "><b>URAIAN TUGAS</b></td>
      <td style="text-align: center; "><b>KETERANGAN</b></td> 
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($koneksi, "SELECT NIP, Akses, catatan, jamManual, jamManual2, tglManual, Keterangan FROM permintaan WHERE NIP='$NIP' AND  status=1 AND tglManual='$tgl' "); 
    $i   = 1;
    while($data=mysqli_fetch_array($query))
    {
      ?>
      <tr>
        <td style="text-align: center; height=75px; width=10px;"><?php echo $i; ?></td>   
        <td style="text-align: center; height=75px; width=80px;"><?php echo $data['jamManual']; ?> - <?= $data['jamManual2']; ?></td>         
        <td style="text-align: center; height=75px; width=250px;"><?php echo $data['catatan']; ?></td>
        <td style="text-align: center; height=75px; width=250px;"><?php echo $data['Keterangan']; ?></td>  
      </tr>
      <?php
      $i++;
    }
    ?>
  </tbody>
</table>
<?php 
$query2 = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE NIP='$NIP' AND  status=1 AND tglManual='$tgl' ");  
$data2 = mysqli_fetch_assoc($query2);
?>
</div>
<?php 
$query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$NIP' ");
if (mysqli_num_rows($query2)){                
  $data = mysqli_fetch_assoc($query2);
} else {
  echo 'gagal';
}
?>
<div class="kiri">
  <p align="left">Pengawas Lapangan</p>
  <br>
  <br>
  <br>
  <p align="center"><b><?= $data['AtasanSatu'] ?></b></p><br> 
  <p align="center">NIP : <?= $data['username'] ?></p>
</div>
<div class="kanan">
  <p align="right">Jakarta, <?php
  $tanggal = $data3["tglManual"];
  $tanggal2 = date_create($tanggal);
  $tgl = date_format($tanggal2, 'Y-m-d');
  echo tanggal_indokedua($tgl);
  ?> </p>
  <p align="right">Tenaga Penyedia Jasa Lainnya Perorangan</p>
  <br>
  <br>
  <br>
  <p align="center"><b><?= $data['NamaPegawai'] ?></b></p><br>
  <p align="center">NIP : <?= $data['username'] ?></p>
</div>  
<?php
$content = ob_get_clean();
include '../../../assets/html2pdf/html2pdf.class.php';
try
{
  $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 10, 10));
  $html2pdf->pdf->SetDisplayMode('fullpage');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
  $html2pdf->Output('laporan_semua.pdf');
}
catch(HTML2PDF_exception $e) {
  echo $e;
  exit;
}
?>