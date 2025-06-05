<?php 
$title = "Home | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$decoded = $home->getData();  
	
	if (isset($_FILES['file']) && isset($_FILES['file2']) && isset($_POST['position']) && isset($_POST['addFH'])){  
		$position =  $_POST['position'];

		$ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
		$nama = $_FILES['file']['name'];
		$y = explode('.', $nama);
		$ekstensi = strtolower(end($y));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

		$nama2 = $_FILES['file2']['name'];
		$z = explode('.', $nama2);
		$ekstensi2 = strtolower(end($z));
		$ukuran2 = $_FILES['file2']['size'];
		$file_tmp2 = $_FILES['file2']['tmp_name'];

		if((in_array($ekstensi, $ekstensi_diperbolehkan2) === true) && (in_array($ekstensi2, $ekstensi_diperbolehkan2) === true)){ 
			if(($ukuran < 150*MB) && ($ukuran2 < 150*MB)){   
				$add = $home->addReport($nama, $nama2, $position, $date);
				if($add){  
					move_uploaded_file($file_tmp, 'assets/img/home/'.$nama); 
					move_uploaded_file($file_tmp2, 'assets/img/home/id/'.$nama2); 
					chmod('assets/img/home/'.$nama, 0777);
					chmod('assets/img/home/id/'.$nama2, 0777);
					echo "<script type='text/javascript'>alert('Home Added Success');</script>"; 
				}else{
					echo "<script type='text/javascript'>alert('Home Added Failed. PDF exsist');</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('File Too Big');</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
		}
		echo "<script type='text/javascript'>window.location='home'</script>";
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
							<h1>Home</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Home</li>
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
												<label for="exampleInputEmail1">English Image</label>
												<input type="file" id="file" name="file">
											</div>
										</div>
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">Indonesia</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Indonesia Image</label>
												<input type="file" id="file2" name="file2">
											</div>
										</div>
										<div class="card-body col-md-12">
											<div class="form-group"> 
												<label for="exampleInputEmail1">Position</label>
												<input type="number" name="position" class="form-control" id="exampleInputOSName" placeholder="Enter Position">
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
									<h3 class="card-title">Data Subheader</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">  
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr> 
												<th>No.</th> 
												<th>English Image</th>  
												<th>Indonesia Image</th>  
												<th>Position</th> 
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
												</tr> 
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th>
													<td><?php echo $decoded[$x]['ImgEng']; ?></td> 
													<td><?php echo $decoded[$x]['ImgIndo']; ?></td> 
													<td><?php echo $decoded[$x]['position']; ?></td>  
													<td>
														<a href="editHome?id=<?php echo $decoded[$x]['ID_HM']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<a href="#myModal" class="btn btn-danger" data-href="deleteHome?id=<?php echo $decoded[$x]['ID_HM']; ?>" data-toggle="modal" data-target="#myModal">Delete</a>
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th> 
												<th>English Image</th>  
												<th>Indonesia Image</th>  
												<th>Position</th> 
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
