<?php 
$title = "Edit News | Perdana Karya Perkasa, Tbk"; 
include 'include/header.php';

if($_SESSION['login'] == true) {
    $id = $_GET['id'];
    $decoded = $news->getDataByUid($id);  

	if (isset($_POST['titleEnglish']) && isset($_POST['NewsBodyEng']) && isset($_POST['titleIndonesia']) && isset($_POST['NewsBodyIndonesia']) && isset($_POST['desc2']) && isset($_POST['editNews'])){
		$desc = $_POST['desc2'];
		if(isset($_POST['main'])){ 
			$main = $_POST['main'];
		}
		else{ 
			$main=0;
		} 
		$titleEnglish = $_POST['titleEnglish'];
		$NewsBodyEnglish = $_POST['NewsBodyEng'];
		$titleIndonesia = $_POST['titleIndonesia'];
		$NewsBodyIndonesia = $_POST['NewsBodyIndonesia'];

        if(isset($_FILES["file2"]) && !empty($_FILES["file2"]["name"])){
            $ekstensi_diperbolehkan2 = array('jpg', 'png', 'jpeg');
            $nama2 = $_FILES['file2']['name'];
            $y = explode('.', $nama2);
            $ekstensi2 = strtolower(end($y));
            $ukuran2 = $_FILES['file2']['size'];
            $file_tmp2 = $_FILES['file2']['tmp_name'];

            if(in_array($ekstensi2, $ekstensi_diperbolehkan2) === true){
                if($ukuran2 < 150*MB){  
                    $update = $news->updateDataByUID($main, $titleEnglish, $NewsBodyEnglish, $titleIndonesia, $NewsBodyIndonesia, $nama2, $desc, $date, $id);
                    if($update){
                        move_uploaded_file($file_tmp2, 'assets/img/news/'.$nama2); 
                        chmod('assets/img/news/'.$nama2, 0777);
                        echo "<script type='text/javascript'>alert('News Added Success');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('News Added Failed. Image exsist');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('File Too Big');</script>";
                }
            }else{
                echo "<script type='text/javascript'>alert('Extension Is Not Allowed');</script>";
            }
        }else{
            $update = $news->updateDataWithoutFileByUID($main, $titleEnglish, $NewsBodyEnglish, $titleIndonesia, $NewsBodyIndonesia, $desc, $date, $id);
            if($update){
                echo "<script type='text/javascript'>alert('News Update Success');</script>";
            }else{
                echo "<script type='text/javascript'>alert('News Update Failed');</script>";
            }
        }
        echo "<script type='text/javascript'>window.location='newsroom'</script>";
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
                            <h1>Edit News</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">Home</a></li>
                                <li class="breadcrumb-item active">Edit News</li>
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
                                                <label for="exampleInputEmail1">News Image</label>
                                                <input type="file" id="file2" name="file2">
                                            </div>
											<div class="form-group">
												<label for="exampleInputEmail1">Main News?</label>
                                                <?php if($decoded[$x]['main_news'] == 1) { ?>
												    <input type="checkbox" name="main" value="0" checked/>
                                                <?php }else{ ?>
												    <input type="checkbox" name="main" value="1"/>
                                                <?php } ?>
											</div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <div class="form-group">
												<label for="exampleInputEmail1">News Title In English</label>
                                                <input type="text" name="titleEnglish" class="form-control" id="exampleInputOSName" titleEnglish="Ex: vission-&-mission" value="<?php echo $decoded[$x]['news_title_english']; ?>">
                                            </div>
                                            <div class="form-group">
												<label for="exampleInputEmail1">News Body In English</label>
												<textarea id="NewsBodyEnglish" name="NewsBodyEng" class="form-control" rows="10" cols="50" placeholder="Enter News Body in English"><?php echo $decoded[$x]['news_body_english']; ?></textarea>  
                                            </div>
                                        </div>
                                        <div class="card-body col-md-6">
                                            <div class="form-group">
												<label for="exampleInputEmail1">News Title In Indonesia</label>
                                                <input type="text" name="titleIndonesia" class="form-control" id="exampleInputOSName" placeholder="Ex: visi-&-misi" value="<?php echo $decoded[$x]['news_title_indonesia']; ?>">
                                            </div>
                                            <div class="form-group">
												<label for="exampleInputEmail1">News Body In Indonesia</label>
												<textarea id="NewsBodyIndonesia" name="NewsBodyIndonesia" class="form-control" rows="10" cols="50" placeholder="Enter News Body in Indonesia"><?php echo $decoded[$x]['news_body_indonesia']; ?></textarea>  
                                            </div>
                                        </div>
                                        <div class="card-body col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Remark</label>
                                                <textarea id="Remark" name="desc2" class="form-control" rows="4" cols="50" placeholder="Enter Remark"><?php echo $decoded[$x]['remark']; ?></textarea> 
                                            </div>
                                        </div>
                                    </div>  
                                        <div class="card-footer">
                                            <button type="submit" name="editNews" class="btn btn-primary">Submit</button>
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
