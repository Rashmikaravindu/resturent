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
<aside class="sidebar" id="sidebarMenu">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#"> <!-- Assuming active class is handled dynamically later -->
                    <i class="fas fa-tachometer-alt fa-fw me-2"></i> Dashboard
                </a>
            </li>
            <?php if (is_logged_in()): ?>
                <?php if (has_role('admin')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/users/">
                            <i class="fas fa-users fa-fw me-2"></i> User Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/menu/">
                            <i class="fas fa-utensils fa-fw me-2"></i> Menu Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/reports/sales_report.php">
                            <i class="fas fa-chart-line fa-fw me-2"></i> Sales Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>admin/settings/system_settings.php">
                            <i class="fas fa-cog fa-fw me-2"></i> System Settings
                        </a>
                    </li>
                <?php elseif (has_role('cashier')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>cashier/pos/">
                            <i class="fas fa-cash-register fa-fw me-2"></i> POS Interface
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>cashier/orders/">
                            <i class="fas fa-receipt fa-fw me-2"></i> Order Management
                        </a>
                    </li>
                <?php elseif (has_role('waiter')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>waiter/tables/">
                            <i class="fas fa-tablet-alt fa-fw me-2"></i> Table Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>waiter/orders/take_order.php">
                            <i class="fas fa-concierge-bell fa-fw me-2"></i> Take Order
                        </a>
                    </li>
                <?php elseif (has_role('kitchen')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>kitchen/orders/queue.php">
                            <i class="fas fa-clipboard-list fa-fw me-2"></i> Order Queue
                        </a>
                    </li>
                <?php endif; ?>
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>logout.php">
                        <i class="fas fa-sign-out-alt fa-fw me-2"></i> Logout
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
