<?php 
$title = "Edit Shareholder | Perdana Karya Perkasa, Tbk"; 
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
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Edit Our Business	.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
	$id = (int) $_GET['id']; 
	$decoded = $shareholder->getDataByUid($id);   
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['shareholder_name']) && isset($_POST['nama_pemegangsaham']) && isset($_POST['NOS']) && isset($_POST['percent']) && isset($_POST['addFH'])){   
		function clean_input($data) {
			return htmlspecialchars(strip_tags(trim($data)));
		}

		$shareholder_name = clean_input($_POST['shareholder_name']);
		$nama_pemegangsaham = clean_input($_POST['nama_pemegangsaham']); 
		$NOS = (int) $_POST['NOS'];
		$percent = (int) $_POST['percent']; 
		
		$update = $shareholder->updateDataByUID($shareholder_name, $nama_pemegangsaham, $NOS, $percent, $date, $id);
		if ($update) {
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
							<h1>Edit Shareholder</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Edit Shareholder</li>
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
							<?php for ($x = 0; $x < count($decoded); $x++) { ?>  
							<div class="card card-primary"> 
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">English</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Shareholder Name</label>
												<input type="text" name="shareholder_name" class="form-control" id="exampleInputOSName" placeholder="Enter Shareholder Name in English" value="<?php echo $decoded[$x]['shareholder_name']; ?>"> 
											</div>   
										</div> 
										<div class="card-body col-md-6"> 
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Pemegang Saham</label>
												<input type="text" name="nama_pemegangsaham" class="form-control" id="exampleInputOSName" placeholder="Enter Nama Pemegang Saham in Indonesia" value="<?php echo $decoded[$x]['nama_pemegangsaham']; ?>"> 
											</div>
										</div>
										<div class="card-body col-md-12"> 
											<div class="form-group">
												<label for="exampleInputEmail1">Number of Share</label>
												<input type="number" name="NOS" class="form-control" id="exampleInputOSName" placeholder="Enter Number of Share in English" value="<?php echo $decoded[$x]['NOS']; ?>"> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Percent</label>
												<input type="number" step="any" name="percent" class="form-control" id="exampleInputOSName" placeholder="Enter Percent in Indonesia" value="<?php echo $decoded[$x]['percent']; ?>"> 
											</div>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" name="addFH" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
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
