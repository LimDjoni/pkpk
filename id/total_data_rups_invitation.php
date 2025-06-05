<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/../Controller/rupsInvitationController.php');
    $rupsInvitation = new rupsInvitationController();

    if(isset($_POST['year']) && $_POST['year'] != ""){
        $gmsInvitation = $rupsInvitation->getDatabyYear($_POST['year']);  
    }else{ 
        $gmsInvitation = $rupsInvitation->getData();  
    } 


    $perPage = 10;  
    $totalRecords = count($gmsInvitation);
    $totalPages = ceil($totalRecords/$perPage);

    $jsonData = array(
        "totalData"  => $totalPages, 
    );
    
    echo json_encode($jsonData); 
?> 