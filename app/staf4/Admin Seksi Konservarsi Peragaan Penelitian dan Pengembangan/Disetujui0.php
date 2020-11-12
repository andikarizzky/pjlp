<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
if (isset($_GET['aksi']) && isset($_GET['tgl'])) {
    //die($id = $_GET['id']);
    $tgl = $_GET['tgl'];
    $NIP = $_GET['NIP'];
    echo $tgl;
    if ($_GET['aksi'] == 'detil') {
        header("location:?p=detil&tgl=$tgl");
    } 
}
$query = mysqli_query($koneksi, "SELECT * FROM permintaan LEFT JOIN user on permintaan.NIP = user.username WHERE status=1 AND Akses!='Sub Bagian Tata Usaha' AND Akses!='Admin Sub Bagian Tata Usaha' AND Akses!='Seksi Pelayanan dan Informasi' AND Akses!='Admin Seksi Pelayanan dan Informasi' AND Akses!='Seksi Prasarana dan Sarana' AND Akses!='Admin Seksi Prasarana dan Sarana' AND Akses!='Admin Seksi Konservarsi Peragaan Penelitian dan Pengembangan' ORDER BY tglManual AND NIP DESC "); 
?>
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
                        <a href="#">Di Setujui</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Laporan Keseluruhan</a>
                    </li>
                </ul>
            </div>
            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="col-sm-12">
                    <div class="card">     
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h3>Laporan Keseluruhan</h3>
                                <a data-toggle="tooltip" class="ml-auto" data-original-title="Print" href="cetakPDF.php" target="_blank">
                                   <button type="button" class=" ml-auto btn-success btn btn-default">
                                       <span class="btn-label">
                                           <i class='fa fa-print'></i>
                                       </span>    
                                   </button> 
                               </a>
                           </div>
                       </div>     
                       <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover table-head-bg-primary">
                                <thead align="center" > 
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Uraian Tugas</th>
                                        <th>Keterangan</th>
                                        <th>Waktu</th>   
                                        <th>Tanggal Laporan</th>
                                        <th>Temapt Tugas</th>
                                        <th>Pengawas</th>
                                        <th>Status</th>
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
                                               <td> <?= $row['Pegawai']; ?> </td>
                                               <td> <?= $row['catatan']; ?> </td> 
                                               <td> <?= $row['Keterangan']; ?> </td> 
                                               <td> <?= $row['jamManual']; ?> - <?= $row['jamManual2']; ?> </td>   
                                               <td> <?php
                                               $tanggal = $row["tglManual"];
                                               $tanggal2 = date_create($tanggal);
                                               $tgl = date_format($tanggal2, 'Y-m-d');
                                               echo tanggal_indo($tgl);
                                               ?> </td> 
                                               <td> <?= $row['penempatan']; ?> </td>
                                               <td> <?= $row['AtasanSatu']; ?> </td>
                                               <td > <?php
                                               if ($row['status'] == 0){
                                                echo '<span class=text-warning>Belum Disetujui</span>';
                                            } elseif ($row['status'] == 1) {
                                                echo '<span class="badge badge-success" class=text-primary >Telah Disetujui </span>';
                                            } else {
                                                echo '<span class=text-danger>Tidak Disetujui</span>';
                                            }
                                            ?> 
                                        </td>     
                                    </tr>        
                                    <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada laporan disetujui</td></tr>" . mysqli_error($koneksi);} ?>
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