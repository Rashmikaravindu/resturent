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
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>assets/css/login.css">
    <!-- Page-specific CSS can be included here or in the page itself -->
</head>
<body class="<?php echo isset($page_body_class) ? htmlspecialchars($page_body_class) : ''; ?>">
<div class="d-flex flex-column min-vh-100"> <!-- Wrapper for sticky footer -->
    <header class="site-header"> <!-- Added site-header class -->
        <div class="container-fluid"> <!-- Use container-fluid for full width elements inside header -->
            <nav class="navbar navbar-expand-lg navbar-light"> <!-- Removed bg-light to use site-header's bg -->
                <a class="navbar-brand" href="<?php echo defined('BASE_URL') ? BASE_URL : '#'; ?>">
                    <?php echo defined('SITE_NAME') ? SITE_NAME : 'Restaurant POS'; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto"> <!-- ms-auto to push items to the right -->
                        <?php if (is_logged_in()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : '#'; ?>logout.php">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : '#'; ?>index.php">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container-fluid flex-grow-1"> <!-- This container will hold sidebar and main content -->
        <div class="row">
            <?php
            // Conditionally include sidebar for logged-in users, but not on login page
            if (is_logged_in() && basename($_SERVER['PHP_SELF']) != 'index.php') {
                // The sidebar itself should be wrapped in its column definition for the Bootstrap grid
                echo '<div class="col-md-3 col-lg-2 d-md-block">'; // Sidebar column
                if (file_exists(dirname(__DIR__) . '/includes/sidebar.php')) {
                    require_once dirname(__DIR__) . '/includes/sidebar.php';
                }
                echo '</div>'; // Close sidebar column
            }
            // Adjust column class for main content based on sidebar presence
            $main_content_col_class = (is_logged_in() && basename($_SERVER['PHP_SELF']) != 'index.php') ? 'col-md-9 col-lg-10' : 'col-12';
            ?>
            <main role="main" class="<?php echo $main_content_col_class; ?> ms-sm-auto main-content"> <!-- Added main-content class -->
