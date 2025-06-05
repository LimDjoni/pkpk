<?php 
$title = "Edit Growth Journey | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
    $id = $_GET['id'];
    $decoded = $growthjc->getDataByUid($id);  

    if (isset($_POST['Title']) && isset($_POST['Judul']) && isset($_POST['Year']) && isset($_FILES['file2']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['editRep'])){ 
        $title = $_POST['Title'];
        $year = $_POST['Year'];
        $desc = $_POST['desc'];
        $judul = $_POST['Judul'];
        $deskripsi = $_POST['desc2']; 

        if(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){
        $ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
        $nama2 = $_FILES['file2']['name'];
        $y = explode('.', $nama2);
        $ekstensi2 = strtolower(end($y));
        $ukuran2 = $_FILES['file2']['size'];
        $file_tmp2 = $_FILES['file2']['tmp_name'];

        if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
                if($ukuran2 < 150*MB){  
                    $update = $growthjc->updateDataByUID($judul, $title, $year, $desc, $deskripsi, $nama2, $date, $id);
                    if($update){
                        move_uploaded_file($file_tmp2, 'assets/img/growthjourney/'.$nama2); 
                        chmod('assets/img/growthjourney/'.$nama2, 0777);
                        echo "<script type='text/javascript'>alert('Growth Journey Update Success');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Growth Journey Update Failed. PDF exsist');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('File Too Big');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }else{
            $update = $growthjc->updateDataWithoutFileByUID($judul, $title, $year, $desc, $deskripsi, $date, $id);
            if($update){
               echo "<script type='text/javascript'>alert('Growth Journey Update Success');</script>";
            }else{
                echo "<script type='text/javascript'>alert('Growth Journey Update Failed. PDF exsist');</script>";
            }
        }
        echo "<script type='text/javascript'>window.location='growth-journey'</script>";
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
                            <h1>Edit Growth Journey</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">Home</a></li>
                                <li class="breadcrumb-item active">Edit Growth Journey</li>
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
                                                <label for="exampleInputEmail1">Cover</label>
                                                <input type="file" id="file2" name="file2">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Year</label>
                                                <input type="number" name="Year" class="form-control" id="exampleInputOSName" placeholder="Enter Year" value="<?php echo $decoded[$x]['Tahun']; ?>">
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <label for="exampleInputEmail1">English</label>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" name="Title" class="form-control" id="exampleInputOSName" placeholder="Enter Title" value="<?php echo $decoded[$x]['title']; ?>">
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
                                                <textarea id="Remark" name="desc" class="form-control" rows="4" cols="50" placeholder="Enter Description"><?php echo $decoded[$x]['Des']; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <label for="exampleInputEmail1">Indonesia</label>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Judul</label>
                                                <input type="text" name="Judul" class="form-control" id="exampleInputOSName" placeholder="Masukkan Judul" value="<?php echo $decoded[$x]['Judul']; ?>">
                                            </div>  
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Deskripsi</label>
                                                <textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Description"><?php echo $decoded[$x]['Deskripsi']; ?></textarea> 
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
