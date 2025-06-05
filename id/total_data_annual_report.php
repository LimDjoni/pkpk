<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/../Controller/laporanController.php');
    $laporan = new laporanController();

    if(isset($_POST['year']) && $_POST['year'] != ""){
        $data = $laporan->getDatabyYear($_POST['year']);  
    }else{ 
        $data = $laporan->getData();  
    } 


    $perPage = 10;  
    $totalRecords = count($data);
    $totalPages = ceil($totalRecords/$perPage);

    $jsonData = array(
        "totalData"  => $totalPages, 
    );
    
    echo json_encode($jsonData); 
?> 