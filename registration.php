<?php

require_once './db/dbcon.php';
session_start();


if(isset($_POST['register'])){

  $name=$_POST['name'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];


        $photo=explode('.',$_FILES['photo']['name']);
          $photo=end($photo);
          $photo_name=$username.'.'.$photo;



          $input_error=array();




      if(empty($name)){

        $input_error['name']="The Name field is required";

          }

    if(empty($email)){

        $input_error['email']="The Email field is required";

    }


    if(empty($username)){

        $input_error['username']="The Username field is required";

    }


    if(empty($password)){

        $input_error['password']="The Password field is required";

    }

    if(empty($confirmpassword)){

        $input_error['confirmpassword']="The Confirm Password field is required";

    }



    if(count($input_error)==0){


     $email_check=mysqli_query($link,"SELECT COUNT(*) FROM `user` WHERE `email`='$email';");
        $email_check_rows =mysqli_num_rows($email_check);



        if ($email_check_rows['COUNT(*)'] == 0) {
        $username_check=mysqli_query($link,"SELECT * FROM `user` WHERE `username`='$username';");
        if(mysqli_num_rows($username_check)==0){

            if(strlen($username)>7){
                if(strlen($password)>7){
                    if($password==$confirmpassword){
                        $password=md5($password);


                        $result=mysqli_query($link,"INSERT INTO `user`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')");

                        if($result){
                            $_SESSION['data_insert_success']="data insert success";

                            move_uploaded_file($_FILES['photo']['tmp_name'],'Resources/images/'.$photo_name);
                            header('registration.php');


                        }else{


                            $_SESSION['data_insert_error']="data insert error";

                        }



                    }else{

                        $password_not_match="Confirm password not match";

                    }


                }else{

                    $password_l="password more than 8 characters";

                }


            }else{
                $username_l="Username more than 8 characters";

            }

        }
        else{

            $username_error="the username  already exists";
        }


    }else {


        $email_error="the email address already exists";

    }


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
    <title>User Registration From</title>

    <!-- Bootstrap -->

    <link href="Resources/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">


    <style>

        *{
            margin:0;
            padding:0;
        }

        h1 {
            font-size: 2em;
            font-family: "Core Sans N W01 35 Light";
            font-weight: normal;
            margin: .67em 0;
            display: block;
        }

        #registered {
            margin-top: 50px;
        }

        #registered img {
            margin-bottom: 0px;
            width: 100px;
            height: 100px;
        }

        #registered span {
            clear: both;
            display: block;
        }

        img {
            margin-bottom: 20px;
        }

        .avatar {
            margin: 10px 0 20px 0;
        }

        .module{
            position:relative;
            top:10%;
            height:65%;
            width:450px;
            margin-left:auto;
            margin-right:auto;
        }

        .user {
            color: #66d8fc;
            font-weight: bold;
        }

        .userlist {
            float:left;
            padding: 30px;
        }

        .userlist span {
            color: #0590fc;
        }

        .welcome{
            position:relative;
            top:30%;
            height:65%;
            width:900px;
            margin-left:auto;
            margin-right:auto;
            margin-top: 50px;
        }

        ::-moz-selection {
            background: #19547c;
        }
        ::selection {
            background: #19547c;
        }
        input::-moz-selection {
            background: #037db6;
        }
        input::selection {
            background: #037db6;
        }

        body{
            color: #fff;
            background-color:#f0f0f0;
            font-family:helvetica;
            background:url('http://clevertechie.com/img/bnet-bg.jpg') #0f2439 no-repeat center top;
        }

        .body-content{
            position:relative;
            top:20px;
            height:700px;
            width:800px;
            margin-left:auto;
            margin-right:auto;
            background: transparent;
        }

        select,
        textarea,
        input[type="text"],
        input[type="password"],
        input[type="email"]
        {
            height:30px;
            width:100%;;
            display: inline-block;
            vertical-align: middle;
            height: 34px;
            padding: 0 10px;
            margin-top: 3px;
            margin-bottom: 10px;
            font-size: 15px;
            line-height: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(0, 0, 0, 0.5);
            color: rgba(255, 255, 255, 0.7);
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            border-radius: 2px;
        }

        select,
        textarea,
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            -webkit-transition: background-position 0.2s, background-color 0.2s, border-color 0.2s, box-shadow 0.2s;
            transition: background-position 0.2s, background-color 0.2s, border-color 0.2s, box-shadow 0.2s;
        }
        select:hover,
        textarea:hover,
        input[type="text"]:hover,
        input[type="password"]:hover,
        input[type="email"]:hover {
            border-color: rgba(255, 255, 255, 0.5);
            background-color: rgba(0, 0, 0, 0.5);
            color: rgba(255, 255, 255, 0.7);
        }
        select:focus,
        textarea:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border: 2px solid;
            border-color: #1e5f99;
            background-color: rgba(0, 0, 0, 0.5);
            color: #ffffff;
        }
        .btn {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            margin: 3px 0;
            padding: 6px 20px;
            font-size: 15px;
            line-height: 20px;
            height: 34px;
            background-color: rgba(0, 0, 0, 0.15);
            color: #00aeff;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 rgba(0, 0, 0, 0);
            border-radius: 2px;
            -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
            transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
        }
        .btn.active,
        .btn:active {
            padding: 7px 19px 5px 21px;
        }
        .btn.disabled:active,
        .btn[disabled]:active,
        .btn.disabled.active,
        .btn[disabled].active {
            padding: 6px 20px !important;
        }
        .btn:hover,
        .btn:focus {
            background-color: rgba(0, 0, 0, 0.25);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 rgba(0, 0, 0, 0);
        }
        .btn:active,
        .btn.active {
            background-color: rgba(0, 0, 0, 0.15);
            color: rgba(255, 255, 255, 0.8);
            border-color: rgba(255, 255, 255, 0.07);
            box-shadow: inset 1.5px 1.5px 3px rgba(0, 0, 0, 0.5);
        }
        .btn-primary {
            background-color: #098cc8;
            color: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0 0 rgba(0, 0, 0, 0);
            border-radius: 2px;
            -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
            transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
            background-image: -webkit-linear-gradient(top, #0f9ada, #0076ad);
            background-image: linear-gradient(to bottom, #0f9ada, #0076ad);
            border: 0;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.15) inset;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #21b0f1;
            color: #ffffff;
            border-color: transparent;
            box-shadow: 0 0 rgba(0, 0, 0, 0);
        }
        .btn-primary:active,
        .btn-primary.active {
            background-color: #006899;
            color: rgba(255, 255, 255, 0.7);
            border-color: transparent;
            box-shadow: inset 1.5px 1.5px 3px rgba(0, 0, 0, 0.5);
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-image: -webkit-linear-gradient(top, #37c0ff, #0097dd);
            background-image: linear-gradient(to bottom, #37c0ff, #0097dd);
        }
        .btn-primary:active,
        .btn-primary.active {
            background-image: -webkit-linear-gradient(top, #006ea1, #00608d);
            background-image: linear-gradient(to bottom, #006ea1, #00608d);
            box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6) inset, 0 0 0 1px rgba(255, 255, 255, 0.07) inset;
        }
        .btn-block {
            display: block;
            width: 100%;
            padding-left: 0;
            padding-right: 0;
        }
.error{

    color: red;
    font-style: italic;
    font-weight: 700;
}

    </style>




</head>


<body>

<div class="body-content">
    <div class="module">

        <h1>User Registration From</h1>

     <?php if(isset($_SESSION['data_insert_success'])){echo ' <div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';}?>
        <?php if(isset($_SESSION['data_insert_error'])){echo ' <div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';}?>







        <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">



            <label class="error">
                <?php
                if (isset($input_error['name'])){echo $input_error['name'];} ?>
            </label>

            <input type="text" placeholder="Name" name="name" value="<?php
            if (isset($input_error['name'])){echo $name;} ?>" />






            <label class="error">
                <?php
                if (isset($input_error['email'])){echo $input_error['email'];} ?>
            </label>

            <label class="error">
                <?php
                if (isset($email_error)){echo $email_error;} ?>
            </label>

            <input type="email" placeholder="Email" name="email"  value="<?php
            if (isset($input_error['email'])){echo $email;} ?>"/>







            <label class="error">
                <?php
                if (isset($input_error['username'])){echo $input_error['username'];} ?>
            </label>

            <label class="error">
                <?php
                if (isset($username_error)){echo $username_error;} ?>
            </label>

            <label class="error">
                <?php
                if (isset($username_l)){echo $username_l;} ?>
            </label>

            <input type="text" placeholder="User Name" name="username"   value="<?php
            if (isset($input_error['username'])){echo $username;} ?>" />











            <label class="error">
                <?php
                if (isset($input_error['password'])){echo $input_error['password'];} ?>
            </label>

            <label class="error">
                <?php
                if (isset($password_l)){echo $password_l;} ?>
            </label>

            <input type="password" placeholder="Password" name="password" autocomplete="new-password" value="<?php
            if (isset($input_error['password'])){echo $password;} ?>" />





            <label class="error">
                <?php
                if (isset($input_error['confirmpassword'])){echo $input_error['confirmpassword'];} ?>
            </label>

            <label class="error">
                <?php
                if (isset($password_not_match)){echo $password_not_match;} ?>
            </label>

            <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password"  value="<?php
            if (isset($input_error['confirmpassword'])){echo $confirmpassword;} ?>" />



            <div class="avatar">
                <label>Select your photo: </label><input type="file" name="photo" accept="image/*"  />
            </div>

            <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
            <input type="submit" value="test" name="test" class="btn btn-block btn-primary" />
        </form>

        <br>
        <p>if you have an account? then please <a href="login.php">login</a> </p>
    </div>





</div>


</body>



</html>

