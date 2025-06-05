<?php 
session_start();
define('PROJECT_ROOT_PATH', __DIR__);  
include_once (PROJECT_ROOT_PATH . '../../Controller/subheaderController.php');
$subheaderCt = new subheaderController();
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 

if(!empty($_SESSION['login'])) {
	$id = $_GET['id'];    
	$delete = $subheaderCt->deleteReport($date, $id);
	echo "<script type='text/javascript'>window.location='subheader'</script>";
}else{
	echo "<script type='text/javascript'>window.location='index'</script>";
} 
?> 