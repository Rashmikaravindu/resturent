<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/session.php'; // Ensures session is started

// Unset all session variables
$_SESSION = array();

// Destroy the session
if (session_destroy()) {
    // Set a flash message for successful logout (optional)
    // Note: session_start() must be called again on the login page to access this.
    // This is handled by session.php being included at the top of index.php.
    session_start(); // Restart session to store flash message
    $_SESSION['flash_messages']['logout_success'] = ['message' => 'You have been logged out successfully.', 'type' => 'success'];
}

// Redirect to login page
header("Location: " . BASE_URL . "index.php");
exit;
?>
