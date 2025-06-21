<?php 
$title = "Good Corporate Governance | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php';

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
    logActivity("CSRF_MISSING", "CSRF token missing in session.");
	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Add Good Corporate Governance.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
	$decoded = $gcg->getData();   
} 
?> 

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<?php 
		include 'include/navbar.php'
		?>

		<?php 
		include 'include/sidebar.php'
		?>  

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Data Good Corporate Governance</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Good Corporate Governance</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>  
			 
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">  
							<div class="card">
								<!-- /.card-header -->
								<div class="card-body">  
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr> 
												<th>No.</th>
												<th>Overview English</th>  
												<th>Overview Indonesia</th>  
												<th>Remuneration and Nominating Committee</th>
												<th>Komite Nominasi dan Remunerasi</th>  
												<th>Internal Audit Unit</th>  
												<th>Unit Audit Internal</th>  
												<th>Internal Control System</th>  
												<th>Sistem Pengendali Internal</th>  
												<th>Risk Management System</th>  
												<th>Sistem Manajemen Resiko</th>  
												<th>Code of Conduct</th>  
												<th>Kode Etik</th>  
												<th>Whistleblowing System</th>  
												<th>Sistem Pelaporan Pelanggaran</th>  
												<th>Information and Data Access</th>  
												<th>Akses Informasi dan Data</th>  
												<th>Action</th>  
											</tr>
										</thead>
										<tbody>
											<?php if(empty($decoded)) { ?>
												<tr>
													<td>-</td>
													<td>-</td>  
													<td>-</td>  
													<td>-</td>
													<td>-</td>  
													<td>-</td>
													<td>-</td>  
													<td>-</td>
													<td>-</td>  
													<td>-</td>
													<td>-</td>  
													<td>-</td>
													<td>-</td>  
													<td>-</td>
													<td>-</td>  
													<td>-</td>
													<td>-</td>  
													<td>-</td>
												</tr>
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['OverviewEng']; ?></td>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['OverviewInd']; ?></td>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['RaNEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['RaNInd']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['IAEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['IAInd']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['ICEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['ICInd']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['RMEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['RMInd']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['COCEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['COCInd']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['WhistleEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['WhistleInd']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['IaDEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['IaDInd']; ?></td>    
													<td>
														<a href="editGCG?id=<?php echo $decoded[$x]['ID_GCG']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<!-- <a href="#myModal" class="btn btn-danger" data-href="deleteGCG?id=<?php echo $decoded[$x]['ID_GCG']; ?>" data-toggle="modal" data-target="#myModal">Delete</a>  -->
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Overview English</th>  
												<th>Overview Indonesia</th>    
												<th>Remuneration and Nominating Committee</th>
												<th>Komite Nominasi dan Remunerasi</th>  
												<th>Internal Audit Unit</th>  
												<th>Unit Audit Internal</th>  
												<th>Internal Control System</th>  
												<th>Sistem Pengendali Internal</th>  
												<th>Risk Management System</th>  
												<th>Sistem Manajemen Resiko</th>  
												<th>Code of Conduct</th>  
												<th>Kode Etik</th>  
												<th>Whistleblowing System</th>  
												<th>Sistem Pelaporan Pelanggaran</th>  
												<th>Information and Data Access</th>  
												<th>Akses Informasi dan Data</th>  
												<th>Action</th>   
											</tr>
										</tfoot>
									</table> 
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>
			<!-- /.content -->


		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<?php 
		include 'include/footer.php'
		?>
	</div>
	<!-- ./wrapper -->

	<?php 
	include 'include/script.php'
	?>
</body>
</html>
