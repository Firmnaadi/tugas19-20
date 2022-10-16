<?php
session_start();
if (isset($_COOKIE["masuk"])){
    if($_COOKIE["masuk"]=="true"){
        $_SESSION["masuk"]=true;
    }
}
if (isset($_SESSION["masuk"])) {
    header("Location: home.php");
    exit();
}
require "fungsi.php";
$data = show_user();
if (isset($_POST["sub"])) {
    foreach ($data as $temp) {
        if ($temp["user_email"] == $_POST["email"] && $temp["user_password"] == $_POST["password"]) {
            setcookie("masuk", "true", time() + 180);
            setcookie("level", $temp["level"],time()+180);
            //$_SESSION["masuk"] = true;
            header("Location: home.php");
            exit();
        }
    }
    echo "login gagal";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
    </style>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="login.php" method="POST">
            
        </div>  
            <h1> Login </h1>
    <form action="" method="POST">
        <!-- email -->
        <div class="form-outline mb-4">
          <label class="form-label" for="form1Example13">Email</label>
            <input type="text" id="femaill" class="form-control form-control-lg" name="email"/>
          </div>
        <!--password-->
        <div class="form-check">
          <label class="form-label" for="pass">Password</label>
            <input type="password" id="pas" class="form-control form-control-lg" name="password"/>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <a href="register.php">Sign up</a>
          </div>

          <!--button-->
       <button type="submit" class="btn btn-primary btn-lg btn-block"name="sub">Sign in</button>
    </form>
</body>

</html>