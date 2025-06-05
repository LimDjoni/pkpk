<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/../Controller/rupsAnnouncementController.php');
    $rupsAnnounce = new rupsAnnouncementController();

    if(isset($_POST['year']) && $_POST['year'] != ""){
        $gmsAnnounce = $rupsAnnounce->getDatabyYear($_POST['year']);  
    }else{ 
        $gmsAnnounce = $rupsAnnounce->getData();  
    } 


    $perPage = 10;  
    $totalRecords = count($gmsAnnounce);
    $totalPages = ceil($totalRecords/$perPage);

    $jsonData = array(
        "totalData"  => $totalPages, 
    );
    
    echo json_encode($jsonData); 
?> 