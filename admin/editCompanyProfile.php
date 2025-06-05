<?php 
$title = "Edit Company Profile | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$id = $_GET['id'];
	$decoded = $companyprofile->getDataByUid($id);   
	
	if (isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['editRep'])){   
		$BodyEng = $_POST['desc']; 
		$BodyInd = $_POST['desc2']; 

		$update = $companyprofile->updateDataByUID($BodyEng, $BodyInd, $date, $id);
		if($update){  
			echo "<script type='text/javascript'>alert('Company Profile Update Success');</script>";
		}else{
			echo "<script type='text/javascript'>alert('Company Profile Update Failed. PDF exsist');</script>";
		}	
		echo "<script type='text/javascript'>window.location='company-profile'</script>";
	} 
}else{
	echo "<script type='text/javascript'>window.location='index'</script>";
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
