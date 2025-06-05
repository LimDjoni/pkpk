<?php 
session_start();
define('PROJECT_ROOT_PATH', __DIR__);  
include_once (PROJECT_ROOT_PATH . '../../Controller/rupsAnnouncementController.php');
$rupsAnnounce = new rupsAnnouncementController();
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 

if(!empty($_SESSION['login'])) {
	$id = $_GET['id'];    
	$delete = $rupsAnnounce->deleteReport($date, $id);
	echo "<script type='text/javascript'>window.location='gms-announcement'</script>";
}else{
	echo "<script type='text/javascript'>window.location='index'</script>";
} 
?> 