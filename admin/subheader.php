<?php 
$title = "Subheader | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
	$decoded = $subheaderCt->getData();  
	
	if (isset($_FILES['file2']) && isset($_POST['pageInd']) && isset($_POST['pageEng']) && isset($_POST['PageNameInd']) && isset($_POST['PageNameEng']) && isset($_POST['desc2']) && isset($_POST['addFH'])){  
		$desc = $_POST['desc2'];
		$pageEng = $_POST['pageEng'];
		$pageInd = $_POST['pageInd'];
		$PageNameInd = $_POST['PageNameInd'];
		$PageNameEng = $_POST['PageNameEng'];

		$ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
		$nama2 = $_FILES['file2']['name'];
		$y = explode('.', $nama2);
		$ekstensi2 = strtolower(end($y));
		$ukuran2 = $_FILES['file2']['size'];
		$file_tmp2 = $_FILES['file2']['tmp_name'];

		if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
			if($ukuran2 < 150*MB){   
				$add = $subheaderCt->addReport($pageInd, $pageEng, $PageNameInd, $PageNameEng, $nama2, $desc, $date);
				if($add){ 
					move_uploaded_file($file_tmp2, 'assets/img/subheader/'.$nama2); 
					chmod('assets/img/subheader/'.$nama2, 0777);
					echo "<script type='text/javascript'>alert('Subheader Added Success');</script>";
				}else{
					echo "<script type='text/javascript'>alert('Subheader Added Failed. PDF exsist');</script>";
				}
			}else{
				echo "<script type='text/javascript'>alert('File Too Big');</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
		}
		echo "<script type='text/javascript'>window.location='subheader'</script>";
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
							<h1>Subheader</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Subheader</li>
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
												<label for="exampleInputEmail1">Subheader</label>
												<input type="file" id="file2" name="file2">
											</div>
										</div>
										<div class="card-body col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Page PHP English</label>
												<input type="text" name="pageEng" class="form-control" id="exampleInputOSName" placeholder="Ex: vission-&-mission">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Page Name English</label>
												<input type="text" name="PageNameEng" class="form-control" id="exampleInputOSName" placeholder="Ex: vission & mission">
											</div>
										</div>
										<div class="card-body col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Page PHP Indonesia</label>
												<input type="text" name="pageInd" class="form-control" id="exampleInputOSName" placeholder="Ex: visi-&-misi">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Page Name Indonesia</label>
												<input type="text" name="PageNameInd" class="form-control" id="exampleInputOSName" placeholder="Ex: visi & misi">
											</div>
										</div>
										<div class="card-body col-md-12">
											<div class="form-group">
												<label for="exampleInputEmail1">Remark</label>
												<textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Description"></textarea> 
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
												<th>Sub Header</th> 
												<th>Page PHP Eng</th> 
												<th>Page Name Eng</th> 
												<th>Page PHP Indo</th> 
												<th>Page Name Indo</th> 
												<th>Remark</th> 
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
												</tr> 
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th>
													<td><?php echo $decoded[$x]['sub_header']; ?></td> 
													<td><?php echo $decoded[$x]['pageEng']; ?></td> 
													<td><?php echo $decoded[$x]['PageNameEng']; ?></td> 
													<td><?php echo $decoded[$x]['pageInd']; ?></td> 
													<td><?php echo $decoded[$x]['PageNameInd']; ?></td> 
													<td><?php echo $decoded[$x]['description']; ?></td> 
													<td>
														<a href="editSubheader?id=<?php echo $decoded[$x]['ID']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<!-- <a href="#myModal" class="btn btn-danger" data-href="deleteSubheader?id=<?php echo $decoded[$x]['ID']; ?>" data-toggle="modal" data-target="#myModal">Delete</a>  -->
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Sub Header</th> 
												<th>Page PHP Eng</th> 
												<th>Page Name Eng</th> 
												<th>Page PHP Indo</th> 
												<th>Page Name Indo</th> 
												<th>Remark</th> 
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
