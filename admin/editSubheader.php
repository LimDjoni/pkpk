<?php 
$title = "Edit Subheader | Paragon Karya Perkasa, Tbk"; 
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
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Edit Subheader.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
	$id = (int) $_GET['id']; 
    $decoded = $subheaderCt->getDataByUid($id);  

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file2']) && isset($_POST['pageInd']) && isset($_POST['pageEng']) && isset($_POST['PageNameInd']) && isset($_POST['PageNameEng']) && isset($_POST['desc2']) && isset($_POST['editRep'])){ 
        function clean_input($data) {
			return htmlspecialchars(strip_tags(trim($data)));
		}

		$desc = urlencode(clean_input($_POST['desc2']));
		$pageEng = urlencode(clean_input($_POST['pageEng']));
		$pageInd = urlencode(clean_input($_POST['pageInd']));
		$PageNameInd = urlencode(clean_input($_POST['PageNameInd']));
		$PageNameEng = urlencode(clean_input($_POST['PageNameEng']));

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
                    $newFilename = uniqid('Subheader_', true) . '.' . $ext;
                    move_uploaded_file($tmpName, "assets/img/subheader/$newFilename");
					chmod("assets/img/subheader/$newFilename", 0644); 
                    $file = true;       
                }else{
                    if ($ukuran2 >= 150 * MB) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for Subheader ID $id.");
                        echo "<script type='text/javascript'>alert('File Too Big');</script>";
                    }
                }         
            } else{
                if (!in_array($ext, $allowedExts) || !in_array($mime, $allowedMime)) {
                    logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Subheader ID $id.");
                }
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }

        if($file == true){ 
            $update = $subheaderCt->updateDataByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $newFilename, $desc, $date, $id);
        }else{
            $update = $subheaderCt->updateDataWithoutFileByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $desc, $date, $id);
        }
        
        if ($update) {
            logActivity("UPDATE", "Subheader ID $id updated successfully" . ($file ? " with new file $newFilename." : " without file update."));
            echo "<script type='text/javascript'>alert('Subheader Update Success');</script>";
        } else {
            logActivity("UPDATE_FAIL", "Failed to update Subheader ID $id. Possibly duplicate PDF.");
            echo "<script type='text/javascript'>alert('Subheader Update Failed. PDF exsist');</script>";
        } 

        echo "<script type='text/javascript'>window.location='subheader'</script>";
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
                            <h1>Edit Subheader</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">Home</a></li>
                                <li class="breadcrumb-item active">Edit Subheader</li>
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
                                                <label for="exampleInputEmail1">Subheader</label>
                                                <input type="file" id="file2" name="file2">
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Page PHP English</label>
                                                <input type="text" name="pageEng" class="form-control" id="exampleInputOSName" placeholder="Ex: vission-&-mission" value="<?php echo $decoded[$x]['pageEng']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Page Name English</label>
                                                <input type="text" name="PageNameEng" class="form-control" id="exampleInputOSName" placeholder="Ex: vission & mission" value="<?php echo $decoded[$x]['PageNameEng']; ?>">
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Page PHP Indonesia</label>
                                                <input type="text" name="pageInd" class="form-control" id="exampleInputOSName" placeholder="Ex: visi-&-misi" value="<?php echo $decoded[$x]['pageInd']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Page Name Indonesia</label>
                                                <input type="text" name="PageNameInd" class="form-control" id="exampleInputOSName" placeholder="Ex: visi & misi" value="<?php echo $decoded[$x]['PageNameInd']; ?>">
                                            </div>
                                        </div>
                                        <div class="card-body col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Remark</label>
                                                <textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Description"><?php echo $decoded[$x]['description']; ?></textarea> 
                                            </div>
                                        </div>
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
