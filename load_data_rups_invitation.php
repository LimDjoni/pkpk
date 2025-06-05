<?php
    define('PROJECT_ROOT_PATH', __DIR__); 
    include_once (PROJECT_ROOT_PATH . '/Controller/rupsInvitationController.php');
    $rupsInv = new rupsInvitationController();
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
        $gmsInvitation = $rupsInv->getDataLimitbyYear($startFrom, $perPage, $year);  
    }else{ 
        $gmsInvitation = $rupsInv->getDataLimit($startFrom, $perPage);  
    }
 
    $paginationHtml = '';


    foreach($gmsInvitation as $dtInvitation) {
        $paginationHtml.='<tr>';  
        $paginationHtml.='<td style="text-align: center;"><img class="mx-auto" style="width:100px;" src="img/file.png"></td>';
        $paginationHtml.='<td><b>'.$dtInvitation['Tahun'].'</b><br /><a>'.$dtInvitation['Title'].'</a><br /><a style="font-size:14px">'.urldecode($dtInvitation['Des']).'</a></td>';
        $paginationHtml.='<td style="text-align: center;"><a class="download" href="admin/assets/pdf/rupsInv/'.$dtInvitation['PDF'].'" target="_blank">Download</a></td>';  
        $paginationHtml.='</tr>';   
    }

    $jsonData = array(
        "html"  => $paginationHtml, 
    );
    
    echo json_encode($jsonData); 
?> 