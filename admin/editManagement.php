<?php 
$title = "Edit Management | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$id = $_GET['id'];
	$decoded = $management->getDataByUid($id);   
	
	if(isset($_FILES['file2']) && isset($_POST['bocEng']) && isset($_POST['bocIndo']) && isset($_POST['bodEng']) && isset($_POST['bodIndo']) && isset($_POST['acEng']) && isset($_POST['acIndo']) && isset($_POST['csEng']) && isset($_POST['csIndo']) && isset($_POST['editRep'])){  
		$bocEng = $_POST['bocEng'];
		$bocIndo = $_POST['bocIndo'];
		$bodEng = $_POST['bodEng'];
		$bodIndo = $_POST['bodIndo'];
		$acEng = $_POST['acEng'];
		$acIndo = $_POST['acIndo'];
		$csEng = $_POST['csEng'];
		$csIndo = $_POST['csIndo']; 

		if(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){
			$ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
			$nama2 = $_FILES['file2']['name'];
			$y = explode('.', $nama2);
			$ekstensi2 = strtolower(end($y));
			$ukuran2 = $_FILES['file2']['size'];
			$file_tmp2 = $_FILES['file2']['tmp_name'];

			if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
				if($ukuran2 < 150*MB){   
					$update = $management->updateDataByUID($nama2, $bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $date, $id);
					if($update){ 
						move_uploaded_file($file_tmp2, 'assets/img/management/'.$nama2); 
						chmod('assets/img/management/'.$nama2, 0777);
						echo "<script type='text/javascript'>alert('Management Update Success');</script>";
					}else{
						echo "<script type='text/javascript'>alert('Management Update Failed. PDF exsist');</script>";
					}
				}else{
					echo "<script type='text/javascript'>alert('File Too Big');</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
			}
		}else{
			$update = $management->updateDataWithoutFileByUID($bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $date, $id);
			if($update){ 
				echo "<script type='text/javascript'>alert('Management Update Success');</script>";
			}else{
				echo "<script type='text/javascript'>alert('Management Update Failed. PDF exsist');</script>";
			}
		}
		echo "<script type='text/javascript'>window.location='management'</script>";
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
							<h1>Edit Management</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Edit Management</li>
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
											<div class="card-body col-md-12">
												<div class="form-group">
													<label for="exampleInputEmail1">Overview</label>
													<input type="file" id="file2" name="file2">
												</div> 
											</div> 
											<div class="card-body col-md-6">
												<label for="exampleInputEmail1">English</label>
												<div class="form-group">
													<label for="exampleInputEmail1">Board Of Commissioners</label>
													<textarea id="Remark" name="bocEng" class="form-control" rows="4" cols="50" placeholder="Enter Board Of Commissioners in English"><?php echo $decoded[$x]['bocEng']; ?></textarea> 
												</div>  
												<div class="form-group">
													<label for="exampleInputEmail1">Board Of Directors</label>
													<textarea id="Remark" name="bodEng" class="form-control" rows="4" cols="50" placeholder="Enter Board Of Directors in English"><?php echo $decoded[$x]['bodEng']; ?></textarea> 
												</div>  
												<div class="form-group">
													<label for="exampleInputEmail1">Audit Comittee</label>
													<textarea id="Remark" name="acEng" class="form-control" rows="4" cols="50" placeholder="Enter Audit Comittee in English"><?php echo $decoded[$x]['acEng']; ?></textarea> 
												</div>  
												<div class="form-group">
													<label for="exampleInputEmail1">Corporate Secretary</label>
													<textarea id="Remark" name="csEng" class="form-control" rows="4" cols="50" placeholder="Enter Corporate Secretary in English"><?php echo $decoded[$x]['csEng']; ?></textarea> 
												</div>  
											</div>
											<div class="card-body col-md-6"> 
												<label for="exampleInputEmail1">Indonesia</label>  
												<div class="form-group">
													<label for="exampleInputEmail1">Dewan Komisioner</label>
													<textarea id="Remark" name="bocIndo" class="form-control" rows="4" cols="50" placeholder="Enter Dewan Komisioner in Indonesia"><?php echo $decoded[$x]['bocIndo']; ?></textarea> 
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">Direksi</label>
													<textarea id="Remark" name="bodIndo" class="form-control" rows="4" cols="50" placeholder="Enter Direksi in Indonesia"><?php echo $decoded[$x]['bodIndo']; ?></textarea> 
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">Komite Audit</label>
													<textarea id="Remark" name="acIndo" class="form-control" rows="4" cols="50" placeholder="Enter Komite Audit in Indonesia"><?php echo $decoded[$x]['acIndo']; ?></textarea> 
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">Sekretaris Perusahaan</label>
													<textarea id="Remark" name="csIndo" class="form-control" rows="4" cols="50" placeholder="Enter Sekretaris Perusahaan in Indonesia"><?php echo $decoded[$x]['csIndo']; ?></textarea> 
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
