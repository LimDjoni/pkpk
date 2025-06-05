<?php 
session_start();
define('PROJECT_ROOT_PATH', __DIR__);  
include_once (PROJECT_ROOT_PATH . '../../Controller/growthjourneyController.php');  
$growthjc = new growthjourneyController();
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 

if(!empty($_SESSION['login'])) {
	$id = $_GET['id'];    
	$delete = $growthjc->deleteReport($date, $id); 
        echo "<script type='text/javascript'>window.location='growth-journey'</script>";
}else{
	echo "<script type='text/javascript'>window.location='index'</script>";
} 
?> 