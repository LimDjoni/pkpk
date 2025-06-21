<?php 
$title = "Disclosure Information | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php';

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
    logActivity("CSRF_MISSING", "CSRF token missing in session.");
	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Add Disclosure Information.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
	$decoded = $disclosure->getData(); 
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Title']) && isset($_POST['Judul']) && isset($_POST['Year']) && isset($_FILES['file2']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['addFH'])){ 
		$title     = htmlspecialchars(trim($_POST['Title']));
		$year      = (int)$_POST['Year'];
		$desc      = urlencode(htmlspecialchars(trim($_POST['desc'])));
		$judul     = htmlspecialchars(trim($_POST['Judul']));
		$deskripsi = urlencode(htmlspecialchars(trim($_POST['desc2'])));

		$allowedExts = ['pdf'];
		$allowedMime = ['application/pdf'];
		$nama2       = $_FILES['file2']['name'];
		$ext         = strtolower(pathinfo($nama2, PATHINFO_EXTENSION));
		$mime        = mime_content_type($_FILES['file2']['tmp_name']);
		$ukuran2     = $_FILES['file2']['size'];
		$file_tmp2   = $_FILES['file2']['tmp_name'];

		if (in_array($ext, $allowedExts) && in_array($mime, $allowedMime)) {
			if ($ukuran2 < 150 * 1024 * 1024) {
				$newFilename = uniqid('Disclosure_Information_', true) . '.pdf';

				$add = $disclosure->addReport($judul, $title, $year, $desc, $deskripsi, $newFilename, $date);
				if ($add) {
					move_uploaded_file($file_tmp2, "assets/pdf/disclosure/$newFilename");
					chmod("assets/pdf/disclosure/$newFilename", 0644);
					logActivity("DISCLOSURE_ADD_SUCCESS", "Disclosure added: $newFilename by {$_SESSION['username']}");
					echo "<script>alert('Disclosure Information Added Successfully');</script>";
				} else {
					logActivity("DISCLOSURE_ADD_FAILED", "Duplicate or DB error on add.");
					echo "<script>alert('Disclosure Information Failed. PDF might already exist');</script>";
				}
			} else {
				logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for Disclosure Information ID $id.");
				echo "<script>alert('File too large');</script>";
			}
		} else {
			if (!in_array($ext, $allowedExts) || !in_array($mime, $allowedMime)) {
				logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Annual Report ID $id.");
			}
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
		}
		echo "<script>window.location='disclosure'</script>";
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
							<h1>Disclosure Information </h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">Disclosure Information </li>
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
							<h1>Data Disclosure Information </h1>
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
									<h3 class="card-title">Data Disclosure Information </h3>
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
														<a href="editdisclosure?id=<?php echo $decoded[$x]['ID_Laporan']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<a href="#myModal" class="btn btn-danger" data-href="deletedisclosure?id=<?php echo $decoded[$x]['ID_Laporan']; ?>" data-toggle="modal" data-target="#myModal">Delete</a> 
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
