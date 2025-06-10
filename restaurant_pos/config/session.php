<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Session security settings (optional but recommended)
// ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to session cookie
// ini_set('session.use_only_cookies', 1); // Ensure session ID is passed via cookie only
// ini_set('session.cookie_secure', 1); // Ensure cookie is sent over HTTPS (if applicable)
// ini_set('session.gc_maxlifetime', 1800); // Session timeout in seconds (e.g., 30 minutes)

// Function to check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Function to check user role
function has_role($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] == $role;
}

// Function to redirect if not logged in
function require_login() {
    if (!is_logged_in()) {
        // Assuming login page is at BASE_URL . 'index.php' or just BASE_URL
        // Ensure config.php is included before this file for BASE_URL
        if (defined('BASE_URL')) {
            header("Location: " . BASE_URL . "index.php?error=login_required");
        } else {
            // Fallback if BASE_URL is not defined (should not happen)
            header("Location: /restaurant_pos/index.php?error=login_required");
        }
        exit;
    }
}

// Function to redirect if user does not have the required role
function require_role($role) {
    require_login(); // Ensure user is logged in first
    if (!has_role($role)) {
        // Redirect to a 'not authorized' page or dashboard
        if (defined('BASE_URL')) {
            header("Location: " . BASE_URL . "index.php?error=unauthorized");
        } else {
            header("Location: /restaurant_pos/index.php?error=unauthorized");
        }
        exit;
    }
}
?>
