<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
$error_message = isset($_GET['notif']) ? $_GET['notif'] : '';
include('layout/header.php');
?>
<div class="w-100 vh-100 d-flex flex-column align-items-center justify-content-center py-5">
    <div class="card" style="width: 20%;">
        <div class="card-header text-center">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            <?php if ($error_message): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            <form action="controller/Request/login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button class="btn btn-primary w-100">
                    Sign In
                </button>
                <div class="w-100 text-center pt-2">
                    <span>Daftar Akun</span>
                    <a href="view/register.php" class="text-primary">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('layout/footer.php') ?>
    