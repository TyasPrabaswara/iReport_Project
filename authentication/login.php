<?php
$pageTitle = 'Login - iReport';
//$additionalCSS = ['login.css'];
session_start();

//include 'db/database.php';

if (isset($_SESSION['role'])){
  header("Location: index.php?page=home");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT password, user_role FROM user WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  //check if user exists
  if ($stmt->num_rows > 0){
    $stmt->bind_result($hashed_password, $user_role);
    $stmt->fetch();

    //verify password
    if (password_verify($password, $hashed_password)){
      //pass is correct, set session variables
      $_SESSION['role'] = $user_role;
      header("Location: index.php?page=home");
      exit();
    } else {
      //invalid password
      $error_message = "Invalid username or password";
    }
  } else {
    //user not found
    $error_message = "Invalid username or password";
  }

  $stmt->close();
}

$conn->close();
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
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary" >Log in</button>
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