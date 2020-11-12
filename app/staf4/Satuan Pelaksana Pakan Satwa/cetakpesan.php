<?php  
include "../../../fungsi/koneksi.php";
include "../../../fungsi/fungsi.php";
if (isset($_GET['aksi']) && isset($_GET['tgl'])) {
    $tgl = $_GET['tgl'];
    echo $tgl;
    if ($_GET['aksi'] == 'detil') {
        header("location:?p=detil&tgl=$tgl");
    } 
}
$query = mysqli_query($koneksi, "SELECT NIP, tgl_permintaan, jam, tglManual, count(id_permintaan)  FROM permintaan WHERE NIP= '$_SESSION[username]' AND status=1  GROUP BY tglManual DESC ");   
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
                        <a href="#">Di Setujui</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                </ul>
            </div>
            <section class="content">
                <div class="col-sm-12">
                    <div class="card">     
                        <div class="card-header">
                            <div class="card-title">Laporan Di Setujui</div>
                        </div>                                 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover table-head-bg-info">
                                    <thead align="center" > 
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Laporan</th> 
                                            <th>Di Input Pada Tanggal</th>
                                            <th>Di Input Pada Jam</th>
                                            <th>Laporan Di Tulis</th>
                                            <th>Lihat laporan</th>  
                                            <th>Print Laporan</th>
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
                                                 <td> <?php
                                                 $tanggal = $row["tglManual"];
                                                 $tanggal2 = date_create($tanggal);
                                                 $tgl = date_format($tanggal2, 'Y-m-d');
                                                 echo tanggal_indo($tgl);
                                                 ?> </td>                                      
                                                 <td> <?= tanggal_indo($row['tgl_permintaan']); ?> </td>
                                                 <td> <?= $row['jam']; ?> </td>   
                                                 <td> <?= $row['count(id_permintaan)']; ?> x </td>
                                                 <td>
                                                    <a href="?p=detilpesanSetuju&aksi=detil&tgl=<?= $row['tglManual']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Laporan'><button    class="btn btn-info btn-round btn-icon"><i class="fas fa-eye"></i></button></span></a>   
                                                </td>    
                                                <td>        
                                                    <a target="_blank" href="cetakpesananketiga.php?&tgl=<?= $row['tglManual']; ?>&NIP=<?= $row['NIP']; ?>"><span data-placement='top' data-toggle='tooltip' title='Cetak'><button class="btn btn-success"><i class="fa fa-print"></i></button></span></a>
                                                </td>
                                            </tr>        
                                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum Ada Laporan Di Setujui</td></tr>";} ?>
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