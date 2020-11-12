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
  $NIP = $_GET['NIP'];
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
  <?php 
  $query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$NIP' ");
  if (mysqli_num_rows($query2)){                
    $data = mysqli_fetch_assoc($query2);

  } else {
    echo 'gagal';
  }
  ?>  
  <table align="left">
    <tr>
      <td><br>Nama</td>
      <td><br>:</td>
      <td><br><?= $data['NamaPegawai'] ?></td>
    </tr>
    <tr>
      <td><br>N I P</td>
      <td><br>:</td>
      <td><br><?= $data['username'] ?></td>
    </tr>
    <tr>
      <td><br>Tempat Tugas</td>
      <td><br>:</td>
      <td><br><?= $data['penempatan'] ?></td>
    </tr>
    <?php 
    $query3 = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE NIP='$NIP' AND  status=1 AND tglManual='$tgl' ");
    if (mysqli_num_rows($query3)){                
      $data3 = mysqli_fetch_assoc($query3);

    } else {
      echo 'gagal';
    }
    ?>  
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
    <img style="width:123px;height:140px" src="../../staf1/foto/<?php echo $data['foto'];?>">
  </div>
  <br> 
  <table class="tabel2">
    <thead align="center">
      <tr>
        <td style="text-align: center; "><b>No.</b></td>
        <td style="text-align: center; "><b>Waktu</b></td>
        <td style="text-align: center; "><b>Uraian Tugas</b></td>
        <td style="text-align: center; "><b>Keterangan</b></td>      
      </tr>
    </thead>
    <tbody align="center">
      <?php
      $sql = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE NIP='$NIP' AND  status=1 AND tglManual='$tgl' ");  
      $i   = 1;
      while($datalaporan=mysqli_fetch_array($sql))
      {
        ?>
        <tr>
          <td style="text-align: center; width=15px;"><?php echo $i; ?></td>
          <td style="text-align: center; width=100px;"><?php echo $datalaporan['jamManual']; ?> - <?php echo $datalaporan['jamManual2']; ?></td>
          <td style="text-align: left; height:80px; width=255px;"><?php echo $datalaporan['catatan']; ?></td>
          <td style="text-align: left; height:80px; width=255px;"><?php echo $datalaporan['Keterangan']; ?></td> 
        </tr>
        <?php
        $i++;
      }
      ?>
    </tbody>
  </table>
  <br>

  <table class="tabel2">
    <thead align="center">
      <tr>
        <td style="text-align: center; "><b>No.</b></td>
        <td style="text-align: center; "><b>Kriteria 1</b></td>
        <td style="text-align: center; "><b>Kriteria 2</b></td>
        <td style="text-align: center; "><b>Kriteria 3</b></td>      
        <td style="text-align: center; "><b>Kriteria 4</b></td>      
        <td style="text-align: center; "><b>Total Nilai</b></td>
        <td style="text-align: center; "><b>Nilai Rata - rata</b></td>                    
      </tr>
    </thead>
    <tbody align="center">
      <?php
      $sql = "SELECT * FROM nilai WHERE tglManual='$tgl' AND NIP='$NIP'";
      $i   = 1;
      $queryTampil = mysqli_query($koneksi, $sql);      
      if(mysqli_num_rows($queryTampil) > 0) {
        while($tampil=mysqli_fetch_array($queryTampil))
        {
          ?>
          <tr>
            <td style="text-align: center; width=15px;"><?php echo $i; ?></td>
            <td style="text-align: center; width=90px;"><?php echo $tampil['kriteria1'];?></td>
            <td style="text-align: center; width=90px;"><?php echo $tampil['kriteria2'];?></td>
            <td style="text-align: center; width=90px;"><?php echo $tampil['kriteria3'];?></td>
            <td style="text-align: center; width=90px;"><?php echo $tampil['kriteria4'];?></td>
            <td style="text-align: center; width=90px;"><?php echo $tampil['totalNilai'];?></td>
            <td style="text-align: center; width=91px;"><?php echo $tampil['nilaiRata2'];?></td>
          </tr>
          <?php
          $i++; 
        }}
        ?>
      </tbody>
    </table>  

    <br> 
    <div class="kanantgl">
      <p>Jakarta, <?php
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
  ?>