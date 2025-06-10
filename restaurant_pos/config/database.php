<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); // As per proposal, password is empty
define('DB_NAME', 'restaurant');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optional: Set character set to utf8mb4 for better Unicode support
    $pdo->exec("SET NAMES 'utf8mb4'");
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
