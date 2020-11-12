<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
if (isset($_GET['tgl']) && isset($_GET['NIP']) && isset($_GET['Pegawai'])) {
    $tgl = $_GET['tgl'];
    $NIP = $_GET['NIP'];
    $Pegawai = $_GET['Pegawai'];
    $query = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE tglManual='$tgl' AND NIP='$NIP' AND Pegawai='$Pegawai' AND status=2 AND Submit='berhasil' ORDER BY tglManual DESC ");    
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
                        <a href="#">Laporan Tolak</a>
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
                                <span class="text-primary"> <?php
                                $tanggal = $tgl;
                                $tanggal2 = date_create($tanggal);
                                $tgl = date_format($tanggal2, 'Y-m-d');
                                echo tanggal_indo($tgl);
                                ?>  
                            </span>
                            </h3>
                            <span  class="ml-auto" class="text-primary">NIP &nbsp;&nbsp;&nbsp;&nbsp;: <?php  echo $NIP; ?> <br> Nama : <?php echo $Pegawai; ?></span>
                            &nbsp;&nbsp;&nbsp;
                        <!--    <a data-toggle="tooltip"  class="ml-auto" data-original-title="Kembali" href="index.php?p=datapesanan2Tunggu">
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
                                    <th>Admin Komentar</th>
                                    <th>Status</th>    
                                    <th>Edit Komentar</th>
                                    <th>Ubah Di Setujui</th>
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
                                           <td class="text-danger"> <?= $row['komentar']; ?></td>
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
                                    <td>
                                       <a href="#edit<?php echo $row['id_permintaan']; ?>" data-toggle="modal">
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Komentar"> <i class="fa fa-edit"></i></button>
                                        <?php include('buttonTolak.php'); ?> <br>

                                                    <!--
                                                    <a  href="?p=editpesan&id=<?=$row['id_permintaan']; ?>"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary " data-original-title="Edit"> <i class="fa fa-edit"></i></button></a>
                                                -->
                                            </td>
                                            <td>
                                                <a href="#editSkedua<?php echo $row['id_permintaan']; ?>" data-toggle="modal"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-success " data-original-title="Setuju"><i class="fas fa-check-square"></i></button></a><?php include('buttonSkedua.php'); ?> <br>
                                            </td>
                                        </tr>
                                        <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada laporan.</td></tr>";} ?>
                                    </tbody>
                                </table>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="footer">
        <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
    </footer>
</div>