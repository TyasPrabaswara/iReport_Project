<?php
$pageTitle = 'Login - iReport';
//$additionalCSS = ['login.css'];
session_start();

require 'db/database.php';

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if (mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION['role'] = $row['user_role'];
      header("Location: index.php?page=home");
      exit;
    }
  } else {
    echo "<script> 
    alert('Username or password is incorrect!'); 
    </script>";
  }
}

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<body style="background-color: #f5f5f5;" class="d-flex flex-column min-vh-300">
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <form class="mx-auto mt-5 mp-5" style="width: 400px;" action="" method="POST">
          <h1 class="text-center mb-5">Log In</h1>

          <!-- Username input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="usernameInput" class="form-control" placeholder="Username" name="username" />
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="passwordInput" class="form-control" placeholder="Password" name="password" />
          </div>

          <!-- Submit button -->
          <div class="d-flex justify-content-center mb-4">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary" name="login">Log in</button>
          </div>

          <!-- Sign up buttons -->
          <div class="text-center">
            <p>Don't have an account? <a href="index.php?page=signup"> Sign Up </a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</body>