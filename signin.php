<?php
$pagename = "Login Page";
require_once 'config.php';

if (isset($_POST["submit"])){


$sentusername = $_POST['username'];
$sentuserpass = trim(filter_input(INPUT_POST, $_POST['password'], FILTER_SANITIZE_STRING));
$sentuserpass = password_hash($sentuserpass, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT user_name, user_pass, user_fullname FROM user_tb WHERE user_name = ?");
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$stmt->close();

if(!$result) {
    echo '<div class="alert alert-danger text-white">user denied</div>' ;
}
if(password_verify($_POST['password'],$result['user_pass'])){
    $_SESSION['loggedin'] = $result['user_fullname'];
    header('Location: maintable.php');
}else{
    echo '<div class="alert alert-danger text-white">denied pass</div>';
}

//print($result['user_name']);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> ERMS - <?=$pagename?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="signin.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="username" class="form-control" placeholder="ENTER USRNAME PLS"  required="required" autofocus="autofocus">
              <label for="username">User name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" name="password" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="submit">
              Add User
          </button>
          <!-- <a class="btn btn-primary btn-block">Login</a> -->
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>