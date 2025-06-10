<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/config/session.php';
require_once dirname(__DIR__) . '/includes/functions.php';

require_role('admin'); // Protect this page

require_once dirname(__DIR__) . '/includes/header.php';
?>
<div class="container mt-4"> <!-- Added Bootstrap's mt-4 for margin-top -->
    <div class="page-header"> <!-- Using our custom class -->
        <h2>Admin Dashboard</h2>
    </div>
    <p class="lead">Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</p> <!-- Bootstrap 'lead' class for emphasis -->
    <p>Your role is: <strong><?php echo htmlspecialchars($_SESSION['role']); ?></strong></p> <!-- Bootstrap 'font-weight-bold' or strong tag -->

    <!-- Example of using a Bootstrap card with our custom dashboard styles -->
    <div class="card dashboard-card mt-4">
        <div class="card-header">
            Quick Actions
        </div>
        <div class="card-body">
            <p>Some quick actions or information for the admin.</p>
                 <a href="#" class="btn btn-primary btn-dashboard">
                     <i class="fas fa-plus-circle me-1"></i> Sample Action
                 </a>
        </div>
    </div>

    <a href="<?php echo BASE_URL; ?>logout.php" class="btn btn-danger mt-3">Logout</a> <!-- Added mt-3 -->
</div>
<?php
require_once dirname(__DIR__) . '/includes/footer.php';
?>
