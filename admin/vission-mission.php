<?php 
$title = "Vission Mission | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$decoded = $vissionmission->getData();  
	
	// if (isset($_POST['vission']) && isset($_POST['visi']) && isset($_POST['mission']) && isset($_POST['misi']) && isset($_POST['motto']) && isset($_POST['moto']) && isset($_POST['phylosophy']) && isset($_POST['filosofi']) && isset($_POST['addFH'])){   
	// 	$Vission = $_POST['vission']; 
	// 	$Visi = $_POST['visi'];
	// 	$Mission = $_POST['mission'];
	// 	$Misi = $_POST['misi'];
	// 	$Motto = $_POST['motto'];
	// 	$Moto = $_POST['moto'];
	// 	$Phylosophy = $_POST['phylosophy'];
	// 	$Filosofi = $_POST['filosofi']; 

	// 	$add = $vissionmission->addReport($Vission, $Visi, $Mission, $Misi, $Motto, $Moto, $Phylosophy, $Filosofi, $date);
	// 	if($add){ 
	// 		echo "<script type='text/javascript'>alert('Vission Mission Added Success');</script>";
	// 	}else{
	// 		echo "<script type='text/javascript'>alert('Vission Mission Added Failed. PDF exsist');</script>";
	// 	}
	// 	echo "<script type='text/javascript'>window.location='vission-mission'</script>";
	// } 
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
												<label for="exampleInputEmail1">Vission</label>
												<textarea id="Remark" name="vission" class="form-control" rows="4" cols="50" placeholder="Enter Vission in English"></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Mission</label>
												<textarea id="Remark" name="mission" class="form-control" rows="4" cols="50" placeholder="Enter Mission in English"></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Motto</label>
												<textarea id="Remark" name="motto" class="form-control" rows="4" cols="50" placeholder="Enter Motto in English"></textarea> 
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Phylosophy</label>
												<textarea id="Remark" name="phylosophy" class="form-control" rows="4" cols="50" placeholder="Enter Phylosophy in English"></textarea> 
											</div> 
										</div> 
										<div class="card-body col-md-6"> 
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Visi</label>
												<textarea id="Remark" name="visi" class="form-control" rows="4" cols="50" placeholder="Enter Visi in Indonesia"></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Misi</label>
												<textarea id="Remark" name="misi" class="form-control" rows="4" cols="50" placeholder="Enter Misi in Indonesia"></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Moto</label>
												<textarea id="Remark" name="moto" class="form-control" rows="4" cols="50" placeholder="Enter Moto in Indonesia"></textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Filosofi</label>
												<textarea id="Remark" name="filosofi" class="form-control" rows="4" cols="50" placeholder="Enter Filosofi in Indonesia"></textarea> 
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
							<h1>Data Vission Mission</h1>
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
