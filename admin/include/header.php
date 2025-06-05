<?php 
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
session_start();

define('PROJECT_ROOT_PATH', __DIR__);  
include_once (PROJECT_ROOT_PATH . '../../../Controller/laporanController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/financialHighlightController.php');  
include_once (PROJECT_ROOT_PATH . '../../../Controller/financialStatementController.php'); 
include_once (PROJECT_ROOT_PATH . '../../../Controller/userController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/rupsAnnouncementController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/rupsInvitationController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/rupsMOMController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/DisclosureController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/companyprofileController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/vissionmissionController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/subheaderController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/growthjourneyController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/peopleController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/homeController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/gcgController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/ourBusinessesController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/shareholderController.php');
include_once (PROJECT_ROOT_PATH . '../../../Controller/managementController.php');
$user = new userController();
$laporan = new laporanController();
$financialHighlight = new financialHighlightController(); 
$financialStatement = new financialStatementController();
$rupsAnnounce = new rupsAnnouncementController();
$rupsInv = new rupsInvitationController();
$rupsMOM = new rupsMOMController();
$disclosure = new DisclosureController();
$companyprofile = new companyprofileController();
$vissionmission = new vissionmissionController();
$subheaderCt = new subheaderController();
$growthjc = new growthjourneyController();
$people = new peopleController();
$home = new homeController();
$gcg = new gcgController();
$ourBusinesses = new ourBusinessesController();
$shareholder = new shareholderController();
$management = new managementController();
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 
$no = 1;   
$head = "";

if(!empty($_SESSION['login'])) {
  $Firstname = $_SESSION["Firstname"];
  $Lastname = $_SESSION["Lastname"];
  $ID = $_SESSION["ID"];
  $Fullname = $Firstname . " " . $Lastname; 
}else{
  $_SESSION['login'] = false;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="Content-Type: application/json; utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>
  <link rel="icon" type="image/x-icon" href="./../assets/img/logoaj.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> 
</head>