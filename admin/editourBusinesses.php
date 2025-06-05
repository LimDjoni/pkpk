<?php 
$title = "Edit Our Businesses | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$id = $_GET['id'];
	$decoded = $ourBusinesses->getDataByUid($id);   
	
	if (isset($_POST['Mining']) && isset($_POST['Tambang']) && isset($_POST['Equipment']) && isset($_POST['Perlengkapan']) && isset($_POST['Land']) && isset($_POST['Lahan']) && isset($_POST['Construction']) && isset($_POST['Konstruksi']) && isset($_POST['addFH'])){   
		$Mining = $_POST['Mining']; 
		$Tambang = $_POST['Tambang'];
		$Equipment = $_POST['Equipment'];
		$Perlengkapan = $_POST['Perlengkapan'];
		$Land = $_POST['Land'];
		$Lahan = $_POST['Lahan'];
		$Construction = $_POST['Construction'];
		$Konstruksi = $_POST['Konstruksi']; 
		
		$update = $ourBusinesses->updateDataByUID($Mining, $Tambang, $Equipment, $Perlengkapan, $Land, $Lahan, $Construction, $Konstruksi, $date, $id);
		if($update){  
			echo "<script type='text/javascript'>alert('Our Businesses Update Success');</script>";
		}else{
			echo "<script type='text/javascript'>alert('Our Businesses Update Failed. PDF exsist');</script>";
		}	
		echo "<script type='text/javascript'>window.location='our-businesses'</script>";
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
							<h1>Edit Our Businesses</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Edit Our Businesses</li>
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
												<label for="exampleInputEmail1">Mining</label>
												<textarea id="Remark" name="Mining" class="form-control" rows="4" cols="50" placeholder="Enter Mining in English"><?php echo $decoded[$x]['mining']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Equipment</label>
												<textarea id="Remark" name="Equipment" class="form-control" rows="4" cols="50" placeholder="Enter Equipment in English"><?php echo $decoded[$x]['equipment']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Land Preparation</label>
												<textarea id="Remark" name="Land" class="form-control" rows="4" cols="50" placeholder="Enter Land Preparation in English"><?php echo $decoded[$x]['land']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Construction</label>
												<textarea id="Remark" name="Construction" class="form-control" rows="4" cols="50" placeholder="Enter Construction in English"><?php echo $decoded[$x]['construction']; ?></textarea> 
											</div> 
										</div> 
										<div class="card-body col-md-6"> 
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Tambang</label>
												<textarea id="Remark" name="Tambang" class="form-control" rows="4" cols="50" placeholder="Enter Tambang in Indonesia"><?php echo $decoded[$x]['tambang']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Perlengkapan</label>
												<textarea id="Remark" name="Perlengkapan" class="form-control" rows="4" cols="50" placeholder="Enter Perlengkapan in Indonesia"><?php echo $decoded[$x]['perlengkapan']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Persiapan Lahan</label>
												<textarea id="Remark" name="Lahan" class="form-control" rows="4" cols="50" placeholder="Enter Persiapan Lahan in Indonesia"><?php echo $decoded[$x]['lahan']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Konstruksi</label>
												<textarea id="Remark" name="Konstruksi" class="form-control" rows="4" cols="50" placeholder="Enter Konstruksi in Indonesia"><?php echo $decoded[$x]['konstruksi']; ?></textarea> 
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
