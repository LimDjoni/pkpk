<?php 
$title = "Edit People | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
    $id = $_GET['id'];
    $decoded = $people->getDataByUid($id);  

    if ( isset($_FILES['file2']) && isset($_POST['Status']) && isset($_POST['Name']) && isset($_POST['Position']) && isset($_POST['Jabatan']) && isset($_POST['desc']) && isset($_POST['desc2']) && isset($_POST['editRep'])){ 
        $Status = $_POST['Status'];
        $Name = $_POST['Name'];
        $Position = $_POST['Position'];
        $Jabatan = $_POST['Jabatan']; 
        $Des = $_POST['desc']; 
        $Deskripsi = $_POST['desc2']; 

        if(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){
        $ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
        $nama2 = $_FILES['file2']['name'];
        $y = explode('.', $nama2);
        $ekstensi2 = strtolower(end($y));
        $ukuran2 = $_FILES['file2']['size'];
        $file_tmp2 = $_FILES['file2']['tmp_name'];

        if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
            if($ukuran2 < 150*MB){    
                    $update = $people->updateDataByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $nama2, $Status, $date, $id);
                    if($update){
                        move_uploaded_file($file_tmp2, 'assets/pdf/people/'.$nama2); 
                        chmod('assets/pdf/people/'.$nama2, 0777);
                        echo "<script type='text/javascript'>alert('People Update Success');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('People Update Failed. PDF exsist');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('File Too Big');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }else{
            $update = $people->updateDataWithoutFileByUID($Name, $Jabatan, $Position, $Deskripsi, $Des, $Status, $date, $id);
            if($update){
                echo "<script type='text/javascript'>alert('People Update Success');</script>";
            }else{
                echo "<script type='text/javascript'>alert('People Update Failed. PDF exsist');</script>";
            }
        }
        echo "<script type='text/javascript'>window.location='people'</script>";
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
