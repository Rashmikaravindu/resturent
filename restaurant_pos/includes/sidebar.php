<?php
// This is a placeholder for a sidebar.
// Content will vary greatly based on user role and current page.
// Ensure session.php is included for role checks.
if (session_status() == PHP_SESSION_NONE) {
    // This check is important if sidebar is included directly or if header wasn't included
    if (file_exists(dirname(__DIR__) . '/config/session.php')) {
        require_once dirname(__DIR__) . '/config/session.php';
    }
}
?>
<aside class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php if (is_logged_in()): ?>
                <?php if (has_role('admin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/users/">User Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/menu/">Menu Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/reports/sales_report.php">Sales Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/settings/system_settings.php">System Settings</a>
                    </li>
                <?php elseif (has_role('cashier')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>cashier/pos/">POS Interface</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>cashier/orders/">Order Management</a>
                    </li>
                <?php elseif (has_role('waiter')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>waiter/tables/">Table Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>waiter/orders/take_order.php">Take Order</a>
                    </li>
                <?php elseif (has_role('kitchen')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>kitchen/orders/queue.php">Order Queue</a>
                    </li>
                <?php endif; ?>
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>logout.php">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
