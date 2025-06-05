<?php
session_start();
if($_SESSION['login'] == true) {
	unset($_SESSION['ID']);
	unset($_SESSION['Firstname']);
	unset($_SESSION['Lastname']);  
  	$_SESSION['login'] = false;
	echo "<script type='text/javascript'>window.location='index'</script>";
}else{
	echo "<script type='text/javascript'>window.location='index'</script>";
} 
?> 