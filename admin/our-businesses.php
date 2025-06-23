<?php 
$title = "Our Businesses | Paragon Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
	logActivity("CSRF_MISSING", "CSRF token missing in session.");
   	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to View Our Business.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}
else {
	$decoded = $ourBusinesses->getData();  
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
							<h1>Data Our Businesses</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Our Businesses</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<!-- <section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Create New Data</h3>
								</div>
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">English</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Mining</label>
												<textarea id="Remark" name="Mining" class="form-control" rows="4" cols="50" placeholder="Enter Mining in English"></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Equipment</label>
												<textarea id="Remark" name="Equipment" class="form-control" rows="4" cols="50" placeholder="Enter Equipment in English"></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Land Preparation</label>
												<textarea id="Remark" name="Land" class="form-control" rows="4" cols="50" placeholder="Enter Land Constriction in English"></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Construction</label>
												<textarea id="Remark" name="Construction" class="form-control" rows="4" cols="50" placeholder="Enter Construction in English"></textarea> 
											</div> 
										</div> 
										<div class="card-body col-md-6"> 
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Tambang</label>
												<textarea id="Remark" name="Tambang" class="form-control" rows="4" cols="50" placeholder="Enter Tambang in Indonesia"></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Perlengkapan</label>
												<textarea id="Remark" name="Perlengkapan" class="form-control" rows="4" cols="50" placeholder="Enter Perlengkapan in Indonesia"></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Persiapan Lahan</label>
												<textarea id="Remark" name="Lahan" class="form-control" rows="4" cols="50" placeholder="Enter Persiapan Lahan in Indonesia"></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Konstruksi</label>
												<textarea id="Remark" name="Konstruksi" class="form-control" rows="4" cols="50" placeholder="Enter Konstruksi in Indonesia"></textarea> 
											</div>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" name="addFH" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- /.content -->

			<!-- Content Header (Page header) -->
			<!-- <section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Data Our Businesses</h1>
						</div>
					</div>
				</div>
			</section> -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">  
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Our Businesses</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">  
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr> 
												<th>No.</th>
												<th>Mining</th>
												<th>Tambang</th>  
												<th>Equipment</th>  
												<th>Perlengkapan</th>  
												<th>Land</th>  
												<th>Lahan</th>  
												<th>Construction</th>  
												<th>Konstruksi</th>  
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
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['mining']; ?></td>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['tambang']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['equipment']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['perlengkapan']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['land']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['lahan']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['construction']; ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['konstruksi']; ?></td>   
													<td>
														<a href="editourBusinesses?id=<?php echo $decoded[$x]['ID_OB']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<!-- <a href="#myModal" class="btn btn-danger" data-href="deleteourBusinesses?id=<?php echo $decoded[$x]['ID_OB']; ?>" data-toggle="modal" data-target="#myModal">Delete</a>  -->
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Mining</th>
												<th>Tambang</th>  
												<th>Equipment</th>  
												<th>Perlengkapan</th>  
												<th>Land</th>  
												<th>Lahan</th>  
												<th>Construction</th>  
												<th>Konstruksi</th>  
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
