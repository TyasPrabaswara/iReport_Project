<?php
$pageTitle = 'Sign Up - iReport';
$additionalCSS = ['home.css'];
$additionalCSS = ['bootstrap.min.css']
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<body style="background-color: #f5f5f5;" class="d-flex flex-column min-vh-300">
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <form class="mx-auto mt-5 mp-5" style="width: 400px;" action="" method="POST">
          <h1 class="text-center mb-5">Login</h1>
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" placeholder="username or email" />
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" placeholder="password" />
          </div>

          <!-- 2 column grid layout for inline styling -->
          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                <label class="form-check-label" for="form2Example31"> Remember me </label>
              </div>
            </div>

            <div class="col">
              <!-- Simple link -->
              <a href="#!">Forgot password?</a>
            </div>
          </div>

          <!-- Submit button -->
          <div class="d-flex justify-content-center mb-4">
            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Sign in</button>
          </div>

          <!-- Register buttons -->
          <div class="text-center">
            <p>Don't have an account  ? <a href="#!">Register</a></p>
            <p>or sign up with:</p>
            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
              <i class="bi bi-facebook"></i>
            </button>

            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
              <i class="bi bi-google"></i>
            </button>

            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
              <i class="bi bi-instagram"></i>
            </button>

            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
              <i class="bi bi-twitter-x"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>