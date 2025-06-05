<?php 
$title = "Edit Good Corporate Governance | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$id = $_GET['id'];
	$decoded = $gcg->getDataByUid($id);   
	
	if(isset($_POST['OverviewEng']) && isset($_POST['OverviewInd']) && isset($_POST['RaNEng']) && isset($_POST['RaNInd']) && isset($_POST['IAEng']) && isset($_POST['IAInd']) && isset($_POST['ICEng']) && isset($_POST['ICInd']) && isset($_POST['RMEng']) && isset($_POST['RMInd']) && isset($_POST['COCEng']) && isset($_POST['COCInd']) && isset($_POST['WhistleEng']) && isset($_POST['WhistleInd']) && isset($_POST['IaDEng']) && isset($_POST['IaDInd']) && isset($_POST['editRep'])){  
		$OverviewEng = $_POST['OverviewEng']; 
		$OverviewInd = $_POST['OverviewInd']; 
		$RaNEng = $_POST['RaNEng']; 
		$RaNInd = $_POST['RaNInd'];
		$IAEng = $_POST['IAEng'];
		$IAInd = $_POST['IAInd'];
		$ICEng = $_POST['ICEng'];
		$ICInd = $_POST['ICInd'];
		$RMEng = $_POST['RMEng'];
		$RMInd = $_POST['RMInd']; 
		$COCEng = $_POST['COCEng']; 
		$COCInd = $_POST['COCInd']; 
		$WhistleEng = $_POST['WhistleEng']; 
		$WhistleInd = $_POST['WhistleInd']; 
		$IaDEng = $_POST['IaDEng']; 
		$IaDInd = $_POST['IaDInd'];  
		
		$update = $gcg->updateDataByUID($OverviewEng, $OverviewInd, $RaNEng, $RaNInd, $IAEng, $IAInd, $ICEng, $ICInd, $RMEng, $RMInd, $COCEng, $COCInd, $WhistleEng, $WhistleInd, $IaDEng, $IaDInd, $date, $id);
		if($update){  
			echo "<script type='text/javascript'>alert('Good Corporate Governance Update Success');</script>";
		}else{
			echo "<script type='text/javascript'>alert('Good Corporate Governance Update Failed. PDF exsist');</script>";
		}	
		echo "<script type='text/javascript'>window.location='gcg'</script>";
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
							<h1>Edit Good Corporate Governance</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Edit Good Corporate Governance</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section> 

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<?php for ($x = 0; $x < count($decoded); $x++) { ?>  
							<div class="card card-primary"> 
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="row">  
										<div class="card-body col-md-6"> 
											<label for="exampleInputEmail1">English</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Overview</label>
												<textarea id="Remark" name="OverviewEng" class="form-control" rows="4" cols="50" placeholder="Enter Remuneration and Nominating Committee in English"><?php echo $decoded[$x]['OverviewEng']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Remuneration and Nominating Committee</label>
												<textarea id="Remark" name="RaNEng" class="form-control" rows="4" cols="50" placeholder="Enter Remuneration and Nominating Committee in English"><?php echo $decoded[$x]['RaNEng']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Internal Audit Unit</label>
												<textarea id="Remark" name="IAEng" class="form-control" rows="4" cols="50" placeholder="Enter Internal Audit Unit in English"><?php echo $decoded[$x]['IAEng']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Internal Control System</label>
												<textarea id="Remark" name="ICEng" class="form-control" rows="4" cols="50" placeholder="Enter Internal Control System in English"><?php echo $decoded[$x]['ICEng']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Risk Management System</label>
												<textarea id="Remark" name="RMEng" class="form-control" rows="4" cols="50" placeholder="Enter Risk Management System in English"><?php echo $decoded[$x]['RMEng']; ?></textarea> 
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Code of Conduct</label>
												<textarea id="Remark" name="COCEng" class="form-control" rows="4" cols="50" placeholder="Enter Code of Conduct in English"><?php echo $decoded[$x]['COCEng']; ?></textarea> 
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Whistleblowing System</label>
												<textarea id="Remark" name="WhistleEng" class="form-control" rows="4" cols="50" placeholder="Enter Whistleblowing System in English"><?php echo $decoded[$x]['WhistleEng']; ?></textarea> 
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Information and Data Access</label>
												<textarea id="Remark" name="IaDEng" class="form-control" rows="4" cols="50" placeholder="Enter Information and Data Access in English"><?php echo $decoded[$x]['IaDEng']; ?></textarea> 
											</div> 
										</div>
										<div class="card-body col-md-6">  
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Sekilas</label>
												<textarea id="Remark" name="OverviewInd" class="form-control" rows="4" cols="50" placeholder="Enter Komite Nominasi dan Remunerasi in Indonesia"><?php echo $decoded[$x]['OverviewInd']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Komite Nominasi dan Remunerasi</label>
												<textarea id="Remark" name="RaNInd" class="form-control" rows="4" cols="50" placeholder="Enter Komite Nominasi dan Remunerasi in Indonesia"><?php echo $decoded[$x]['RaNInd']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Unit Audit Internal</label>
												<textarea id="Remark" name="IAInd" class="form-control" rows="4" cols="50" placeholder="Enter Unit Audit Internal in Indonesia"><?php echo $decoded[$x]['IAInd']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Sistem Pengendali Internal</label>
												<textarea id="Remark" name="ICInd" class="form-control" rows="4" cols="50" placeholder="Enter Sistem Pengendali Internal in Indonesia"><?php echo $decoded[$x]['ICInd']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Sistem Manajemen Resiko</label>
												<textarea id="Remark" name="RMInd" class="form-control" rows="4" cols="50" placeholder="Enter Sistem Manajemen Resiko in Indonesia"><?php echo $decoded[$x]['RMInd']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Kode Etik</label>
												<textarea id="Remark" name="COCInd" class="form-control" rows="4" cols="50" placeholder="Enter Kode Etik in Indonesia"><?php echo $decoded[$x]['COCInd']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Sistem Pelaporan Pelanggaran</label>
												<textarea id="Remark" name="WhistleInd" class="form-control" rows="4" cols="50" placeholder="Enter Sistem Pelaporan Pelanggaran in Indonesia"><?php echo $decoded[$x]['WhistleInd']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Akses Informasi dan Data</label>
												<textarea id="Remark" name="IaDInd" class="form-control" rows="4" cols="50" placeholder="Enter Akses Informasi dan Data in Indonesia"><?php echo $decoded[$x]['IaDInd']; ?></textarea> 
											</div>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" name="editRep" class="btn btn-primary">Submit</button>
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
