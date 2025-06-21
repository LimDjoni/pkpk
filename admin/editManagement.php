<?php 
$title = "Edit Management | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';
include_once 'include/logActivity.php'; // Add logging

// Validate ID
if (!isset($_GET['id'])) {
    logActivity("MISSING_ID", "Missing 'id' in GET request.");
    http_response_code(400);
    exit('Invalid ID');
}

if (!is_numeric($_GET['id'])) {
    logActivity("INVALID_ID", "Invalid 'id' value in GET request: " . $_GET['id']);
    http_response_code(400);
    exit('Invalid ID');
}

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Edit Management.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
	$id = (int) $_GET['id'];
	$decoded = $management->getDataByUid($id);   
	
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file2']) && isset($_POST['bocEng']) && isset($_POST['bocIndo']) && isset($_POST['bodEng']) && isset($_POST['bodIndo']) && isset($_POST['acEng']) && isset($_POST['acIndo']) && isset($_POST['csEng']) && isset($_POST['csIndo']) && isset($_POST['editRep'])){  
		$bocEng = trim($_POST['bocEng'] ?? ''); 
		$bocIndo = trim($_POST['bocIndo'] ?? ''); 
		$bodEng = trim($_POST['bodEng'] ?? ''); 
		$bodIndo = trim($_POST['bodIndo'] ?? ''); 
		$acEng = trim($_POST['acEng'] ?? ''); 
		$acIndo = trim($_POST['acIndo'] ?? ''); 
		$csEng = trim($_POST['csEng'] ?? ''); 
		$csIndo = trim($_POST['csIndo'] ?? '');  

		$file = false;       
        if(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){ 
            // Only allow PDFs by extension *and* MIME
			$allowedExts = ['png', 'jpg', 'jpeg'];
			$allowedMime = array('image/png', 'image/jpeg');
            $tmpName = $_FILES['file2']['tmp_name'];
		    $ukuran2 = $_FILES['file2']['size'];
            $ext = strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION));
            $mime = mime_content_type($tmpName);

            if (in_array($ext, $allowedExts) && in_array($mime, $allowedMime)) {  
                if($ukuran2 < 150*MB){  
                    $newFilename = uniqid('Management_', true) . '.' . $ext;
                    move_uploaded_file($tmpName, "assets/img/management/$newFilename");
					chmod("assets/img/management/$newFilename", 0644); 
                    $file = true;       
                }else{
                    if ($ukuran2 >= 150 * MB) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for Management ID $id.");
                        echo "<script type='text/javascript'>alert('File Too Big');</script>";
                    }
                }         
            } else{
                if (!in_array($ext, $allowedExts) || !in_array($mime, $allowedMime)) {
                    logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Management ID $id.");
                }
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }

        if($file == true){ 
            $update = $management->updateDataByUID($newFilename, $bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $date, $id);
        }else{
            $update = $management->updateDataWithoutFileByUID($bocEng, $bocIndo, $bodEng, $bodIndo, $acEng, $acIndo, $csEng, $csIndo, $date, $id);
        }
        
        if ($update) {
            logActivity("UPDATE", "Management ID $id updated successfully" . ($file ? " with new file $newFilename." : " without file update."));
            echo "<script type='text/javascript'>alert('Management Update Success');</script>";
        } else {
            logActivity("UPDATE_FAIL", "Failed to update Management ID $id. Possibly duplicate PDF.");
            echo "<script type='text/javascript'>alert('Management Update Failed. PDF exsist');</script>";
        } 

        echo "<script type='text/javascript'>window.location='management'</script>";
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
