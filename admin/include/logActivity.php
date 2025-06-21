<?php
function logActivity($action, $details = '') {
    $logFile = __DIR__ . '/../logs/activity.log'; // outside web root is better
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN_IP';
    $user = $_SESSION['username'] ?? 'GUEST';
    $timestamp = date('Y-m-d H:i:s');
    $entry = "[$timestamp][$ip][$user][$action] $details" . PHP_EOL;

    file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);
}
?>
