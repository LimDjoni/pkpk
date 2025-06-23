<?php 
$title = "GMS Invitation | Paragon Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
	logActivity("CSRF_MISSING", "CSRF token missing in session.");
   	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Add RUPS Invitation.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}
else {
	$decoded = $rupsInv->getData(); 
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Title']) && isset($_POST['Judul']) && isset($_POST['Year']) && isset($_FILES['file2']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['addFH'])){ 
		function clean_input($data) {
			return htmlspecialchars(strip_tags(trim($data)));
		}

		$title = clean_input($_POST['Title']);
		$year = (int) $_POST['Year'];
		$desc = urlencode(clean_input($_POST['desc']));
		$judul = clean_input($_POST['Judul']);
		$deskripsi = urlencode(clean_input($_POST['desc2']));

		$allowedExts = ['pdf'];
		$allowedMime = ['application/pdf'];
		$nama2       = $_FILES['file2']['name'];
		$ext         = strtolower(pathinfo($nama2, PATHINFO_EXTENSION));
		$mime        = mime_content_type($_FILES['file2']['tmp_name']);
		$ukuran2     = $_FILES['file2']['size'];
		$file_tmp2   = $_FILES['file2']['tmp_name'];

		if (in_array($ext, $allowedExts) && in_array($mime, $allowedMime)) {
			if ($ukuran2 < 150 * 1024 * 1024) {
				$newFilename = uniqid('RUPS_Invitation_', true) . '.pdf'; 
			
				$add = $rupsInv->addReport($judul, $title, $year, $desc, $deskripsi, $uniqueName, $date);
				if ($add) {
					move_uploaded_file($file_tmp2, "assets/pdf/rupsInv/$newFilename");
					chmod("assets/pdf/rupsInv/$newFilename", 0644);  
					logActivity("RUPS_INVITATION_ADD_SUCCESS", "RUPS Invitation added: $newFilename by {$_SESSION['username']}");  
					echo "<script type='text/javascript'>alert('RUPS Invitation Added Success');</script>";
				}else{
					logActivity("RUPS_INVITATION_ADD_FAILED", "Duplicate or DB error on add.");
					echo "<script type='text/javascript'>alert('RUPS Invitation Added Failed. PDF exsist');</script>";
				}
			}else{
				logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for RUPS Invitation ID $id.");
				echo "<script type='text/javascript'>alert('File Too Big');</script>";
			}
		}else{
			if (!in_array($ext, $allowedExts) || !in_array($mime, $allowedMime)) {
				logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for RUPS Invitation ID $id.");
			}
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
		}
		echo "<script type='text/javascript'>window.location='gms-invitation'</script>";
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
							<h1>GMS Invitation</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">GMS Invitation</li>
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
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Create New Data</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">English</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Title</label>
												<input type="text" name="Title" class="form-control" id="exampleInputOSName" placeholder="Enter Title">
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Year</label>
												<input type="number" name="Year" class="form-control" id="exampleInputOSName" placeholder="Enter Year">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Select A Report</label>
												<input type="file" id="file2" name="file2">
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
										<!-- /.card-body -->
									</div>
									<div class="card-footer">
										<button type="submit" name="addFH" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
							<!-- /.card -->
						</div>
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->

			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Data GMS Invitation</h1>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">  
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data GMS Invitation</h3>
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
												<th>PDF</th>  
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
													<td><?php echo $decoded[$x]['Title']; ?></td>
													<td><?php echo $decoded[$x]['Judul']; ?></td>
													<td><?php echo $decoded[$x]['Tahun']; ?></td> 
													<td><?php echo urldecode($decoded[$x]['Des']); ?></td> 
													<td><?php echo urldecode($decoded[$x]['Deskripsi']); ?></td>
													<td><?php echo $decoded[$x]['PDF']; ?></td>
													<td>
														<a href="editrupsInv?id=<?php echo $decoded[$x]['ID_Laporan']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<a href="#myModal" class="btn btn-danger" data-href="deleterupsInv?id=<?php echo $decoded[$x]['ID_Laporan']; ?>" data-toggle="modal" data-target="#myModal">Delete</a> 
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
												<th>PDF</th>  
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
