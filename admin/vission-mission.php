<?php 
$title = "Vission Mission | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
	logActivity("CSRF_MISSING", "CSRF token missing in session.");
   	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to View Vission Mission.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}
else {
	$decoded = $vissionmission->getData();   
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
							<h1>Vission Mission</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Vission Mission</li>
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
								<div class="card-header">
									<h3 class="card-title">Data Vission Mission</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">  
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr> 
												<th>No.</th>
												<th>Vission</th>
												<th>Visi</th>  
												<th>Mission</th>  
												<th>Misi</th>  
												<th>Motto</th>  
												<th>Moto</th>  
												<th>Phylosophy</th>  
												<th>Filosofi</th>  
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
												</tr> 
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['vission']; ?></td>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['visi']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['mission']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['misi']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['motto']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['moto']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['phylosophy']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['filosofi']; ?></td>   
													<td>
														<a href="editVissionMission?id=<?php echo $decoded[$x]['ID_VM']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<!-- <a href="#myModal" class="btn btn-danger" data-href="deletevissionmission?id=<?php echo $decoded[$x]['ID']; ?>" data-toggle="modal" data-target="#myModal">Delete</a>  -->
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Vission</th>
												<th>Visi</th>  
												<th>Mission</th>  
												<th>Misi</th>  
												<th>Motto</th>  
												<th>Moto</th>  
												<th>Phylosophy</th>  
												<th>Filosofi</th>  
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
