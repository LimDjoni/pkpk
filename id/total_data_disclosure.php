<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/../Controller/DisclosureController.php');
    $rupsDisclosure = new DisclosureController();

    if(isset($_POST['year']) && $_POST['year'] != ""){
        $gmsDisclosure = $rupsDisclosure->getDatabyYear($_POST['year']);  
    }else{ 
        $gmsDisclosure = $rupsDisclosure->getData();  
    } 


    $perPage = 10;  
    $totalRecords = count($gmsDisclosure);
    $totalPages = ceil($totalRecords/$perPage);

    $jsonData = array(
        "totalData"  => $totalPages, 
    );
    
    echo json_encode($jsonData); 
?> 