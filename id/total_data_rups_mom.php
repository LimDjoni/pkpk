<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/../Controller/rupsMOMController.php');
    $rupsMom = new rupsMOMController();

    if(isset($_POST['year']) && $_POST['year'] != ""){
        $gmsMom = $rupsMom->getDatabyYear($_POST['year']);  
    }else{ 
        $gmsMom = $rupsMom->getData();  
    } 


    $perPage = 10;  
    $totalRecords = count($gmsMom);
    $totalPages = ceil($totalRecords/$perPage);

    $jsonData = array(
        "totalData"  => $totalPages, 
    );
    
    echo json_encode($jsonData); 
?> 