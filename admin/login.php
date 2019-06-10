<?php
	session_start();
  $salt = time('now');
  $token = hash("sha256",$salt);
  $_SESSION['token'] = $token;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="../css/master.css">
<title>Admin | Login</title>
</head>
<body class="bg-light">
  <div class="container">
    <div class="login-box bg-theme shadow">
      <div class="row align-items-center no-gutters">
        <div class="col-12 col-md-6">
          <img src="../img/login-logo.svg" width="300px" alt="" class="d-block mx-auto">
        </div>
        <div class="col-12 col-md-6 px-4 py-5 bg-white" style="color: #333;">
          <h3 class="mb-4">Login</h3>
          <form action="login_process.php" method="post">
            <div class="form-group">
              <label for="username">Email</label>
              <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter email address">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="hidden" name="tok" value="<?php echo $token; ?>">
              <input type="password" name="password" class="form-control rounded-pill" placeholder="Enter password">
            </div>
            <div class="d-flex flex-row align-items-center">
              <a href="forgot_pass.php" class="flex-grow-1 mr-3 text-muted" style="text-decoration: none;" ><small>Forgot password?</small></a>
              <!-- <button id="login-btn" class="btn btn-theme rounded-pill" type="button">Log In</button> -->
              <input type="submit" class="btn btn-theme rounded-pill" name="submit" value="Log In">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="modal fade" id="forgotModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="" method="post">
          <div class="modal-header">
            <h5 class="modal-title">Forgot Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body p-5">
            <p>Enter your registered email address, your password will be sent to inbox.</p>
            <input type="email" name="" id="" placeholder="Enter email address" class="form-control rounded-pill">
          </div>
          <div class="modal-footer">
            <input type="submit" value="Request Password" class="btn btn-theme rounded-pill">
          </div>
        </form>
      </div>
    </div>
  </div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="../js/master.js"></script>
</body>
</html>