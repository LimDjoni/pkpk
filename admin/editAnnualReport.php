<?php 
$title = "Edit Annual Report | Paragon Karya Perkasa, Tbk"; 
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
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Edit Annual Report.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
    $id = (int) $_GET['id'];
    $decoded = $laporan->getDataByUid($id);  

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Title']) && isset($_POST['Judul']) && isset($_POST['Year']) && isset($_FILES['file2']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['editRep'])){ 
        function clean_input($data) {
			return htmlspecialchars(strip_tags(trim($data)));
		}
        
        $title = clean_input($_POST['Title']);
		$year = (int) $_POST['Year'];
		$desc = urlencode(clean_input($_POST['desc']));
		$judul = clean_input($_POST['Judul']);
		$deskripsi = urlencode(clean_input($_POST['desc2']));

        $file = false;    
        if(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){ 
            // Only allow PDFs by extension *and* MIME
            $allowedExts = ['pdf'];
            $allowedMime = ['application/pdf'];
            $tmpName = $_FILES['file2']['tmp_name'];
		    $ukuran2 = $_FILES['file2']['size'];
            $ext = strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION));
            $mime = mime_content_type($tmpName);

            if (in_array($ext, $allowedExts) && in_array($mime, $allowedMime)) {  
                if($ukuran2 < 150*MB){  
                    $newFilename = uniqid('Annual_Report_', true) . '.pdf';
                    move_uploaded_file($tmpName, "assets/pdf/Upload/$newFilename");
					chmod("assets/pdf/Upload/$newFilename", 0644); 
                    $file = true;       
                }else{
                    if ($ukuran2 >= 150 * MB) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload a too-large file for Annual Report ID $id.");
                        echo "<script type='text/javascript'>alert('File Too Big');</script>";
                    }
                }         
            } else{
                if (!in_array($ext, $allowedExts) || !in_array($mime, $allowedMime)) {
                    logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Annual Report ID $id.");
                }
			echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }
        if($file == true){ 
            $update = $laporan->updateDataByUID($judul, $title, $year, $desc, $deskripsi, $newFilename, $date, $id);
        }else{
            $update = $laporan->updateDataWithoutFileByUID($judul, $title, $year, $desc, $deskripsi, $date, $id);
        }
        
        if ($update) {
            logActivity("UPDATE", "Annual Report ID $id updated successfully" . ($file ? " with new file $newFilename." : " without file update."));
            echo "<script type='text/javascript'>alert('Annual Report Update Success');</script>";
        } else {
            logActivity("UPDATE_FAIL", "Failed to update Annual Report ID $id. Possibly duplicate PDF.");
            echo "<script type='text/javascript'>alert('Annual Report Update Failed. PDF exsist');</script>";
        }

        echo "<script type='text/javascript'>window.location='annual-report'</script>";
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
                            <h1>Edit Annual Report</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">Home</a></li>
                                <li class="breadcrumb-item active">Edit Annual Report</li>
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
                            <?php foreach($decoded as $dt) { ?>
                            <div class="card card-primary"> 
                                <!-- form start -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="card-body col-md-6">
                                            <label for="exampleInputEmail1">English</label>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" name="Title" class="form-control" id="exampleInputOSName" placeholder="Enter Title" value="<?php echo $dt['Title']; ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Year</label>
                                                <input type="number" name="Year" class="form-control" id="exampleInputOSName" placeholder="Enter Year" value="<?php echo $dt['Tahun']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select A Report</label>
                                                <input type="file" id="file2" name="file2">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
                                                <textarea id="Remark" name="desc" class="form-control" rows="4" cols="50" placeholder="Enter Description"><?php echo urldecode($dt['Des']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <label for="exampleInputEmail1">Indonesia</label>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Judul</label>
                                                <input type="text" name="Judul" class="form-control" id="exampleInputOSName" placeholder="Masukkan Judul" value="<?php echo $dt['Judul']; ?>">
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Deskripsi</label>
                                                <textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Description"><?php echo urldecode($dt['Deskripsi']); ?></textarea> 
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
