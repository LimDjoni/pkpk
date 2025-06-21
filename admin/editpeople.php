<?php 
$title = "Edit People | Perdana Karya Perkasa, Tbk"; 
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
    $decoded = $people->getDataByUid($id);  

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file2']) && isset($_POST['Status']) && isset($_POST['Name']) && isset($_POST['Position']) && isset($_POST['Jabatan']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['editRep'])){ 
        function clean_input($data) {
			return htmlspecialchars(strip_tags(trim($data)));
		}

		$Status = clean_input($_POST['Status']);
		$Name = clean_input($_POST['Name']);
		$Position = clean_input($_POST['Position']);
		$Jabatan = clean_input($_POST['Jabatan']);
		$Des = urlencode(clean_input($_POST['desc']));
		$Deskripsi = urlencode(clean_input($_POST['desc2']));  

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
                    $newFilename = uniqid('People_', true) . '.' . $ext;
                    move_uploaded_file($tmpName, "assets/img/people/$newFilename");
					chmod("assets/img/people/$newFilename", 0644); 
                    $file = true;       
                }else{
                    if ($ukuran2 >= 150 * MB) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for People ID $id.");
                        echo "<script type='text/javascript'>alert('File Too Big');</script>";
                    }
                }         
            } else{
                if (!in_array($ext, $allowedExts) || !in_array($mime, $allowedMime)) {
                    logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for People ID $id.");
                }
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }

        if($file == true){ 
            $update = $people->updateDataByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $newFilename, $Status, $date, $id);
        }else{
            $update = $people->updateDataWithoutFileByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $Status, $date, $id);
        }
        
        if ($update) {
            logActivity("UPDATE", "People ID $id updated successfully" . ($file ? " with new file $newFilename." : " without file update."));
            echo "<script type='text/javascript'>alert('People Update Success');</script>";
        } else {
            logActivity("UPDATE_FAIL", "Failed to update People ID $id. Possibly duplicate PDF.");
            echo "<script type='text/javascript'>alert('People Update Failed. PDF exsist');</script>";
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
                            <h1>Edit People</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">Home</a></li>
                                <li class="breadcrumb-item active">Edit People</li>
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
                            <?php for ($x = 0; $x < count($decoded); $x++) { ?>  
                            <div class="card card-primary"> 
                                <!-- form start -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row"> 
                                        <div class="card-body col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" name="Name" class="form-control" id="exampleInputOSName" placeholder="Enter Name" value="<?php echo $decoded[$x]['Name']; ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <input type="file" id="file2" name="file2">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="Status" class="form-control select2" style="width: 100%;">  
                                                    <option value="<?php echo $decoded[$x]['Status']; ?>"><?php echo $decoded[$x]['Status']; ?></option>      
                                                <?php if($decoded[$x]['Status'] == "Direksi") { ?>
                                                    <option value="Komisaris">Komisaris</option> 
                                                    <option value="Komite Audit">Komite Audit</option> 
                                                    <option value="Sekretaris Perusahaan">Sekretaris Perusahaan</option>  
                                                <?php }elseif($decoded[$x]['Status'] == "Komisaris") { ?> 
                                                    <option value="Direksi">Direksi</option>  
                                                    <option value="Komite Audit">Komite Audit</option> 
                                                    <option value="Sekretaris Perusahaan">Sekretaris Perusahaan</option>  
                                                <?php }elseif($decoded[$x]['Status'] == "Komite Audit") { ?> 
                                                    <option value="Direksi">Direksi</option> 
                                                    <option value="Komisaris">Komisaris</option>  
                                                    <option value="Sekretaris Perusahaan">Sekretaris Perusahaan</option>  
                                                <?php }elseif($decoded[$x]['Status'] == "Sekretaris Perusahaan") { ?> 
                                                    <option value="Direksi">Direksi</option> 
                                                    <option value="Komisaris">Komisaris</option> 
                                                    <option value="Komite Audit">Komite Audit</option>   
                                                <?php }else {?> 
                                                    <option value="Direksi">Direksi</option> 
                                                    <option value="Komisaris">Komisaris</option> 
                                                    <option value="Komite Audit">Komite Audit</option> 
                                                    <option value="Sekretaris Perusahaan">Sekretaris Perusahaan</option> 
                                                <?php }?>
                                                </select>  
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <label for="exampleInputEmail1">English</label>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Position</label>
                                                <input type="text" name="Position" class="form-control" id="exampleInputOSName" placeholder="Enter Position"  value="<?php echo $decoded[$x]['Position']; ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
                                                <textarea id="Remark" name="desc" class="form-control" rows="4" cols="50" placeholder="Enter Description"><?php echo $decoded[$x]['Des']; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <label for="exampleInputEmail1">Indonesia</label> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jabatan</label>
                                                <input type="text" name="Jabatan" class="form-control" id="exampleInputOSName" placeholder="Masukkan Jabatan" value="<?php echo $decoded[$x]['Jabatan']; ?>">
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Deskripsi</label>
                                                <textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Description"><?php echo $decoded[$x]['Deskripsi']; ?></textarea> 
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="editRep" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
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

</html>
