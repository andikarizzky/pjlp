<?php  
ob_start();
include "../../../fungsi/koneksi.php";
$query2 = mysqli_query($koneksi, "SELECT NIP, tgl_permintaan, Akses, Keterangan, count(status) AS jumlah2 FROM permintaan WHERE status=0"); 
$data2 = mysqli_fetch_assoc($query2);
?>
<?php 
session_start();
ob_start();
if($_SESSION['level']==""){
	header("location:../../../index.php?pesan=login");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>PJLP</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../../assets/images/logoragunan.jpg" type="image/x-icon"/>
	<script src="../../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../../../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<script src="../../../assets/js/plugin/chart.js/Chart.bundle.js"></script>
	<link rel="stylesheet" href="../../../assets/preloader/templatemo-style.css">
	<script>
		var renderPage = true;

		if(navigator.userAgent.indexOf('MSIE')!==-1
			|| navigator.appVersion.indexOf('Trident/') > 0){
			/* Microsoft Internet Explorer detected in. */
		alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
		renderPage = false;
	}
</script>
<script src="../../../assets/js/plugin/chart.js/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../../assets/css/atlantis.min.css">
<link href="../../../assets/datepicker/jquery-ui.css" rel="stylesheet">
<link href="../../../assets/datepicker/cangas.datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="../../../assets/time/css/bootstrap-material-datetimepicker.css" />
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="../../../assets/time/js/bootstrap-material-datetimepicker.js"></script>
</head>
<body>
	<!-- Preloader -->
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
	<div class="wrapper sidebar_minimize">
		<header class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<?php
						include "../../../fungsi/koneksi.php";
						$query = mysqli_query($koneksi, "SELECT NIP, jamManual, komentar, catatan, Keterangan, Akses, jam FROM permintaan WHERE NIP= '$_SESSION[username]' AND status=2 ORDER BY id_permintaan DESC limit 5");	
						$row = mysqli_fetch_array($query);
						$query2 = mysqli_query($koneksi, "SELECT NIP, komentar, tgl_permintaan, Akses, Keterangan, count(status) AS jumlah2 FROM permintaan WHERE status=2 AND NIP= '$_SESSION[username]'"); 
						$data2 = mysqli_fetch_assoc($query2);
						$query3 = mysqli_query($koneksi, "SELECT gambar, NIP, tgl_permintaan, Akses, Keterangan, count(status) AS jumlah3 FROM permintaan WHERE status=2 AND NIP= '$_SESSION[username]'"); 
						$data3 = mysqli_fetch_assoc($query3);
						echo
						"<li class='nav-item dropdown hidden-caret'>
						<a class='nav-link dropdown-toggle' href='#' id='messageDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" .
						"<i class='fa fa-bell'>".	
						"<span class='notification'>" . $data2["jumlah2"] .
						"</span>" .						
						"</i>". 
						"</a> ".										
						"<ul class='dropdown-menu messages-notif-box animated fadeIn' aria-labelledby='messageDropdown'>".
						"<li> ".
						"<div class='message-notif-scroll scrollbar-outer'> ".
						"<div class='notif-center'> ".
						"<div class='dropdown-title'>"."Ada"." ".$data3["jumlah3"]." "."Laporan"." Di Tolak "."</div>".
						"<a href='index.php?p=datapesananTolak'>".
						"<div class='notif-img'>" .
						"<img src='../../../assets/images/logoragunan.jpg' alt='Img Profile'>" .
						"</div>" .
						"<div class='notif-content'>" .
						"<span class='subject'>". "Admin Komentar : " . "</span>" . 
						"<span class='subject'>". '<p class="text-danger">'. $row["komentar"].'</p>' . "</span>" .
						"<span class='block'>".  "Waktu Laporan : " . "</span>" .
						"<span class='block'>".  $row["jamManual"] . "</span>" .
						"</div>" .
						"</a>" .'</br/>';
						$row = mysqli_fetch_array($query);
						echo
						"<a href='index.php?p=datapesananTolak'>".
						"<div class='notif-img'>" .
						"<img src='../../../assets/images/logoragunan.jpg' alt='Img Profile'>" .
						"</div>" .
						"<div class='notif-content'>" .
						"<span class='subject'>". "Admin Komentar : " . "</span>" . 
						"<span class='subject'>". '<p class="text-danger">'. $row["komentar"].'</p>' . "</span>" .
						"<span class='block'>".  "Waktu Laporan : " . "</span>" .
						"<span class='block'>".  $row["jamManual"] . "</span>" .
						"</div>" .
						"</a>" .'</br/>';
						$row = mysqli_fetch_array($query);
						echo
						"<a href='index.php?p=datapesananTolak'>".
						"<div class='notif-img'>" .
						"<img src='../../../assets/images/logoragunan.jpg' alt='Img Profile'>" .
						"</div>" .
						"<div class='notif-content'>" .
						"<span class='subject'>". "Admin Komentar : " . "</span>" . 
						"<span class='subject'>". '<p class="text-danger">'. $row["komentar"].'</p>' . "</span>" .
						"<span class='block'>".  "Waktu Laporan : " . "</span>" .
						"<span class='block'>".  $row["jamManual"] . "</span>" .
						"</div>" .
						"</a>" .'</br/>';
						$row = mysqli_fetch_array($query);
						echo
						"<a href='index.php?p=datapesananTolak'>".
						"<div class='notif-img'>" .
						"<img src='../../../assets/images/logoragunan.jpg' alt='Img Profile'>" .
						"</div>" .
						"<div class='notif-content'>" .
						"<span class='subject'>". "Admin Komentar : " . "</span>" . 
						"<span class='subject'>". '<p class="text-danger">'. $row["komentar"].'</p>' . "</span>" .
						"<span class='block'>".  "Waktu Laporan : " . "</span>" .
						"<span class='block'>".  $row["jamManual"] . "</span>" .
						"</div>" .
						"</a>" .'</br/>';
						$row = mysqli_fetch_array($query);
						echo
						"<a href='index.php?p=datapesananTolak'>".
						"<div class='notif-img'>" .
						"<img src='../../../assets/images/logoragunan.jpg' alt='Img Profile'>" .
						"</div>" .
						"<div class='notif-content'>" .
						"<span class='subject'>". "Admin Komentar : " . "</span>" . 
						"<span class='subject'>". '<p class="text-danger">'. $row["komentar"].'</p>' . "</span>" .
						"<span class='block'>".  "Waktu Laporan : " . "</span>" .
						"<span class='block'>".  $row["jamManual"] . "</span>" .
						"</div>" .
						"</a>" .'</br/>';
						"</a>" .'</br/>';
						"</div>" .
						"</div>" .
						"</li>" .
						"</ul>" .
						"</li>"
						?>
					</ul>
					<li class="nav-item dropdown hidden-caret">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
							<div class="avatar-sm">
								<?php 
								include '../../../fungsi/koneksi.php';
								$cek = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]' ");
								$result = mysqli_num_rows($cek);
								$data = mysqli_fetch_array($cek);
								?>									
								<img src="../../staf3/foto/<?php echo $data['foto'];?>" alt="..." class="avatar-img rounded-circle">
							</div>
						</a>
						<ul class="dropdown-menu dropdown-user animated fadeIn">
							<div class="dropdown-user-scroll scrollbar-outer">
								<li>
									<div class="user-box">
										<?php 
										include '../../../fungsi/koneksi.php';
										$cek      = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]' ");
										$result   = mysqli_num_rows($cek);
										$data = mysqli_fetch_array($cek);
										?>											
										<div class="avatar-lg"><img src="../../staf3/foto/<?php echo $data['foto'];?>" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>
												<?php echo $data['NamaPegawai'];?>				
											</h4>
											<p class="text-muted"><?php echo $data['level'];?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<?php 
									include '../../../fungsi/koneksi.php';
									$cek = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]' ");
									$result = mysqli_num_rows($cek);
									$data = mysqli_fetch_array($cek);
									?>
									<a href="?p=myProfile&id=<?= $data['id_user']; ?>" class="btn btn-xs btn-secondary btn-sm">Profile Saya</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="../../../logout.php">Logout</a>
								</li>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- End Navbar -->
	<?php 
	include '../../../fungsi/koneksi.php';
	$cek = mysqli_query($koneksi, "select * from user where username='$_SESSION[username]' ");
	$result = mysqli_num_rows($cek);
	$data = mysqli_fetch_array($cek);
	?>
	<!-- Sidebar -->
	<aside class="sidebar sidebar-style-2">			
		<div class="sidebar-wrapper scrollbar scrollbar-inner">
			<div class="sidebar-content">
				<div class="user">
					<div class="avatar-sm float-left mr-2">
						<img src="../../staf3/foto/<?php echo $data['foto'];?>" alt="..." class="avatar-img rounded-circle">
					</div>
					<div class="info">
						<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							<span>
								<?php echo $data['NamaPegawai'];?>
								<span class="user-level"><?php echo $data['level'];?></span>
							</span>
						</a>
						<div class="clearfix"></div>
					</div>
				</div>
				<ul class="nav nav-primary">
					<li class="nav-item active">
						<a class="collapse" href="index.php" class="collapsed" aria-expanded="false" id="dashboard">
							<i class="fas fa-home"></i>
							<p>Home</p>
						</a>
					</li>
					<li class="nav-item active submenu">
						<a data-toggle="collapse" href="#forms">
							<i class="fas fa-pen-square"></i>
							<p>Laporan</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="forms">
							<ul class="nav nav-collapse">
								<li>
									<a href="index.php?p=datapesanan">
										<span class="sub-item">Data Laporan</span>
									</a>
									<a href="index.php?p=formpesan">
										<span class="sub-item">Buat Laporan</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item active submenu">
						<a data-toggle="collapse" href="#custompages" class="collapsed" aria-expanded="false">
							<i class="fas fa-handshake"></i>
							<p>Admin Validasi</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="custompages" style="">
							<ul class="nav nav-collapse">
								<li>
									<a href="index.php?p=datapesananTunggu">
										<span class="sub-item">Laporan Tunggu</span>
									</a>
									<a href="index.php?p=datapesananTolak">
										<span class="sub-item">Laporan Tolak</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item active">
						<a data-toggle="collapse" href="#tables">
							<i class="fas fa-clipboard-check"></i>
							<p>Di Setujui</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="tables">
							<ul class="nav nav-collapse">
								<li>
									<a href="index.php?p=cetakpesanan">
										<span class="sub-item">Laporan Di Setujui</span>
									</a>
								</li>
							</ul>
						</div>
					</li>						
				</ul>
			</div>
		</div>
	</aside>
	<!-- End Sidebar -->
	<!-- Content Header (Page header) -->
	<?php 
	include "page.php"; 
	?>
	<script src="../../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../../assets/js/core/popper.min.js"></script>
	<script src="../../../assets/js/core/bootstrap.min.js"></script>
	<script src="../../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="../../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="../../../assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="../../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="../../../assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="../../../assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="../../../assets/js/atlantis.min.js"></script>
	<script src="../../../assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="../../../assets/datepicker/jquery-ui.js"></script>
	<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="../../../assets/time/js/bootstrap-material-datetimepicker.js"></script>
	<!-- DAta Tables Script -->
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});
			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});
			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
	<!--Widgets Page Script -->
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		<?php
		include "../../../fungsi/koneksi.php";
		$tunggu       = mysqli_query($koneksi, "SELECT count(id_permintaan) AS jumlah0 FROM permintaan where status=0 AND NIP='$_SESSION[username]' ");
		$tolak       = mysqli_query($koneksi, "SELECT count(id_permintaan) AS jumlah1 FROM permintaan where status=2 AND NIP='$_SESSION[username]' ");
		$terima       = mysqli_query($koneksi, "SELECT count(id_permintaan) AS jumlah2 FROM permintaan where status=1 AND NIP='$_SESSION[username]' ");
		?>		
		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');
		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["Tunggu","Tolak","Terima"],
				datasets : [{
					label: "Total Laporan",
					backgroundColor: '#FFD700',
					borderColor: 'rgb(23, 125, 255)',
					data: [<?php while ($b = mysqli_fetch_array($tunggu)) { echo '"' . $b['jumlah0'] . '",';}?><?php while ($c = mysqli_fetch_array($tolak)) { echo '"' . $c['jumlah1'] . '",';}?><?php while ($d = mysqli_fetch_array($terima)) { echo '"' . $d['jumlah2'] . '"';}?>],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});
		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
		<?php
		include "../../../fungsi/koneksi.php";
		$tunggu1       = mysqli_query($koneksi, "SELECT count(id_permintaan) AS jumlah01 FROM permintaan where status=0 AND NIP='$_SESSION[username]' ");
		$tolak1       = mysqli_query($koneksi, "SELECT count(id_permintaan) AS jumlah11 FROM permintaan where status=2 AND NIP='$_SESSION[username]' ");
		$terima1       = mysqli_query($koneksi, "SELECT count(id_permintaan) AS jumlah21 FROM permintaan where status=1 AND NIP='$_SESSION[username]' ");
		?>
		var myDoughnutChart = new Chart(doughnutChart, {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [<?php while ($A = mysqli_fetch_array($tunggu1)) { echo '"' . $A['jumlah01'] . '",';}?><?php while ($C = mysqli_fetch_array($terima1)) { echo '"' . $C['jumlah21'] . '",';}?><?php while ($B = mysqli_fetch_array($tolak1)) { echo '"' . $B['jumlah11'] . '",';}?>],
					backgroundColor: ['#fdaf4b','#00FF00','#f3545d']
				}],
				labels: [
				'Tunggu',
				'Terima',
				'Tolak'
				]
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend : {
					position: 'bottom'
				},
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		});
	</script>
	<script>
		$(function(){
			if(renderPage) {
				$('body').addClass('loaded');
			}
    	$('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright
    });
</script>
</body>
</html>