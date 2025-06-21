<?php 
$title = "Home | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
	logActivity("CSRF_MISSING", "CSRF token missing in session.");
   	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Add Home.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}
else { 
	$decoded = $home->getData();  
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file']) && isset($_FILES['file2']) && isset($_POST['position']) && isset($_POST['addFH'])){  
		$position =  (int) $_POST['position'];

		$allowedExts = ['png', 'jpg', 'jpeg'];
		$allowedMime = array('image/png', 'image/jpeg');
		$mime        = mime_content_type($_FILES['file2']['tmp_name']);
    	$max_size = 150 * 1024 * 1024; // 150MB in bytes
		
		// === File 1 ===
		$nama = $_FILES['file']['name'];
		$tmp1 = $_FILES['file']['tmp_name'];
		$size1 = $_FILES['file']['size'];
		$ext1 = strtolower(pathinfo($nama, PATHINFO_EXTENSION));

		// === File 2 ===
		$nama2 = $_FILES['file2']['name'];
		$tmp2 = $_FILES['file2']['tmp_name'];
		$size2 = $_FILES['file2']['size'];
		$ext2 = strtolower(pathinfo($nama2, PATHINFO_EXTENSION));

		if (in_array($ext1, $allowedExts) && in_array($ext2, $allowedExts) && in_array($mime, $allowedMime)) {
        	if ($size1 < $max_size && $size2 < $max_size) {
				// Use unique names to prevent overwrites or injection via name
				$newFilename1 = uniqid('Home_EN_', true) . '.' . $ext1;
				$newFilename2 = uniqid('Home_IN_', true) . '.' . $ext2; 

				$dir1 = 'assets/img/home/' . $newFilename1;
				$dir2 = 'assets/img/home/id/' . $newFilename2;

				$add = $home->addReport($newFilename1, $newFilename2, $position, $date);
				if ($add) {
					move_uploaded_file($tmp1, $dir1);
					move_uploaded_file($tmp2, $dir2);
					chmod($dir1, 0644);
					chmod($dir2, 0644);
					logActivity("HOME_ADD_SUCCESS", "Home added: $newFilename1 and $newFilename2 by {$_SESSION['username']}");
					echo "<script type='text/javascript'>alert('Home Added Success');</script>";
				}else{
					logActivity("HOME_ADD_FAILED", "Duplicate or DB error on add.");
					echo "<script type='text/javascript'>alert('Home Added Failed. img exsist');</script>";
				}
			}else{
				logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for Home ID $id.");
				echo "<script type='text/javascript'>alert('File Too Big');</script>";
			}
		}else{
			if (in_array($ext1, $allowedExts) && in_array($ext2, $allowedExts) && in_array($mime, $allowedMime)) {
				logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Home ID $id.");
			}
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
		}
		echo "<script type='text/javascript'>window.location='home'</script>";
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
												<input type="file" id="file" name="file" required>
											</div>
										</div>
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">Indonesia</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Indonesia Image</label>
												<input type="file" id="file2" name="file2" required>
											</div>
										</div>
										<div class="card-body col-md-12">
											<div class="form-group"> 
												<label for="exampleInputEmail1">Position</label>
												<input type="number" name="position" class="form-control" id="exampleInputOSName" placeholder="Enter Position" required>
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
