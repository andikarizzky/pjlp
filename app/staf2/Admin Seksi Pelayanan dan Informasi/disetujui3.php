<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
include "../../../fungsi/guidv4.php";

if (isset($_GET['tgl']) && isset($_GET['NIP']) && isset($_GET['Pegawai'])) {
    $tgl = $_GET['tgl'];
    $NIP = $_GET['NIP'];
    $Pegawai = $_GET['Pegawai'];
    $query = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE tglManual='$tgl' AND NIP='$NIP' AND Pegawai='$Pegawai' AND Submit='berhasil' AND status=1 ORDER BY tglManual DESC ");    
}
?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail</h4>
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
                        <a href="#">Laporan Di Setujui</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Pilih Tanggal Laporan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail Laporan</a>
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
                        echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Disimpan</p>
                        </div>';
                    }else if($_GET['pesan'] == "berhasilhapus"){
                     echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-warning" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-info"></span> <p class="text-warning">Berhasil DiHapus</p>
                     </div>';   
                 }
             }
             ?>
             <!-- Small boxes (Stat box) -->
             <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Laporan Pada Tanggal
                                <span class="text-primary"> <?php echo tanggal_indo($tgl); ?> </span>

                            </h3>
                            <span  class="ml-auto" class="text-primary">NIP &nbsp;&nbsp;&nbsp;&nbsp;: <?php  echo $NIP; ?> <br> Nama : <?php echo $Pegawai; ?></span>
                            &nbsp;&nbsp;&nbsp;
                        <!--    <a data-toggle="tooltip"  class="ml-auto" data-original-title="Kembali" href="index.php?p=datapesanan2">
                             <button type="button" class="btn btn-border btn-round btn-warning">
                             <span class="btn-label">
                             <i class="fas fa-reply text-warning"></i>
                             </span>    
                             </button>                               
                         </a>    -->
                     </div>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover table-head-bg-info">
                            <thead align="center" > 
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Uraian Tugas</th>
                                    <th>Keterangan</th>
                                    <th>Waktu</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>    
                                </tr>
                            </thead>
                            <tbody align="center">
                                <tr>
                                    <?php 
                                    $no =1 ;
                                    if (mysqli_num_rows($query)) {
                                        while($row=mysqli_fetch_array($query)):
                                         ?>
                                         <td> <?= $no; ?> </td>
                                         <td><img src="../../staf1/gambar/<?php echo $row['gambar'];?>" height="50" width="100" alt="Tidak Ada Foto"></td>
                                         <td> <?= $row['catatan']; ?> </td>
                                         <td> <?= $row['Keterangan']; ?> </td>
                                         <td> <?= $row['jamManual']; ?> - <?= $row['jamManual2']; ?> </td>
                                         <td> <?php
                                         $tanggal = $row["tglManual"];
                                         $tanggal2 = date_create($tanggal);
                                         $tgl = date_format($tanggal2, 'Y-m-d');
                                         echo tanggal_indo($tgl);
                                         ?> </td>
                                         <td > <?php
                                         if ($row['status'] == 0){
                                            echo '<span class="badge badge-warning" class=text-warning>Menunggu Persetujuan</span>';
                                        } elseif ($row['status'] == 1) {
                                            echo '<span class="badge badge-success" class=text-primary>Telah Disetujui</span>';
                                        } else {
                                            echo '<span  class="badge badge-danger" class=text-danger>Tidak Disetujui</span>';
                                        }
                                        ?> 
                                    </td>  
                                </tr>
                                <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada permintaan.</td></tr>";} ?>
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>







            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="row">
                     

                        <div class="col-sm-6">
                            <div class="card"> 
                                <div class="card-header">
                                    <div class="card-title">Masukan Nilai</div>
                                </div>


                                <form method="post" id="bs-validate-demo" novalidate action="" class="form-horizontal">
                                    <div class="card-body">

                                        <input type="hidden" readonly value="<?= $NIP; ?>" class="form-control" name="NIP">
                                        <input type="hidden" readonly value="<?= $Pegawai; ?>" class="form-control" name="Pegawai">
                                        <input type="hidden" readonly value="<?= $tgl; ?>" class="form-control" name="tglManual">

                                        <div class="form-group form-show-validation row">
                                           <label for="Kriteria1">Kriteria 1</label>
                                           <input type="number" required class="form-control" id="kriteria1" name="kriteria1">
                                       </div>
                                       <div class="form-group form-show-validation row">
                                           <label for="Kriteria2">Kriteria 2</label>
                                           <input type="number" required class="form-control" id="kriteria2" name="kriteria2">
                                       </div> 
                                       <div class="form-group form-show-validation row">
                                           <label for="Kriteria3">Kriteria 3</label>
                                           <input type="number" required class="form-control" id="kriteria3" name="kriteria3">
                                       </div>
                                       <div class="form-group form-show-validation row">
                                           <label for="Kriteria4">Kriteria 4</label>
                                           <input type="number" required class="form-control" id="kriteria4" name="kriteria4">
                                       </div>       
                                       <div class="form-group">
                                        <input type="submit" id="simpanNilai" name="simpanNilai" class="btn btn-success " value="Simpan"> 
                                    </div>


                                    <?php 
                                    include "../../../fungsi/koneksi.php";
                                    if (isset($_POST['simpanNilai'])) {
                                        $id = guidv4();
                                        $NIP = trim($_POST['NIP']);
                                        $Pegawai = trim($_POST['Pegawai']);
                                        $tglManual = trim($_POST['tglManual']);       
                                        $kkriteria1 = trim($_POST['kriteria1']);
                                        $kkriteria2 = trim($_POST['kriteria2']);
                                        $kkriteria3 = trim($_POST['kriteria3']);
                                        $kkriteria4 = trim($_POST['kriteria4']);    

                                        $jumlahNilai = ($kkriteria1) + ($kkriteria2) + ($kkriteria3) + ($kkriteria4);

                                        $hitungrata2 = ($jumlahNilai) / (4);

                                        $queryNilai1="INSERT INTO nilai SET id_nilai='$id',NIP='$NIP',Pegawai='$Pegawai',tglManual='$tglManual',kriteria1='$kkriteria1',kriteria2='$kkriteria2',kriteria3='$kkriteria3',kriteria4='$kkriteria4',totalNilai='$jumlahNilai',nilaiRata2='$hitungrata2'";
                                    
                                            $simpan1 = mysqli_query($koneksi, $queryNilai1);
                                            if($simpan1) {
                                                header("location:index.php?p=disetujui3&tgl=$tgl&NIP=$NIP&Pegawai=$Pegawai");
                                            } else {
                                                echo "error : " . mysqli_error($koneksi);
                                            }

                                    }


                                    ?>


                                </form>



                            </div>
                        </div>
                    </div>



                    <div class="col-sm-6">
                        <div class="card"> 
                            <div class="card-header">
                                <div class="card-title">Ubah Nilai</div>
                            </div>                
                            <div class="card-body">

                                <?php 
                                include "../../../fungsi/koneksi.php";

                                if (isset($_GET['tgl']) && isset($_GET['NIP']) && isset($_GET['Pegawai'])) {
                                    $tgl = $_GET['tgl'];
                                    $NIP = $_GET['NIP'];
                                    $Pegawai = $_GET['Pegawai'];
                                    $query2 = mysqli_query($koneksi, "SELECT * FROM nilai WHERE tglManual='$tgl' AND NIP='$NIP' AND Pegawai='$Pegawai'");    
                                    if (mysqli_num_rows($query2)) {
                                        $row2=mysqli_fetch_assoc($query2);
                                    }    

                                }                         

                                ?> 

                                <form method="post" action="" class="form-horizontal">
                                 <div class="form-group">
                                   <label for="Kriteria1">Kriteria 1</label>
                                   <input type="number" class="form-control" id="Kriteria1" name="kriteria1" value="<?= $row2['kriteria1']; ?>">
                               </div>
                               <div class="form-group">
                                   <label for="Kriteria2">Kriteria 2</label>
                                   <input type="number" class="form-control" id="Kriteria2" name="kriteria2" value="<?= $row2['kriteria2']; ?>">
                               </div> 
                               <div class="form-group">
                                   <label for="Kriteria3">Kriteria 3</label>
                                   <input type="number" class="form-control" id="Kriteria3" name="kriteria3" value="<?= $row2['kriteria3']; ?>">
                               </div>
                               <div class="form-group">
                                   <label for="Kriteria4">Kriteria 4</label>
                                   <input type="number" class="form-control" id="Kriteria4" name="kriteria4" value="<?= $row2['kriteria4']; ?>">
                               </div>       
                               <div class="form-group">
                                <input type="submit" id="uodate" name="update" class="btn btn-warning" value="Update"> 
                            </div>


                            <?php 

                            if(isset($_POST['update']) && isset($_GET['tgl']) && isset($_GET['NIP']) && isset($_GET['Pegawai'])){
                                $tgl = $_GET['tgl'];
                                $NIP = $_GET['NIP'];
                                $Pegawai = $_GET['Pegawai'];
                                $kkkriteria1 = trim($_POST['kriteria1']);
                                $kkkriteria2 = trim($_POST['kriteria2']);
                                $kkkriteria3 = trim($_POST['kriteria3']);
                                $kkkriteria4 = trim($_POST['kriteria4']);    

                                $jumlahNilai2 = ($kkkriteria1) + ($kkkriteria2) + ($kkkriteria3) + ($kkkriteria4);

                                $hitungRata2 = ($jumlahNilai2) / (4);

                                $queryNilai2 = ("UPDATE nilai SET kriteria1='$kkkriteria1',kriteria2='$kkkriteria2',kriteria3='$kkkriteria3',kriteria4='$kkkriteria4',totalNilai='$jumlahNilai2',nilaiRata2='$hitungRata2'  WHERE tglManual='$tgl' AND NIP='$NIP' AND Pegawai='$Pegawai' ");
                                $simpan2 = mysqli_query($koneksi, $queryNilai2);

                                if($simpan2) {
                                    header("location:index.php?p=disetujui3&tgl=$tgl&NIP=$NIP&Pegawai=$Pegawai");
                                } else {
                                    echo "error : " . mysqli_error($koneksi);
                                }
                            }
                            ?>


                        </form>


                    </div>
                </div>
            </div>


        </div>
    </div>


    <div class="col-sm-6 col-xs-12">
        <div class="box box-info">
            <div class="card">           
                <div class="card-header">
                    <div class="card-title">Tabel Nilai</div>
                </div>                
                <div class="card-body">
                    <table id="basic-datatables" class="table table-responsive display table table-striped table-hover table-head-bg-info dataTable no-footer">
                        <thead align="center">
                            <tr>
                                <th>No</th>                            
                                <th>Kriteria 1</th>
                                <th>Kriteria 2</th>
                                <th>Kriteria 3</th>
                                <th>Kriteria 4</th>
                                <th>Total Nilai</th>
                                <th>Nilai Rata - rata</th>
                                <th>Hapus</th>                            
                            </tr>
                        </thead>
                        <tbody align="center">
                            <tr>
                                <?php 
                                $sql = "SELECT * FROM nilai WHERE tglManual='$tgl' AND NIP='$NIP' AND Pegawai='$Pegawai'";
                                $queryTampil = mysqli_query($koneksi, $sql);
                                $no = 1;
                                if(mysqli_num_rows($queryTampil) > 0) {
                                    while($row = mysqli_fetch_assoc ($queryTampil)):
                                     ?>
                                     <td align="center"><?php echo $no; ?></td>
                                     <td align="center"><?php echo $row['kriteria1'] ?></td>
                                     <td align="center"><?php echo $row['kriteria2'] ?></td>
                                     <td align="center"><?php echo $row['kriteria3'] ?></td>
                                     <td align="center"><?php echo $row['kriteria4'] ?></td>
                                     <td align="center"><?php echo $row['totalNilai'] ?></td>
                                     <td align="center"><?php echo $row['nilaiRata2'] ?></td>
                                     <td align="center">
                                    <a href="hapusNilai.php?tgl=<?= $row['tglManual']; ?>&NIP=<?= $row['NIP']; ?>&Pegawai=<?= $row['Pegawai']; ?>&id=<?= $row['id_nilai']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Laporan'><button    class="btn btn-danger btn-icon"><i class="fa fa-trash" aria-hidden="true"></i></button></span></a>
                                        
                                     </td>
                                 </tr>
                    <?php $no++; endwhile; } else { echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Belum ada nilai !</strong>
                    </div>'; } ?>                                  
                             </tbody>
                         </table>
                         <a data-original-title="Print" target="_blank"  data-toggle="tooltip" href="disetujuiPrint2.php?&NIP=<?php echo $NIP ?>&Pegawai=<?php echo $Pegawai ?>&tgl=<?php echo $tgl ?>"><button class="btn btn-success">
                            <i class="fa fa-print"></i>    
                        </button>
                    </a>
                                                                                       
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var form = document.getElementById('bs-validate-demo');
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
    }, false);
  })();
</script>

<script>
    $(document).ready(function(){setTimeout(function(){$(".pesan2").fadeIn('slow');}, 500);});
    setTimeout(function(){$(".pesan2").fadeOut('slow');}, 5000);
</script>

</div>
</div>
</section>
</div>
        <footer class="footer">
            <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
        </footer>
</div>