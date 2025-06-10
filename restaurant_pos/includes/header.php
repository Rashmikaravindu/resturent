<?php
// Ensure config and session are loaded. Adjust path as necessary if this header is included from different directory levels.
if (file_exists(dirname(__DIR__) . '/config/config.php')) {
    require_once dirname(__DIR__) . '/config/config.php';
}
if (file_exists(dirname(__DIR__) . '/config/session.php')) {
    require_once dirname(__DIR__) . '/config/session.php';
}
// If database connection is needed in header (e.g., for dynamic menu items), include it.
// if (file_exists(dirname(__DIR__) . '/config/database.php')) {
//     require_once dirname(__DIR__) . '/config/database.php';
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo defined('SITE_NAME') ? SITE_NAME : 'Restaurant POS'; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/css/style.css">
    <!-- Page-specific CSS can be included here or in the page itself -->
</head>
<body>
<div class="container-fluid"> <!-- Or a more specific layout container -->
    <header>
        <h1><?php echo defined('SITE_NAME') ? SITE_NAME : 'Restaurant POS'; ?></h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo defined('BASE_URL') ? BASE_URL : '#'; ?>">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (is_logged_in()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : '#'; ?>logout.php">Logout</a>
                        </li>
                        <!-- Add more navigation items based on role or login status -->
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : '#'; ?>index.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main role="main" class="pb-3"> <!-- Added padding-bottom for footer spacing -->
