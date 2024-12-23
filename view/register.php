<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");

$error_message = isset($_GET['notif']) ? $_GET['notif'] : '';

include('../layout/header.php');
?>

<div class="w-100 vh-100 d-flex flex-column align-items-center justify-content-center py-5">
    <div class="card" style="width: 20%;">
        <div class="card-header text-center">
            <h3>DAFTAR</h3>
        </div>
        <div class="card-body">
            <?php if ($error_message): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            <form action="../controller/Request/register_user.php" method="POST" id="register-form">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <small class="text-danger error-email"></small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <small class="text-danger error-username"></small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <small class="text-danger error-password"></small>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="tor">
                    <label class="form-check-label" for="flexCheckDefault">
                        I agree with the term of service
                    </label>
                </div>
                <button type="submit" id="submitBtn" class="btn btn-primary w-100">
                     Register
                </button>
                <div class="w-100 text-center pt-2">
                    <span>Punya Akun?</span>
                    <a href="../index.php" class="text-primary">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input_username = document.getElementById("username");
        const input_email = document.getElementById("email");
        const input_password = document.getElementById("password");
        const submitBtn = document.getElementById("submitBtn");
        
        const error_username = document.querySelector(".error-username");
        const error_email = document.querySelector(".error-email");
        const error_password = document.querySelector(".error-password");

    
        input_username.addEventListener("input", function(){
            if (input_username.value.trim() === "") {
                error_username.textContent = "Username harus diisi!";
                isValid = false;
            } else {
                error_username.textContent = "";
            }

        });

        input_email.addEventListener("input", function(){
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (input_email.value.trim() === "") {
                error_email.textContent = "Email harus diisi!";
                isValid = false;
            } else if (!emailPattern.test(input_email.value.trim())) {
                error_email.textContent = "Email tidak valid!";
                isValid = false;
            } else {
                error_email.textContent = "";
            }

        });

        input_password.addEventListener("input", function(){
            if (input_password.value.trim() === "") {
                error_password.textContent = "Password harus diisi!";
                isValid = false;
            } else {
                error_password.textContent = "";
            }

        });

        submitBtn.addEventListener("click", function(e){
            e.preventDefault();

            if(input_username.value.trim() === "" ||
            input_email.value.trim() === "" ||
            input_password.value.trim() === "") {
                alert('Kembali Cek Form Anda!');
            } else {
                document.getElementById("register-form").submit();
            }
        });
    })
</script>

<?php include('../layout/footer.php')?>