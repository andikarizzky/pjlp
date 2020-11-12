<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
//    $query = mysqli_query($koneksi, "SELECT distinct(NIP), Akses, count(id_permintaan) FROM permintaan WHERE Akses='Sub Bagian Tata Usaha' AND status=0 AND Submit='berhasil' GROUP BY NIP");     
$query = mysqli_query($koneksi, "SELECT distinct(NIP), NamaPegawai, Pegawai, AtasanSatu, tgl_permintaan, jam, tglManual, penempatan, level, Akses, count(tglManual) FROM permintaan LEFT JOIN user on permintaan.NIP = user.username WHERE Akses='Sub Bagian Tata Usaha' AND Submit='berhasil' AND status=0 GROUP BY NIP"); 
?>
<body>
  <div class="main-panel">
     <div class="content">
        <div class="page-inner">
           <div class="page-header">
              <h4 class="page-title">Laporan</h4>
              <ul class="breadcrumbs">
                 <li class="nav-home">
                    <a href="#">
                       <i class="flaticon-home"></i>
                   </a>
               </li>
               <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Laporan Tunggu</a>
            </li>
        </ul>
    </div>
    <section class="content">
        <?php
    //        menampilkan pesan jika ada pesan
        if (isset($_SESSION['pesan2']) && $_SESSION['pesan2']) {
            echo '<div class="pesan2">'.$_SESSION['pesan2'].'</div>';
        }
    //        mengatur session pesan menjadi kosong
        $_SESSION['pesan2'] = '';
        ?>    
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="berhasildisetujui"){
                echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Di Setujui</p>
                </div>';
            }else if($_GET['pesan'] == "berhasilditolak"){
                echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Di Tolak</p>
                </div>'; 
            }
        }
        ?>
        <!-- Small boxes (Stat box) -->
        <div class="col-md-12">
            <div class="card">           
                <div class="card-header">
                    <div class="card-title">Data Laporan Tunggu Sub Bagian Tata Usaha</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">								
                        <div class="table-responsive">
                            <table  id="basic-datatables" class="display table table-striped table-hover table-head-bg-primary">
                                <thead align="center" > 
                                    <tr>
                                        <th>No</th> 
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Tempat Tugas</th>
                                        <th>Pengawas</th>
                                        <th>Jumlah Laporan</th>
                                        <th>Lihat laporan</th>                                    
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <tr>
                                        <?php 
                                        $no =1 ;
                                        if (mysqli_num_rows($query)) {
                                            while($row=mysqli_fetch_assoc($query)):
                                               ?>
                                               <td> <?= $no; ?> </td>
                                               <td> <?= $row['NIP']; ?> </td>       
                                               <td> <?= $row['NamaPegawai']; ?> </td>
                                               <td> <?= $row['penempatan']; ?> </td>
                                               <td> <?= $row['AtasanSatu']; ?> </td>
                                               <td> <?= $row['count(tglManual)']; ?> </td>
                                               <td>                                                 <a data-original-title="Lihat"  data-toggle="tooltip" href="?p=detil2Tunggu&NIP=<?= $row['NIP'];?>&Pegawai=<?= $row['Pegawai']; ?>"><button type="button" class="btn btn-icon btn-round btn-info">
                                                <i class="fas fa-eye"></i>    
                                            </button>
                                        </a>            
                                    </td>                                 
                                </tr>
                                <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada Laporan Tunggu.</td></tr>";} ?>
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){setTimeout(function(){$(".pesan2").fadeIn('slow');}, 500);});
    setTimeout(function(){$(".pesan2").fadeOut('slow');}, 5000);
</script>
<footer class="footer">
    <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
</footer>
</div>
</section>
</div>
</div>
</div>
</body>