<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/config/session.php';
require_once dirname(__DIR__) . '/includes/functions.php';

require_role('cashier'); // Protect this page

require_once dirname(__DIR__) . '/includes/header.php';
?>
<div class="container mt-4">
    <div class="page-header">
        <h2>Cashier Dashboard</h2>
    </div>
    <p class="lead">Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</p>
    <p>Your role is: <strong><?php echo htmlspecialchars($_SESSION['role']); ?></strong></p>

    <div class="card dashboard-card mt-4">
        <div class="card-header">
            Point of Sale
        </div>
        <div class="card-body">
            <p>Access the POS interface and manage orders.</p>
            <a href="#" class="btn btn-success btn-dashboard">Go to POS</a> <!-- Example different button -->
        </div>
    </div>

    <a href="<?php echo BASE_URL; ?>logout.php" class="btn btn-danger mt-3">Logout</a>
</div>
<?php
require_once dirname(__DIR__) . '/includes/footer.php';
?>
