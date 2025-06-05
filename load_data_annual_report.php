<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/Controller/laporanController.php');
    $laporan = new laporanController();
    $perPage = 10;
    $page = 0;

    if (isset($_POST['page']) && isset($_POST['year'])) { 
        $page  = $_POST['page']; 
        $year  = $_POST['year']; 
    } else { 
        $page=1;
        $year="";
    }; 

    $startFrom = ($page-1) * $perPage;   
    if(isset($_POST['year']) && $_POST['year'] != ""){
        $data = $laporan->getDataLimitbyYear($startFrom, $perPage, $year);  
    }else{  
        $data = $laporan->getDataLimit($startFrom, $perPage);  
    }
 
    $paginationHtml = '';


    foreach($data as $drAR) {
        $paginationHtml.='<tr>';  
        $paginationHtml.='<td style="text-align: center;"><img class="mx-auto" style="width:100px;" src="img/file.png"></td>';
        $paginationHtml.='<td><b>'.$drAR['Tahun'].'</b><br /><a>'.$drAR['Title'].'</a><br /><a style="font-size:14px">'.urldecode($drAR['Des']).'</a></td>';
        $paginationHtml.='<td style="text-align: center;"><a class="download" href="admin/assets/pdf/Upload/'.$drAR['PDF'].'" target="_blank">Download</a></td>';  
        $paginationHtml.='</tr>';   
    }

    $jsonData = array(
        "html"  => $paginationHtml, 
    );
    
    echo json_encode($jsonData); 
?> 