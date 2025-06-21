<?php 
$title = "Management | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
	logActivity("CSRF_MISSING", "CSRF token missing in session.");
   	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to View Management.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}
else {
	$decoded = $management->getData();  
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
							<h1>Data Management</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Management</li>
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
												<th>Overview</th>  
												<th>Board Of Commissioners</th>  
												<th>Dewan Komisaris</th>
												<th>Board of Directors</th>  
												<th>Direksi</th>  
												<th>Audit Comittee</th>  
												<th>Komite Audit</th>  
												<th>Corporate Secretary</th>  
												<th>Sekretaris Perusahaan</th>   
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
												</tr>
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['Overview']; ?></td>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['bocEng']; ?></td>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['bocIndo']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['bodEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['bodIndo']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['acEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['acIndo']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['csEng']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['csIndo']; ?></td>  
													<td>
														<a href="editManagement?id=<?php echo $decoded[$x]['ID_M']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<!-- <a href="#myModal" class="btn btn-danger" data-href="deleteGCG?id=<?php echo $decoded[$x]['ID_M']; ?>" data-toggle="modal" data-target="#myModal">Delete</a>  -->
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Overview</th>  
												<th>Board Of Commissioners</th>  
												<th>Dewan Komisaris</th>
												<th>Board of Directors</th>  
												<th>Direksi</th>  
												<th>Audit Comittee</th>  
												<th>Komite Audit</th>  
												<th>Corporate Secretary</th>  
												<th>Sekretaris Perusahaan</th>   
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
