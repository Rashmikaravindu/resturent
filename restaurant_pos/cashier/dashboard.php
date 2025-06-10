<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/config/session.php';
require_once dirname(__DIR__) . '/includes/functions.php';

require_role('cashier'); // Protect this page

require_once dirname(__DIR__) . '/includes/header.php';
?>
<div class="container">
    <h2>Cashier Dashboard</h2>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</p>
    <p>Your role is: <?php echo htmlspecialchars($_SESSION['role']); ?></p>
    <p><a href="<?php echo BASE_URL; ?>logout.php" class="btn btn-danger">Logout</a></p>
</div>
<?php
require_once dirname(__DIR__) . '/includes/footer.php';
?>
