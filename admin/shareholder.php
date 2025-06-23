<?php 
$title = "Shareholder | Paragon Karya Perkasa, Tbk"; 
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
	$decoded = $shareholder->getData();  
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['shareholder_name']) && isset($_POST['nama_pemegangsaham']) && isset($_POST['NOS']) && isset($_POST['percent']) && isset($_POST['addFH'])){   
		function clean_input($data) {
			return htmlspecialchars(strip_tags(trim($data)));
		}

		$shareholder_name = clean_input($_POST['shareholder_name']);
		$nama_pemegangsaham = clean_input($_POST['nama_pemegangsaham']); 
		$NOS = (int) $_POST['NOS'];
		$percent = (int) $_POST['percent']; 

		$add = $shareholder->addReport($shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date); 
		if ($add) {
			logActivity("UPDATE_SHAREHOLDER", "Shareholder ID $id updated successfully.");
			echo "<script>alert('Shareholder Update Success');</script>";
		} else {
			logActivity("UPDATE_FAILED", "Failed to update Shareholder ID $id.");
			echo "<script>alert('Shareholder Update Failed.');</script>";
		}  
		echo "<script type='text/javascript'>window.location='shareholder'</script>";
	} 
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
							<h1>Shareholder</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Shareholder</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
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
												<label for="exampleInputEmail1">Shareholder Name</label>
												<input type="text" name="shareholder_name" class="form-control" id="exampleInputOSName" placeholder="Enter Shareholder Name in English"> 
											</div>   
										</div> 
										<div class="card-body col-md-6"> 
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Pemegang Saham</label>
												<input type="text" name="nama_pemegangsaham" class="form-control" id="exampleInputOSName" placeholder="Enter Nama Pemegang Saham in Indonesia">
											</div>
										</div>
										<div class="card-body col-md-12"> 
											<div class="form-group">
												<label for="exampleInputEmail1">Number of Share</label>
												<input type="number" name="NOS" class="form-control" id="exampleInputOSName" placeholder="Enter Number of Share in English">
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Percent</label>
												<input type="number" step="any" name="percent" class="form-control" id="exampleInputOSName" placeholder="Enter Percent in Indonesia"> 
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
			</section>
			<!-- /.content -->

			<!-- Content Header (Page header) -->
			<!-- <section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Data Shareholder</h1>
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
									<h3 class="card-title">Data Shareholder</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">  
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr> 
												<th>No.</th>
												<th>Shareholder Name</th>
												<th>Nama Pemegang Saham</th>  
												<th>Number of Share</th>  
												<th>Percent</th>   
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
												</tr> 
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['shareholder_name']; ?></td>
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['nama_pemegangsaham']; ?></td>   
													<td style="white-space: pre-line;"><?php echo number_format($decoded[$x]['NOS'], 0, ',', '.'); ?></td>   
													<td style="white-space: pre-line;"><?php echo $decoded[$x]['percent']; ?></td>    
													<td>
														<a href="editshareholder?id=<?php echo $decoded[$x]['ID_SH']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<a href="#myModal" class="btn btn-danger" data-href="deleteshareholder?id=<?php echo $decoded[$x]['ID_SH']; ?>" data-toggle="modal" data-target="#myModal">Delete</a> 
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Shareholder Name</th>
												<th>Nama Pemegang Saham</th>  
												<th>Number of Share</th>  
												<th>Percent</th>     
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
