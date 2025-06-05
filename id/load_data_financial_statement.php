<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/../Controller/financialStatementController.php'); 
    $financialStatement = new financialStatementController();
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
        $dataFS = $financialStatement->getDataLimitbyYear($startFrom, $perPage, $year);  
    }else{ 
        $dataFS = $financialStatement->getDataLimit($startFrom, $perPage);  
    }
 
    $paginationHtml = '';


    foreach($dataFS as $dtDFS) {
        $paginationHtml.='<tr>';  
        $paginationHtml.='<td style="text-align: center;"><img class="mx-auto" style="width:100px;" src="../img/file.png"></td>';
        $paginationHtml.='<td><b>'.$dtDFS['Tahun'].'</b><br /><a>'.$dtDFS['Judul'].'</a><br /><a style="font-size:14px">'.urldecode($dtDFS['Deskripsi']).'</a></td>';
        $paginationHtml.='<td style="text-align: center;"><a class="download" href="../admin/assets/pdf/FinancialStatement/'.$dtDFS['PDF'].'" target="_blank">Download</a></td>';  
        $paginationHtml.='</tr>';   
    }

    $jsonData = array(
        "html"  => $paginationHtml, 
    );
    
    echo json_encode($jsonData); 
?> 