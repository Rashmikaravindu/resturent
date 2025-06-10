<?php
// Main entry point / Login Page

// Include necessary configuration and session files
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/config/database.php'; // For login processing
require_once __DIR__ . '/includes/functions.php'; // For utility functions like sanitize_input

// If user is already logged in, redirect to their respective dashboard
if (is_logged_in()) {
    if (has_role('admin')) {
        redirect('admin/dashboard.php');
    } elseif (has_role('cashier')) {
        redirect('cashier/dashboard.php');
    } elseif (has_role('waiter')) {
        redirect('waiter/dashboard.php');
    } elseif (has_role('kitchen')) {
        redirect('kitchen/dashboard.php');
    } else {
        // Fallback or error if role is not set, though session.php should handle this
        redirect('logout.php'); // Or an error page
    }
}

$login_error = '';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);

    if (empty($username) || empty($password)) {
        $login_error = "Username and password are required.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT user_id, username, password, role, full_name, status FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && verify_password($password, $user['password'])) {
                if ($user['status'] == 'active') {
                    // Store user data in session
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['full_name'] = $user['full_name'];
                    $_SESSION['role'] = $user['role'];

                    // Redirect based on role
                    if ($user['role'] == 'admin') {
                        redirect('admin/dashboard.php');
                    } elseif ($user['role'] == 'cashier') {
                        redirect('cashier/dashboard.php');
                    } elseif ($user['role'] == 'waiter') {
                        redirect('waiter/dashboard.php');
                    } elseif ($user['role'] == 'kitchen') {
                        redirect('kitchen/dashboard.php');
                    } else {
                        $login_error = "Unknown user role.";
                        // Optionally, destroy session here if role is invalid
                        session_destroy();
                    }
                } else {
                    $login_error = "Your account is inactive. Please contact an administrator.";
                }
            } else {
                $login_error = "Invalid username or password.";
            }
        } catch (PDOException $e) {
            $login_error = "Database error: " . $e->getMessage(); // Consider logging this instead of showing to user
        }
    }
}

// Include header
require_once __DIR__ . '/includes/header.php';
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Login</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($login_error)): ?>
                    <div class="alert alert-danger"><?php echo $login_error; ?></div>
                <?php endif; ?>
                <?php display_flash_message('logout_success'); ?>
                <?php display_flash_message('login_required'); ?>
                 <?php display_flash_message('unauthorized'); ?>


                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <small>&copy; <?php echo date("Y"); ?> <?php echo SITE_NAME; ?></small>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
require_once __DIR__ . '/includes/footer.php';
?>
