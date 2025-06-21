<?php 
$title = "Edit Company Profile | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

// Validate ID
if (!isset($_GET['id'])) {
    logActivity("MISSING_ID", "Missing 'id' in GET request.");
    http_response_code(400);
    exit('Invalid ID');
}

if (!is_numeric($_GET['id'])) {
    logActivity("INVALID_ID", "Invalid 'id' value in GET request: " . $_GET['id']);
    http_response_code(400);
    exit('Invalid ID');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Edit Company Profile.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
	$id = (int) $_GET['id'];
	$decoded = $companyprofile->getDataByUid($id);
	
	// Handle form submission
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['editRep'])) {
		$BodyEng = trim($_POST['desc'] ?? '');
		$BodyInd = trim($_POST['desc2'] ?? ''); 
		
		$update = $companyprofile->updateDataByUID($BodyEng, $BodyInd, $date, $id);

		if ($update) {
			logActivity("UPDATE_PROFILE", "Company Profile ID $id updated successfully.");
			echo "<script>alert('Company Profile Update Success');</script>";
		} else {
			logActivity("UPDATE_FAILED", "Failed to update Company Profile ID $id.");
			echo "<script>alert('Company Profile Update Failed.');</script>";
		} 
		echo "<script type='text/javascript'>window.location='company-profile'</script>";
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
							<h1>Edit Company Profile</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Edit Company Profile</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<!-- left column -->
						<div class="col-md-8">
							<!-- general form elements -->
							<?php for ($x = 0; $x < count($decoded); $x++) { ?>  
								<div class="card card-primary">  
									<!-- form start -->
									<form action="" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="card-body col-md-6">
												<label for="exampleInputEmail1">English</label>
												<div class="form-group">
													<label for="exampleInputEmail1">Body</label>
													<textarea id="Remark" name="desc" class="form-control" rows="4" cols="50" placeholder="Enter Body in English"><?php echo $decoded[$x]['body_eng']; ?></textarea> 
												</div> 
											</div> 
											<div class="card-body col-md-6"> 
												<label for="exampleInputEmail1">Indonesia</label> 
												<div class="form-group">
													<label for="exampleInputEmail1">Body</label>
													<textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Body in Indonesia"><?php echo $decoded[$x]['body_indo']; ?></textarea> 
												</div>
											</div>
											<!-- /.card-body -->
										</div>
										<div class="card-footer">
											<button type="submit" name="editRep" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							<?php } ?>
							<!-- /.card -->
						</div>
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
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
