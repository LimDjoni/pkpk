<?php 
$title = "Edit Vission Mission | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$id = $_GET['id'];
	$decoded = $vissionmission->getDataByUid($id);   
	
	if (isset($_POST['vission']) && isset($_POST['visi']) && isset($_POST['mission']) && isset($_POST['misi']) && isset($_POST['motto']) && isset($_POST['moto']) && isset($_POST['phylosophy']) && isset($_POST['filosofi']) && isset($_POST['addFH'])){   
		$Vission = $_POST['vission']; 
		$Visi = $_POST['visi'];
		$Mission = $_POST['mission'];
		$Misi = $_POST['misi'];
		$Motto = $_POST['motto'];
		$Moto = $_POST['moto'];
		$Phylosophy = $_POST['phylosophy'];
		$Filosofi = $_POST['filosofi']; 
		
		$update = $vissionmission->updateDataByUID($Vission, $Visi, $Mission, $Misi, $Motto, $Moto, $Phylosophy, $Filosofi, $date, $id);
		if($update){  
			echo "<script type='text/javascript'>alert('Vission Mission Update Success');</script>";
		}else{
			echo "<script type='text/javascript'>alert('Vission Mission Update Failed. PDF exsist');</script>";
		}	
		echo "<script type='text/javascript'>window.location='vission-mission'</script>";
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
							<h1>Edit Vission Mission</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Edit Vission Mission</li>
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
												<label for="exampleInputEmail1">Vission</label>
												<textarea id="Remark" name="vission" class="form-control" rows="4" cols="50" placeholder="Enter Vission in English"><?php echo $decoded[$x]['vission']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Mission</label>
												<textarea id="Remark" name="mission" class="form-control" rows="4" cols="50" placeholder="Enter Mission in English"><?php echo $decoded[$x]['mission']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Motto</label>
												<textarea id="Remark" name="motto" class="form-control" rows="4" cols="50" placeholder="Enter Motto in English"><?php echo $decoded[$x]['motto']; ?></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Phylosophy</label>
												<textarea id="Remark" name="phylosophy" class="form-control" rows="4" cols="50" placeholder="Enter Phylosophy in English"><?php echo $decoded[$x]['phylosophy']; ?></textarea> 
											</div> 
										</div> 
										<div class="card-body col-md-6"> 
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Visi</label>
												<textarea id="Remark" name="visi" class="form-control" rows="4" cols="50" placeholder="Enter Visi in Indonesia"><?php echo $decoded[$x]['visi']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Misi</label>
												<textarea id="Remark" name="misi" class="form-control" rows="4" cols="50" placeholder="Enter Misi in Indonesia"><?php echo $decoded[$x]['misi']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Moto</label>
												<textarea id="Remark" name="moto" class="form-control" rows="4" cols="50" placeholder="Enter Moto in Indonesia"><?php echo $decoded[$x]['moto']; ?></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Filosofi</label>
												<textarea id="Remark" name="filosofi" class="form-control" rows="4" cols="50" placeholder="Enter Filosofi in Indonesia"><?php echo $decoded[$x]['filosofi']; ?></textarea> 
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
