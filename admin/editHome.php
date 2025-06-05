<?php 
$title = "Edit Home | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
    $id = $_GET['id'];
    $decoded = $home->getDataByUid($id);  

    if (isset($_FILES['file']) && isset($_FILES['file2']) && isset($_POST['position']) && isset($_POST['editRep'])){ 
        $position =  $_POST['position'];

        $ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
        $nama = $_FILES['file']['name'];
        $y = explode('.', $nama);
        $ekstensi = strtolower(end($y));
        $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $nama2 = $_FILES['file2']['name'];
        $z = explode('.', $nama2);
        $ekstensi2 = strtolower(end($z));
        $ukuran2 = $_FILES['file2']['size'];
        $file_tmp2 = $_FILES['file2']['tmp_name'];

        if((isset($_FILES["file"]) && !empty($_FILES["file"]["name"])) && (isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"]))){
            if((in_array($ekstensi, $ekstensi_diperbolehkan2) === true) && (in_array($ekstensi2, $ekstensi_diperbolehkan2) === true)){ 
                if(($ukuran < 150*MB) && ($ukuran2 < 150*MB)){   
                    $update = $home->updateDataByUID($nama, $nama2, $position, $date, $id);
                    if($update){
                        move_uploaded_file($file_tmp, 'assets/img/home/'.$nama); 
                        move_uploaded_file($file_tmp2, 'assets/img/home/id/'.$nama2); 
                        chmod('assets/img/home/'.$nama, 0777);
                        chmod('assets/img/home/id/'.$nama2, 0777);
                        echo "<script type='text/javascript'>alert('Home Update Success');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Home Update Failed. PDF exsist');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('File Too Big');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }elseif(isset($_FILES["file"]) && !empty($_FILES["file"]["name"])){
            if(in_array($ekstensi, $ekstensi_diperbolehkan2) === true){ 
                if($ukuran < 150*MB){   
                    $update = $home->updateDataImgEngByUID($nama, $position, $date, $id);
                    if($update){
                        move_uploaded_file($file_tmp, 'assets/img/home/'.$nama);  
                        chmod('assets/img/home/'.$nama, 0777); 
                        echo "<script type='text/javascript'>alert('Home Update Success');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Home Update Failed. PDF exsist');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('File Too Big');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }elseif(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){
            if (in_array($ekstensi2, $ekstensi_diperbolehkan2) === true) {
                if($ukuran2 < 150*MB){   
                    $update = $home->updateDataImgIndoByUID($nama2, $position, $date, $id);
                    if($update){
                        move_uploaded_file($file_tmp2, 'assets/img/home/id/'.$nama2); 
                        chmod('assets/img/home/id/'.$nama2, 0777);
                        echo "<script type='text/javascript'>alert('Home Update Success');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Home Update Failed. PDF exsist');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('File Too Big');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }else{
            $update = $home->updateDataPositionByUID($position, $date, $id);
            if($update){
                echo "<script type='text/javascript'>alert('Home Update Success');</script>";
            }else{
                echo "<script type='text/javascript'>alert('Home Update Failed. PDF exsist');</script>";
            }
        }
        echo "<script type='text/javascript'>window.location='home'</script>";
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
