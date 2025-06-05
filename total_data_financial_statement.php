<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/Controller/financialStatementController.php'); 
    $financialStatement = new financialStatementController();

    if(isset($_POST['year']) && $_POST['year'] != ""){
        $dataFS = $financialStatement->getDatabyYear($_POST['year']);  
    }else{ 
        $dataFS = $financialStatement->getData();  
    } 


    $perPage = 10;  
    $totalRecords = count($dataFS);
    $totalPages = ceil($totalRecords/$perPage);

    $jsonData = array(
        "totalData"  => $totalPages, 
    );
    
    echo json_encode($jsonData); 
?> 