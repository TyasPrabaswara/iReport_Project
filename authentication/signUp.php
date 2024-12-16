<?php
$pageTitle = 'Sign Up - iReport';
//$additionalCSS = ['signup.css', 'bootstrap.min.css'];

 include 'db/database.php';

if (isset($_POST['regist'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (nama, username, no_telp, email, password, user_role) VALUES ('$name', '$username', '$phone', '$email', '$hashed_password', 'user')";
        
        if ($conn->query($query)) {
            $_SESSION['role'] = 'user';
            header("Location: index.php?page=home");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('Passwords do not match.');</script>";
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