<?php 
session_start();
require 'functions.php';

if(isset($_POST["login"]) ){

  $username= $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn , "SELECT * FROM admin WHERE username = '$username' "  );

  //cek user
  if(mysqli_num_rows($result) === 1){

    $row = mysqli_fetch_assoc($result);
    if($password === $row["password"] ){
      //set session
      $_SESSION["admin"] = true;
      header("Location: index.php");
      exit;
    }
  }  
  $error = true;
}

 ?>

<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="loginadmin.css">

    <title>halaman admin</title>
  </head>
  <body>
   <div class="container">
     <h2 class ="text-center">Login Admin</h2>

     <form action="" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="username" class="form-control" name="username" id="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
  </div>
  <div class="form-group form-check">


  </div>
  <button type="submit" name="login"class="btn btn-primary">LOGIN</button>
</form>
</div>
  </body>
</html>