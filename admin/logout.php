<?php
session_start();
include_once 'include/logActivity.php';

if (!empty($_SESSION['login']) && $_SESSION['login'] === true) {
    $username = $_SESSION['username'] ?? 'UNKNOWN_USER';

    // Log logout activity
    logActivity("LOGOUT", "User '$username' logged out.");

    // Destroy all session data
    $_SESSION = [];
    session_unset();
    session_destroy();

    // Optional: clear session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
}

// Redirect to login
echo "<script type='text/javascript'>window.location='index'</script>";
exit;
?>