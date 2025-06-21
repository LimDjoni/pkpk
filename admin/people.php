<?php 
$title = "People | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
	logActivity("CSRF_MISSING", "CSRF token missing in session.");
   	http_response_code(403);
   	exit('Invalid CSRF token.');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to View Management.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}
else {
	$decoded = $people->getData();    

	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file2']) && isset($_POST['Status']) && isset($_POST['Name']) && isset($_POST['Position']) && isset($_POST['Jabatan']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['addFH'])){ 
		function clean_input($data) {
			return htmlspecialchars(strip_tags(trim($data)));
		}

		$Status = clean_input($_POST['Status']);
		$Name = clean_input($_POST['Name']);
		$Position = clean_input($_POST['Position']);
		$Jabatan = clean_input($_POST['Jabatan']);
		$Des = urlencode(clean_input($_POST['desc']));
		$Deskripsi = urlencode(clean_input($_POST['desc2'])); 

		$allowedExts = ['png', 'jpg', 'jpeg'];
		$allowedMime = array('image/png', 'image/jpeg');
		$nama2       = $_FILES['file2']['name'];
		$ext         = strtolower(pathinfo($nama2, PATHINFO_EXTENSION));
		$mime        = mime_content_type($_FILES['file2']['tmp_name']);
		$ukuran2     = $_FILES['file2']['size'];
		$file_tmp2   = $_FILES['file2']['tmp_name']; 

		if (in_array($ext, $allowedExts) && in_array($mime, $allowedMime)) {
			if ($ukuran2 < 150 * 1024 * 1024) {
				$newFilename = uniqid('People_', true) . '.' . $ext;
				
				$add = $people->addReport($Name, $Jabatan, $Position, $Deskripsi, $Des, $newFilename, $Status, $date);
				if ($add) {
					move_uploaded_file($file_tmp2, "assets/img/people/$newFilename"); 
					chmod("assets/img/people/$newFilename", 0644); 
					logActivity("PEOPLE_ADD_SUCCESS", "People added: $newFilename by {$_SESSION['username']}");
					echo "<script type='text/javascript'>alert('People Added Success');</script>";
				}else{
					logActivity("PEOPLE_ADD_FAILED", "Duplicate or DB error on add.");
					echo "<script type='text/javascript'>alert('People Added Failed. PDF exsist');</script>";
				}
			}else{
				logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for People ID $id.");
				echo "<script type='text/javascript'>alert('File Too Big');</script>";
			}
		}else{
			if (!in_array($ext, $allowedExts) || !in_array($mime, $allowedMime)) {
				logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for People ID $id.");
			}
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
		}
		echo "<script type='text/javascript'>window.location='people'</script>";
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
							<h1>People</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="index">Home</a></li>
								<li class="breadcrumb-item active">People</li>
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
												<label for="exampleInputEmail1">Name</label>
												<input type="text" name="Name" class="form-control" id="exampleInputOSName" placeholder="Enter Name">
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Image</label>
												<input type="file" id="file2" name="file2" required>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Status</label>
												<select name="Status" class="form-control select2" style="width: 100%;"> 
													<option value="Direksi">Direksi</option> 
													<option value="Komisaris">Komisaris</option> 
													<option value="Komite Audit">Komite Audit</option> 
													<option value="Sekretaris Perusahaan">Sekretaris Perusahaan</option> 
												</select>  
											</div>
										</div>
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">English</label>
											<div class="form-group">
												<label for="exampleInputEmail1">Position</label>
												<input type="text" name="Position" class="form-control" id="exampleInputOSName" placeholder="Enter Name">
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Description</label>
												<textarea id="Remark" name="desc" class="form-control" rows="4" cols="50" placeholder="Enter Description"></textarea> 
											</div>
										</div>
										<div class="card-body col-md-6">
											<label for="exampleInputEmail1">Indonesia</label> 
											<div class="form-group">
												<label for="exampleInputEmail1">Jabatan</label>
												<input type="text" name="Jabatan" class="form-control" id="exampleInputOSName" placeholder="Masukkan Nama">
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
							<h1>Data People</h1>
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
									<h3 class="card-title">Data People</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">  
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>  
												<th>No.</th>  
												<th>Name</th>
												<th>Jabatan</th>
												<th>Position</th>
												<th>Description</th> 
												<th>Deskripsi</th> 
												<th>Status</th>  
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
													<td>-</td>  
												</tr> 
											<?php }else{  for ($x = 0; $x < count($decoded); $x++) { ?>   
												<tr>
													<th scope="row"><?php echo $no; ?></th>  
													<td><?php echo $decoded[$x]['Name']; ?></td>
													<td><?php echo $decoded[$x]['Jabatan']; ?></td> 
													<td><?php echo $decoded[$x]['Position']; ?></td>
													<td><?php echo urldecode($decoded[$x]['Des']); ?></td>
													<td><?php echo urldecode($decoded[$x]['Deskripsi']); ?></td> 
													<td><?php echo $decoded[$x]['Status']; ?></td> 
													<td><?php echo $decoded[$x]['Img']; ?></td> 
													<td>
														<a href="editpeople?id=<?php echo $decoded[$x]['ID_People']; ?>" name="edit" class="btn btn-primary">Edit</a> 
														<a href="#myModal" class="btn btn-danger" data-href="deletepeople?id=<?php echo $decoded[$x]['ID_People']; ?>" data-toggle="modal" data-target="#myModal">Delete</a> 
													</td>
												</tr>
												<?php $no++; }
											}?>
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>  
												<th>Name</th>
												<th>Jabatan</th>
												<th>Position</th>
												<th>Description</th> 
												<th>Deskripsi</th> 
												<th>Status</th>  
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
