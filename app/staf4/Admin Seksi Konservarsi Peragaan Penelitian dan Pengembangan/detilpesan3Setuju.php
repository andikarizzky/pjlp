<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
if (isset($_GET['tgl'])) {
    $tgl = $_GET['tgl'];
    $query = mysqli_query($koneksi, "SELECT penempatan, jamManual2, status, catatan, NIP, jamManual, Akses, Pegawai, Keterangan, tgl_permintaan FROM permintaan LEFT JOIN user on permintaan.NIP = user.username WHERE  status=1 AND Akses!='Sub Bagian Tata Usaha' AND Akses!='Admin Sub Bagian Tata Usaha' AND Akses!='Seksi Pelayanan dan Informasi' AND Akses!='Admin Seksi Pelayanan dan Informasi' AND Akses!='Seksi Prasarana dan Sarana' AND Akses!='Admin Seksi Prasarana dan Sarana' AND Akses!='Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan' AND tglManual='$tgl' ORDER BY NIP DESC ");    
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
                        <a href="#">Di Setujui</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Berdasarkan Tanggal Laporan</a>
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
                                ?>  </span>
                            </h3>
                            &nbsp;&nbsp;&nbsp;
                        <!--    <a data-toggle="tooltip"  class="ml-auto" data-original-title="Kembali" href="index.php?p=datapesanan2">
                             <button type="button" class="btn btn-border btn-round btn-warning">
                             <span class="btn-label">
                             <i class="fas fa-reply text-warning"></i>
                             </span>    
                             </button>                               
                         </a>  -->
                     </div>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover table-head-bg-info">
                            <thead align="center" > 
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Waktu</th>
                                    <th>Uraian Tugas</th>
                                    <th>Keterangan</th>
                                    <th>Tempat Tugas</th> 
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
                                           <td> <?= $row['NIP']; ?> </td>
                                           <td> <?= $row['Pegawai']; ?> </td>
                                           <td> <?= $row['jamManual']; ?> - <?= $row['jamManual2']; ?> </td>
                                           <td> <?= $row['catatan']; ?> </td>
                                           <td> <?= $row['Keterangan']; ?> </td>
                                           <td> <?= $row['penempatan']; ?> </td>
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
                                <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada laproan.</td></tr>";} ?>
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