<?php 
session_start();
define('PROJECT_ROOT_PATH', __DIR__);  
include_once 'include/logActivity.php'; // Add logging
include_once (PROJECT_ROOT_PATH . '../../Controller/growthjourneyController.php');  
$growthjc = new growthjourneyController();
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 

// Check if logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    logActivity("UNAUTHORIZED", "Unauthorized access attempt to Delete Growth Journey.");
    echo "<script type='text/javascript'>window.location='index'</script>";
    exit();
}

// Ensure request is GET (e.g., from a form submission)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    logActivity("INVALID_METHOD", "Attempted delete with " . $_SERVER['REQUEST_METHOD']);
    exit('Invalid request method.');
}

//Validate CSRF token (optional but recommended)
if (!isset($_SESSION['csrf_token'])) {
    logActivity("CSRF_MISSING", "CSRF token missing in session.");
    http_response_code(403);
    exit('Invalid CSRF token.');
}

// Validate ID
if (!isset($_GET['id'])) {
    logActivity("MISSING_ID", "Missing 'id' in GET request.");
    http_response_code(400);
    exit('Invalid ID');
}

if (!is_numeric($_GET['id'])) {
    logActivity("INVALID_ID", "Invalid 'id' value in GET request: " . $_GET['id']);
    http_response_code(400);
    exit('Invalid ID');
}

$id = (int) $_GET['id'];
$delete = $growthjc->deleteReport($date, $id);

if ($delete) {
    logActivity("DELETE", "Growth Journey ID $id deleted successfully");
	echo "<script type='text/javascript'>Berhasil di Hapus</script>";
} else {
    logActivity("DELETE_FAIL", "Failed to delete Growth Journey ID $id.");
	echo "<script type='text/javascript'>Gagal di Hapus</script>";
}
echo "<script type='text/javascript'>window.location='growth-journey'</script>";
exit(); 
?> 