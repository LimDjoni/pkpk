<?php 
$title = "Growth Journey | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$decoded = $growthjc->getData();   
	
	if (isset($_POST['Title']) && isset($_POST['Judul']) && isset($_POST['Year']) && isset($_FILES['file2']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['addFH'])){ 
		$title = $_POST['Title'];
		$year = $_POST['Year'];
		$desc = $_POST['desc'];
		$judul = $_POST['Judul'];
		$deskripsi = $_POST['desc2']; 

		$ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
		$nama2 = $_FILES['file2']['name'];
		$y = explode('.', $nama2);
		$ekstensi2 = strtolower(end($y));
		$ukuran2 = $_FILES['file2']['size'];
		$file_tmp2 = $_FILES['file2']['tmp_name'];

		if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
			if($ukuran2 < 150*MB){    
				$add = $growthjc->addReport($judul, $title, $year, $desc, $deskripsi, $nama2, $date);
				if($add){  
					move_uploaded_file($file_tmp2, 'assets/img/growthjourney/'.$nama2); 
					chmod('assets/img/growthjourney/'.$nama2, 0777);
					echo "<script type='text/javascript'>alert('Growth Journey Added Success');</script>";
				}else{
					echo "<script type='text/javascript'>alert('Growth Journey Added Failed. PDF exsist');</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('File Too Big');</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
		}
		echo "<script type='text/javascript'>window.location='growth-journey'</script>";
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
							<h1>Growth Journey</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Growth Journey</li>
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
										<div class="card-body col-md-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Cover</label>
												<input type="file" id="file2" name="file2">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Year</label>
												<input type="number" name="Year" class="form-control" id="exampleInputOSName" placeholder="Enter Year">
											</div>
										</div>
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">English</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Title</label>
												<input type="text" name="Title" class="form-control" id="exampleInputOSName" placeholder="Enter Title">
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Description</label>
												<textarea id="Remark" name="desc" class="form-control" rows="4" cols="50" placeholder="Enter Description"></textarea> 
											</div>
										</div>
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">Indonesia</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Judul</label>
												<input type="text" name="Judul" class="form-control" id="exampleInputOSName" placeholder="Masukkan Judul">
											</div>  
											<div class="form-group">
												<label for="exampleInputEmail1">Deskripsi</label>
												<textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Description"></textarea> 
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
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Data Growth Journey</h1>
						</div>
					</div>
				</div>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">  
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Growth Journey</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">  
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr> 
												<th>No.</th> 
												<th>Title</th>
												<th>Judul</th>
												<th>Year</th>
												<th>Description</th> 
												<th>Deskripsi</th> 
												<th>Img</th>  
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
												</tr> 
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th> 
													<td><?php echo $decoded[$x]['title']; ?></td>
													<td><?php echo $decoded[$x]['Judul']; ?></td>
													<td><?php echo $decoded[$x]['Tahun']; ?></td> 
													<td><?php echo urldecode($decoded[$x]['Des']); ?></td> 
													<td><?php echo urldecode($decoded[$x]['Deskripsi']); ?></td>
													<td><?php echo $decoded[$x]['PDF']; ?></td>
													<td>
														<a href="editGrowthJourney?id=<?php echo $decoded[$x]['ID_GJ']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<!-- <a href="#myModal" class="btn btn-danger" data-href="deleteGrowthJourney?id=<?php echo $decoded[$x]['ID_GJ']; ?>" data-toggle="modal" data-target="#myModal">Delete</a>  -->
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th> 
												<th>Title</th>
												<th>Judul</th>
												<th>Year</th>
												<th>Description</th> 
												<th>Deskripsi</th> 
												<th>Img</th>  
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
