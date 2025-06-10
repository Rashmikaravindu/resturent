<?php
// Site configuration
define('SITE_NAME', 'Restaurant POS System');
define('BASE_URL', 'http://localhost/restaurant_pos/'); // Adjust if your local setup differs

// Timezone setting
date_default_timezone_set('UTC'); // Set to your restaurant's timezone, e.g., 'America/New_York'

// Error reporting (for development)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Other global settings can be added here
// e.g., define('CURRENCY_SYMBOL', '$');
?>
