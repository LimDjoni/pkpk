<?php 
session_start();
define('PROJECT_ROOT_PATH', __DIR__);  
include_once (PROJECT_ROOT_PATH . '../../Controller/shareholderController.php');
$shareholder = new shareholderController();
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 

if(!empty($_SESSION['login'])) {
	$id = $_GET['id'];    
	$delete = $shareholder->deleteReport($date, $id);
	echo "<script type='text/javascript'>window.location='shareholder'</script>";
}else{
	echo "<script type='text/javascript'>window.location='index'</script>";
} 
?> 