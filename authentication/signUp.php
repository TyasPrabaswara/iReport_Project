<?php
$pageTitle = 'Sign Up - iReport';
//$additionalCSS = ['signup.css', 'bootstrap.min.css'];

// require 'db/database.php';

if (isset($_POST['regist'])) {
    if (regist($_POST) > 0) {
        echo "<script>
        alert('User registered successfully.');
        </script>";
        $_SESSION['role'] = 'user';
        header("Location: index.php?page=home");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<body style="background-color: #f5f5f5;" class="d-flex flex-column min-vh-300">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form class="mx-auto mt-5 mp-5" style="width: 400px;" action="" method="POST">
                    <h1 class="text-center mb-5">Sign Up</h1>

                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="nameInput" class="form-control" placeholder="Name" name="name" />
                    </div>

                    <!-- Username input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="usernameInput" class="form-control" placeholder="Username" name="username" />
                    </div>

                    <!-- Phone number input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="phoneInput" class="form-control" placeholder="Phone number" name="phone" />
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="emailInput" class="form-control" placeholder="Email" name="email" />
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="passwordInput" class="form-control" placeholder="Password" name="password" />
                    </div>

                    <!-- Confirm password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="confirmPasswordInput" class="form-control" placeholder="Confirm Password" name="confirm_password" />
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-center mb-4">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary" name="regist">Sign up</button>
                    </div>

                    <!-- Login buttons -->
                    <div class="text-center">
                        <p>Already have an account? <a href="index.php?page=login"> Login here </a> instead.</p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>