                            <div class="main-panel">

                               <div class="content">
                                <?php 
                                if(isset($_GET['pesan'])){
                                    if($_GET['pesan']=="berhasil"){
                                        echo '<div data-notify="container" class="col-10 col-xs-11 col-sm-2 alert alert-success" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 107px; right: 20px;"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><span data-notify="icon" class="fas fa-check"></span> <p class="text-success">Berhasil Login</p>
                                        </div>';
                                    }
                                }

                                ?>
                                <div class="panel-header bg-primary-gradient">

                                    <div class="page-inner py-5">

                                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                                            <?php 
                                            include '../../../fungsi/koneksi.php';

                                            $cek      = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]' ");
                                            $result   = mysqli_num_rows($cek);
                                            $data = mysqli_fetch_array($cek);
                                            ?>

                                            <div>
                                                <h5 class="text-white">Selamat Datang Admin 
                                                    <span class="text-success"><?php echo $data['NamaPegawai'];?></span>
                                                </h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="page-inner mt--5">
                                    <div class="row mt--2">
                                        <div class="col-md-6">
                                            <?php
                                            include "../../../fungsi/koneksi.php";
                                            $tunggu       = mysqli_query($koneksi, "SELECT count(status) AS jumlah0 FROM permintaan where status=0 AND submit='berhasil' AND Akses='Seksi Pelayanan dan Informasi' ");
                                            $tolak       = mysqli_query($koneksi, "SELECT count(status) AS jumlah1 FROM permintaan where status=2 AND submit='berhasil' AND Akses='Seksi Pelayanan dan Informasi' ");
                                            $terima       = mysqli_query($koneksi, "SELECT count(status) AS jumlah2 FROM permintaan where status=1 AND submit='berhasil' AND Akses='Seksi Pelayanan dan Informasi' ");
                                            ?>     
                                            <div class="card full-height">
                                                <div class="card-body">
                                                    <div class="card-header">
                                                        <div class="card-title">Total Laporan</div>
                                                    </div>
                                                    <div class="row py-3">
                                                        <div class="col-md-4 d-flex flex-column justify-content-around">

                                                            <div>
                                                                <h6 class="fw-bold text-uppercase text-warning op-8">Tunggu</h6>


                                                                <h3 class="fw-bold"><?php while ($d = mysqli_fetch_array($tunggu)) { echo '' . $d['jumlah0'] . '';}?></h3>
                                                            </div>
                                                            <div>
                                                                <h6 class="fw-bold text-uppercase text-danger op-8">Tolak</h6>
                                                                <h3 class="fw-bold"><?php while ($c = mysqli_fetch_array($tolak)) { echo '' . $c['jumlah1'] . '';}?></h3>
                                                            </div>
                                                            <div>
                                                                <h6 class="fw-bold text-uppercase text-success op-8">Terima</h6>
                                                                <h3 class="fw-bold"><?php while ($b = mysqli_fetch_array($terima)) { echo '' . $b['jumlah2'] . '';}?></h3>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <div id="chart-container">
                                                                <canvas id="totalIncomeChart"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">                         
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Total Laporan</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart-container">
                                                        <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-inner">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="card card-stats card-round">
                                                <div class="card-body ">
                                                    <div class="row align-items-center">
                                                        <div class="col-icon">
                                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                                <i class="flaticon-users"></i>
                                                            </div>
                                                        </div>

                                                        <div class="col col-stats ml-3 ml-sm-0">
                                                            <div class="numbers">
                                                                <p class="card-category">Admin Seksi Pelayanan dan Informasi</p>
                                                                <?php
                                                                include "../../../fungsi/koneksi.php";

                                                                $kueri = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Admin Seksi Pelayanan dan Informasi' ");

                                                                $data = array ();
                                                                while (($row = mysqli_fetch_array($kueri)) != null){
                                                                 $data[] = $row;
                                                             }
                                                             $cont = count ($data);

                                                             echo "<h4 class='card-title'>" . $cont; "</h4>"
                                                             ?>                                                  
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-sm-6 col-md-3">
                                        <div class="card card-stats card-round">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-icon">
                                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                                            <i class="fa fa-users"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col col-stats ml-3 ml-sm-0">
                                                        <div class="numbers">
                                                            <p class="card-category">Seksi Pelayanan dan Informasi</p>
                                                            <?php
                                                            include "../../../fungsi/koneksi.php";

                                                            $kueri = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Seksi Pelayanan dan Informasi'");

                                                            $data = array ();
                                                            while (($row = mysqli_fetch_array($kueri)) != null){
                                                             $data[] = $row;
                                                         }
                                                         $cont = count ($data);

                                                         echo "<h4 class='card-title'>" . $cont; "</h4>"
                                                         ?>                                                  

                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </div>

                     </div>
                     <footer class="footer">
                        <span class="h6"><p align="center">Copyright <i class="far fa-copyright"></i> 2019 PJLP Ragunan Zoo. All rights reserved.</p></span>
                    </footer>
                </div>
