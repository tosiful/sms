<?php

require_once ('./db/dbcon.php');
session_start();

if(isset($_SESSION['user_login'])){


    header('Location: index.php');

}



if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];


    $username_check=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$username';");
  if(mysqli_num_rows($username_check)>0){

      $row= mysqli_fetch_assoc($username_check);

      if($row['password']== md5($password)){
          if($row['status']== 'active'){

              $_SESSION['user_login']=$username;

              header('Location: index.php');


          } else{

              $status_inactive="Your status is inactive";

          }



      } else {

          $wrong_password="This password is not match";



      }




  }else{

  $username_not_found="This Username not found";

  }

}

























?>




















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->

    <link href="Resources/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <style>






        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

        body {
            background: #456;
            font-family: 'Open Sans', sans-serif;
        }

        .login {
            width: 400px;
            margin: 16px auto;
            font-size: 16px;
        }

        /* Reset top and bottom margins from certain elements */
        .login-header,
        .login p {
            margin-top: 0;
            margin-bottom: 0;
        }

        /* The triangle form is achieved by a CSS hack */
        .login-triangle {
            width: 0;
            margin-right: auto;
            margin-left: auto;
            border: 12px solid transparent;
            border-bottom-color: #28d;
        }

        .login-header {
            background: #28d;
            padding: 20px;
            font-size: 1.4em;
            font-weight: normal;
            text-align: center;
            text-transform: uppercase;
            color: #fff;
        }

        .login-container {
            background: #ebebeb;
            padding: 12px;
        }

        /* Every row inside .login-container is defined with p tags */
        .login p {
            padding: 12px;
        }

        .login input {
            box-sizing: border-box;
            display: block;
            width: 100%;
            border-width: 1px;
            border-style: solid;
            padding: 16px;
            outline: 0;
            font-family: inherit;
            font-size: 0.95em;
        }

        .login input[type="email"],
        .login input[type="password"] {
            background: #fff;
            border-color: #bbb;
            color: #555;
        }

        /* Text fields' focus effect */
        .login input[type="email"]:focus,
        .login input[type="password"]:focus {
            border-color: #888;
        }

        .login input[type="submit"] {
            background: #28d;
            border-color: transparent;
            color: #fff;
            cursor: pointer;
        }

        .login input[type="submit"]:hover {
            background: #17c;
        }

        /* Buttons' focus effect */
        .login input[type="submit"]:focus {
            border-color: #05a;
        }


























    </style>


</head>
<body>
<h1 style="text-align: center;color: #2aabd2">Student management system</h1>
<h2 style="text-align: center;color: #2aabd2;"> Admin login from</h2>

<div  class="login"  >
    <div class="login-triangle"></div>

    <h2 class="login-header">Log in</h2>

    <form class="login-container" action="login.php" method="post">
        <p><input type="username" placeholder="Username" name="username" required=""  value="<?php if(isset($username)){echo $username;} ?>" /></p>
        <p><input type="password" placeholder="Password" name="password" required="" value="<?php if(isset($password)){echo $password;} ?>" /></p>
       <p><input type="submit" name="login" value="Login"></p>


        <?php if(isset($username_not_found)){echo '<p>'.$username_not_found.' </p>';} ?>
        <?php if(isset($wrong_password)){echo '<p>'.$wrong_password.' </p>';} ?>
        <?php if(isset($status_inactive)){echo '<p>'.$status_inactive.' </p>';} ?>






    </form>
</div>



















</body>
</html>
