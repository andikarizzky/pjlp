<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
if (isset($_GET['tgl'])) {
    $tgl = $_GET['tgl'];
    $query = mysqli_query($koneksi, "SELECT * FROM permintaan WHERE tglManual='$tgl' AND NIP='$_SESSION[username]' AND Submit='berhasil' ORDER BY tglManual DESC ");    

}
if(isset($_GET['aksi']) && isset($_GET['id'])) {
    $aksi = $_GET['aksi'];
    $id = $_GET['id'];
    if ($aksi == 'hapus') {
        $query2 = mysqli_query($koneksi, "DELETE FROM permintaan WHERE id_permintaan='$id' ");
        if ($query2) {
            header("location:?p=detil&tgl=".$tgl);
        } else {
            echo 'gagal';
        }
    }
}
?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
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
                        <a href="#">Laporan</a>
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
                <!-- Small boxes (Stat box) -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h3>Laporan Pada Tanggal
                                    <span class="text-primary"> 
                                        <?php
                                        $tanggal = $tgl;
                                        $tanggal2 = date_create($tanggal);
                                        $tgl = date_format($tanggal2, 'Y-m-d');
                                        echo tanggal_indo($tgl);
                                        ?> 
                                    </span>
                                </h3>
                                &nbsp;&nbsp;&nbsp;
                        <!--     <a data-toggle="tooltip"  class="ml-auto" data-original-title="Kembali" href="index.php?p=datapesanan">
                             <button type="button" class="btn btn-border btn-warning">
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
                                           <td><img src="../../staf3/gambar/<?php echo $row['gambar'];?>" height="50" width="100" alt="Tidak Ada Foto"></td>
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
                                <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Tidak ada laporan.</td></tr>";} ?>
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