<?php
$pageTitle = 'Login - iReport';
$additionalCSS = ['login.css'];
session_start();

include 'db/database.php';

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


<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="checkbox" id="remember" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="index.php?page=signup">Sign up here</a></p>
    </div>
</body>