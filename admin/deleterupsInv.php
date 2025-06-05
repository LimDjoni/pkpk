<?php 
session_start();
define('PROJECT_ROOT_PATH', __DIR__);  
include_once (PROJECT_ROOT_PATH . '../../Controller/rupsInvitationController.php');
$rupsInv = new rupsInvitationController();
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 

if(!empty($_SESSION['login'])) {
	$id = $_GET['id'];    
	$delete = $rupsInv->deleteReport($date, $id);
	echo "<script type='text/javascript'>window.location='gms-invitation'</script>";
}else{
	echo "<script type='text/javascript'>window.location='index'</script>";
} 
?> 