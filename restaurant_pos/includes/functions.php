<?php
// Common functions used throughout the application

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to redirect to a given URL
function redirect($url) {
    if (defined('BASE_URL')) {
        header("Location: " . BASE_URL . $url);
    } else {
        // Fallback if BASE_URL is not defined
        header("Location: /restaurant_pos/" . $url);
    }
    exit;
}

// Function to display flash messages (requires session started)
function set_flash_message($name, $message, $type = 'success') {
    $_SESSION['flash_messages'][$name] = ['message' => $message, 'type' => $type];
}

function display_flash_message($name) {
    if (isset($_SESSION['flash_messages'][$name])) {
        $message_data = $_SESSION['flash_messages'][$name];
        $class = 'alert alert-' . htmlspecialchars($message_data['type']);
        echo '<div class="' . $class . '" role="alert">' . htmlspecialchars($message_data['message']) . '</div>';
        unset($_SESSION['flash_messages'][$name]);
    }
}

// Function to hash passwords securely
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify password
function verify_password($password, $hashed_password) {
    return password_verify($password, $hashed_password);
}

// Add more common functions as needed:
// - Date/time formatting
// - Currency formatting
// - CSRF token generation/validation
// - etc.
?>
