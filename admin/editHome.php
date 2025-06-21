<?php 
$title = "Edit Home | Perdana Karya Perkasa, Tbk"; 
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
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Edit Home.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit;
}else {
    $id = $_GET['id'];
    $decoded = $home->getDataByUid($id);  

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file']) && isset($_FILES['file2']) && isset($_POST['position']) && isset($_POST['editRep'])){ 
        $position = (int) $_POST['position'];
        $hasFile1 = isset($_FILES['file']) && !empty($_FILES['file']['name']);
        $hasFile2 = isset($_FILES['file2']) && !empty($_FILES['file2']['name']);
        $file = false;       

        // Only allow PDFs by extension *and* MIME
        $allowed_ext = ['png', 'jpg', 'jpeg'];
        $allowedMime = array('image/png', 'image/jpeg');
        $max_size = 150*MB;
        
        // Prepare file 1
        if ($hasFile1) {
            $nama = $_FILES['file']['name'];
            $tmp1 = $_FILES['file']['tmp_name'];
            $ukuran = $_FILES['file']['size'];
            $ext1 = strtolower(pathinfo($nama, PATHINFO_EXTENSION));
            // Use unique names to prevent overwrites or injection via name
            $newFilename1 = uniqid('Home_EN_', true) . '.' . $ext1;
            $dir1 = 'assets/img/home/' . $newFilename1;
            $mime1 = mime_content_type($tmp1);
        }

        // Prepare file 2
        if ($hasFile2) {
            $nama2 = $_FILES['file2']['name'];
            $tmp2 = $_FILES['file2']['tmp_name'];
            $ukuran2 = $_FILES['file2']['size'];
            $ext2 = strtolower(pathinfo($nama2, PATHINFO_EXTENSION));
            // Use unique names to prevent overwrites or injection via name
            $newFilename2 = uniqid('Home_IN_', true) . '.' . $ext2; 
            $dir2 = 'assets/img/home/id/' . $newFilename2;
            $mime2 = mime_content_type($tmp2);
        } 
        
        // Case 1: Both files provided
        if ($hasFile1 && $hasFile2) {
            if (in_array($ext1, $allowed_ext) && in_array($mime1, $allowedMime) && in_array($ext2, $allowed_ext) && in_array($mime2, $allowedMime)) {
                if ($ukuran < $max_size && $ukuran2 < $max_size) {
                    $update = $home->updateDataByUID($newFilename1, $newFilename2, $position, $date, $id);
                    if ($update) { 
                        move_uploaded_file($tmp1, $dir1);
                        move_uploaded_file($tmp2, $dir2);
                        chmod($dir1, 0644);
                        chmod($dir2, 0644);
					    logActivity("UPDATE", "Home update: $newFilename1 and $newFilename2 by {$_SESSION['username']}");
                        echo "<script>alert('Home Update Success');</script>";
                    } else {
                        logActivity("UPDATE_FAIL", "Failed to update Home ID $id. Possibly duplicate PDF.");
                        echo "<script>alert('Home Update Failed. Duplicate name?');</script>";
                    }
                } else {
                    if ($size1 >= $max_size) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload $newFilename1 too-large file for Home ID $id.");
                        echo "<script type='text/javascript'>alert('File $newFilename1 Too Big');</script>";
                    }
                    if ($size2 >= $max_size) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload $newFilename2 too-large file for Home ID $id.");
                        echo "<script type='text/javascript'>alert('File $newFilename2 Too Big');</script>";
                    }
                }
            } else {
                logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Home ID $id.");
                echo "<script>alert('Invalid Extension. Only JPG, JPEG, PNG allowed');</script>";
            }

        // Case 2: Only file 1 (English)
        } elseif ($hasFile1) {
            if (in_array($ext1, $allowed_ext) && in_array($mime1, $allowedMime)) {
                if ($ukuran < $max_size) {
                    $update = $home->updateDataImgEngByUID($newFilename1, $position, $date, $id);
                    if ($update) {
                        move_uploaded_file($tmp1, $dir1);
                        chmod($dir1, 0644);
					    logActivity("UPDATE", "Home update: $newFilename1 by {$_SESSION['username']}");
                        echo "<script>alert('Home Update Success');</script>";
                    } else {
                        logActivity("UPDATE_FAIL", "Failed to update Home ID $id. Possibly duplicate PDF.");
                        echo "<script>alert('Home Update Failed');</script>";
                    }
                } else { 
                    if ($size1 >= $max_size) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload $newFilename1 too-large file for Home ID $id.");
                        echo "<script type='text/javascript'>alert('File $newFilename1 Too Big');</script>";
                    }
                }
            } else {
                logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Home ID $id.");
                echo "<script>alert('Invalid Extension. Only JPG, JPEG, PNG allowed');</script>";
            }

        // Case 3: Only file 2 (Indonesian)
        } elseif ($hasFile2) {
            if (in_array($ext2, $allowed_ext) && in_array($mime2, $allowedMime)) {
                if ($ukuran2 < $max_size) {
                    $update = $home->updateDataImgIndoByUID($newFilename2, $position, $date, $id);
                    if ($update) {
                        move_uploaded_file($tmp2, $dir2);
                        chmod($dir2, 0644);
					    logActivity("UPDATE", "Home update: $newFilename2 by {$_SESSION['username']}");
                        echo "<script>alert('Home Update Success');</script>";
                    } else {
                        logActivity("UPDATE_FAIL", "Failed to update Home ID $id. Possibly duplicate PDF.");
                        echo "<script>alert('Home Update Failed');</script>";
                    }
                } else {
                    if ($size1 >= $max_size) {
                        logActivity("FILE_TOO_LARGE", "Attempted to upload $newFilename1 too-large file for Home ID $id.");
                        echo "<script type='text/javascript'>alert('File $newFilename1 Too Big');</script>";
                    }
                }
            } else {
                logActivity("INVALID_FILE", "Attempted upload with invalid file type or MIME for Home ID $id.");
                echo "<script>alert('Invalid Extension. Only JPG, JPEG, PNG allowed');</script>";
            }

        // Case 4: No file, only position
        } else {
            $update = $home->updateDataPositionByUID($position, $date, $id);
            if ($update) {
                logActivity("UPDATE", "Home update: image position $id by {$_SESSION['username']}");
                echo "<script>alert('Home Update Success');</script>";
            } else {
                logActivity("UPDATE_FAIL", "Failed to update Home ID $id. Possibly duplicate PDF.");
                echo "<script>alert('Home Update Failed');</script>";
            }
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
                            <h1>Edit Home</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">Home</a></li>
                                <li class="breadcrumb-item active">Edit Home</li>
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
                            <?php for ($x = 0; $x < count($decoded); $x++) { ?>  
                                <div class="card card-primary"> 
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="card-body col-md-6">
                                                <label for="exampleInputEmail1">English</label>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">English Image</label>
                                                    <input type="file" id="file" name="file">
                                                </div>
                                            </div>
                                            <div class="card-body col-md-6">
                                                <label for="exampleInputEmail1">Indonesia</label>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Indonesia Image</label>
                                                    <input type="file" id="file2" name="file2">
                                                </div>
                                            </div>
                                            <div class="card-body col-md-12">
                                                <div class="form-group"> 
                                                    <label for="exampleInputEmail1">Position</label>
                                                    <input type="number" name="position" class="form-control" id="exampleInputOSName" placeholder="Enter Position" value="<?php echo $decoded[$x]['position']; ?>">
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

</html>
