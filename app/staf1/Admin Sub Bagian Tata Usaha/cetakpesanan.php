<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
ob_start();
?>
<style type="text/css">
  table.page_footer {width: 100%; top:; padding: 2mm}    
  .tabel2 {
    border-collapse: collapse;
    margin-left: 0px;
  }
  .tabel2 th, .tabel2 td {
    padding: 5px 5px;
    border: 1px solid #000;
  }

  div.kanan {
   width:300px;
   float:right;
   margin-left:228px;
   margin-top:-127px;
 }

 div.kanantgl {
   width:300px;
   float:right;
   margin-left:460px;
   margin-top:2px;
 }

 div.kiri {
  width:300px;
  float:left;
  margin-left:-89px;
  display:inline;
}

div.kanan2 {
  position: absolute;
  top: 110px;
  right: -1px;     
}
</style>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
  <page_footer>
  <table class="page_footer">
    <tr>
      <td style="width: 100%; text-align: right">
        page [[page_cu]]/[[page_nb]]
      </td>
    </tr>
  </table>
  </page_footer>
  <?php 
  include "../../../fungsi/koneksi.php";
  include "../../../fungsi/fungsi.php";
  $tgl= $_GET['tgl'];
  ?>  
  <table>
    <tr>
      <td align="center" style="width: 710px;"><font style="font-size: 18px">PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA <br>  <b> UNIT PENGELOLA TAMAN MARGASATWA RAGUNAN </b>
      </font>
      <br>Taman Margasatwa Ragunan
      Jl. Harsono RM. No. 1, Ragunan, Jakarta Selatan Kode Pos 12550<br>Tel. (021) 7884 7114, Fax. (021) 780 5280</td>
    </tr>
  </table>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>LAPORAN HARIAN DI SETUJUI</u></p>
  <?php 

  $query2 = mysqli_query($koneksi, "SELECT * FROM user ");
  if (mysqli_num_rows($query2)){                
    $data = mysqli_fetch_assoc($query2);

  } else {
    echo 'gagal';
  }
  ?>
  <?php 

  $query3 = mysqli_query($koneksi, "SELECT * FROM permintaan");
  if (mysqli_num_rows($query3)){                
    $data3 = mysqli_fetch_assoc($query3);

  } else {
    echo 'gagal';
  }
  ?>   
  <br> 
  <table class="tabel2">
    <thead align="center">
      <tr>
        <td style="text-align: center; "><b>No.</b></td>
        <td style="text-align: center; "><b>NIP</b></td>
        <td style="text-align: center; "><b>Nama</b></td>
        <td style="text-align: center; "><b>Uraian Tugas</b></td>
        <td style="text-align: center; "><b>Keterangan</b></td>
        <td style="text-align: center; "><b>Waktu</b></td>
        <td style="text-align: center; width=50px; "><b>Tempat Tugas</b></td>
        <td style="text-align: center; "><b>Pengawas</b></td>     
      </tr>
    </thead>
    <tbody align="center">
      <?php

      $sql = mysqli_query($koneksi, "SELECT penempatan, AtasanSatu, jamManual2, status, catatan, NIP, jamManual, Akses, Pegawai, Keterangan, tgl_permintaan FROM permintaan LEFT JOIN user on permintaan.NIP = user.username WHERE  status=1 AND Akses='Sub Bagian Tata Usaha' AND tglManual='$tgl' ORDER BY NIP DESC");  
      $i   = 1;
      while($datalaporan=mysqli_fetch_array($sql))
      {
        ?>
        <tr>
          <td style="text-align: center; width=15px;"><?php echo $i; ?></td>
          <td style="text-align: left; height:80px; width=60px;"><?php echo $datalaporan['NIP']; ?></td>
          <td style="text-align: left; height:80px; width=50px;"><?php echo $datalaporan['Pegawai']; ?></td>
          <td style="text-align: left; height:100px; width=130px;"><?php echo $datalaporan['catatan']; ?></td>
          <td style="text-align: left; height:100px; width=130px;"><?php echo $datalaporan['Keterangan']; ?></td>
          <td style="text-align: center; width=25px;"><?php echo $datalaporan['jamManual']; ?> - <?php echo $datalaporan['jamManual2']; ?></td> 
          <td style="text-align: center; height:100px; width=65px;"><?php echo $datalaporan['penempatan']; ?></td> 
          <td style="text-align: center; height:100px; width=50px;"><?php echo $datalaporan['AtasanSatu']; ?></td>  
        </tr>
        <?php
        $i++;
      }
      ?>
    </tbody>
  </table>
  <p>Laporan pada tanggal : <b> <?=  tanggal_indo($tgl); ?></b></p>
  <br>
  <div class="kanantgl">
    <p>Jakarta,               <?php
    $tanggal = date("Y-m-d");
    $tanggal2 = date_create($tanggal);
    $tgl = date_format($tanggal2, 'Y-m-d');
    echo tanggal_indokedua($tgl);
    ?></p>  
  </div> 
  <div class="kiri">
    <p align="center">Pengawas Lapangan</p>
    <br>
    <br>
    <br>
    <p align="center"><b><u><?= $data['AtasanSatu'] ?></u><br>NIP : <?= $data['NipAtasanSatu'] ?></b></p>
  </div>
  <div class="kanan">     
    <p align="center">Tenaga Penyedia Jasa Lainnya Perorangan</p>
    <br>
    <br>
    <br>
    <p align="center"><b><u><?= $data['NamaPegawai'] ?></u><br>NIP : <?= $data['username'] ?></b></p>
  </div>     
</page>
<?php
$content = ob_get_clean();
include '../../../assets/html2pdf/html2pdf.class.php';
try
{
  $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output('Laporan_PJLP.pdf');
}
catch(HTML2PDF_exception $e) {
  echo $e;
  exit;
}