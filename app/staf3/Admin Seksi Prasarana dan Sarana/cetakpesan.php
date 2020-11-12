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
$query = mysqli_query($koneksi, "SELECT distinct(tglManual), NIP, Pegawai, tglManual, tgl_permintaan FROM permintaan LEFT JOIN user on permintaan.NIP = user.username WHERE status=1 AND Akses='Seksi Prasarana dan Sarana' GROUP BY tglManual DESC ");   
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
                        <a href="#">Berdasarkan Tanggal</a>
                    </li>
                </ul>
            </div>
            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="col-sm-12">
                    <div class="card">     
                        <div class="card-header">
                            <div class="card-title">Laporan Berdasarkan Tanggal Input</div>
                        </div>                                 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover table-head-bg-primary">
                                    <thead align="center" > 
                                        <tr>
                                            <th>No</th>                                  
                                            <th>Tanggal Laporan</th>
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
                                                   <td>
                                                    <a href="?p=detilpesan3Setuju&tgl=<?= $row['tglManual']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Laporan'><button    class="btn btn-info btn-round btn-icon"><i class="fas fa-eye"></i></button></span></a>
                                                </td>  
                                                <td>        
                                                  <a target="_blank" href="cetakpesanan.php?&tgl=<?= $row['tglManual']; ?>"><span data-placement='top' data-toggle='tooltip' title='Cetak'><button class="btn btn-success"><i class="fa fa-print"></i></button></span></a>                  
                                              </td>
                                          </tr>        
                                          <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada BPP yang akan dicetak</td></tr>";} ?>
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