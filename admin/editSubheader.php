<?php 
$title = "Edit Subheader | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
    $id = $_GET['id'];
    $decoded = $subheaderCt->getDataByUid($id);  

    if (isset($_FILES['file2']) && isset($_POST['pageInd']) && isset($_POST['pageEng']) && isset($_POST['PageNameInd']) && isset($_POST['PageNameEng']) && isset($_POST['desc2']) && isset($_POST['editRep'])){ 
        $desc = $_POST['desc2'];
        $pageEng = $_POST['pageEng'];
        $pageInd = $_POST['pageInd'];
        $PageNameInd = $_POST['PageNameInd'];
        $PageNameEng = $_POST['PageNameEng'];

        if(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){
            $ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
            $nama2 = $_FILES['file2']['name'];
            $y = explode('.', $nama2);
            $ekstensi2 = strtolower(end($y));
            $ukuran2 = $_FILES['file2']['size'];
            $file_tmp2 = $_FILES['file2']['tmp_name'];

            if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
                if($ukuran2 < 150*MB){  
                    $update = $subheaderCt->updateDataByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $nama2, $desc, $date, $id);
                    if($update){
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
        }else{
            $update = $subheaderCt->updateDataWithoutFileByUID($pageInd, $pageEng, $PageNameInd, $PageNameEng, $desc, $date, $id);
            if($update){
                echo "<script type='text/javascript'>alert('Subheader Update Success');</script>";
            }else{
                echo "<script type='text/javascript'>alert('Subheader Update Failed. PDF exsist');</script>";
            }
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
