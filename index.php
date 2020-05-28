
<?php session_start();
require_once ('./db/dbcon.php');


if(!isset($_SESSION['user_login'])){


    header('Location: login.php');

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
    <link href="Resources/bootstrap-3.3.7-dist/css/font-awesome.css" rel="stylesheet">



    <script type="text/javascript" src="Resources/bootstrap-3.3.7-dist/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="Resources/bootstrap-3.3.7-dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="Resources/bootstrap-3.3.7-dist/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="Resources/bootstrap-3.3.7-dist/js/script.js"></script>

    <style>

        #data_filter{
            float: right;
        }
    .footer-area{


        background: #2aabd2;
        text-align: center;
        padding: 20px;
        color: white;
        margin-top: 20px;

    }
    .content{


    }


</style>








</head>

<body>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>SMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="index.php">Student Management System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><i class="fa fa-user "></i> Welcome</a></li>
                <li><a href="registration.php"><i class="fa fa-user-plus "></i> Add user</a></li>
                <li><a href="index.php?page=user-profile"><i class="fa fa-user "></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off "></i> Logout</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<div class="container-fluid">
    <div class="row">

        <div class="col-sm-3">

            <div class="list-group">
                <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</a>
                <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Add student</a>
                <a href="index.php?page=all-student" class="list-group-item"><i class="fa fa-users"></i> All student</a>
                <a href="index.php?page=all-user" class="list-group-item"><i class="fa fa-users"></i> All user</a>

            </div>

        </div>
        <div class="col-sm-9">
        <div class="content">
            <?php


            if(isset($_GET['page'])){


                $page=$_GET['page'].'.php';
            }else{


          $page='dashboard.php';

            }



         if(file_exists($page)){

         require_once $page;


     }else{


          require_once ('404.php');
         }


            ?>

        </div>



        </div>





    </div>

<div class="col-sm-3"></div>
<div class="col-sm-9">

</div>
</div>






<footer class="footer-area">

   <p style="margin: 0px"> © Copyright Agency and contributors 2019. ABN 53 001 228 799</p>



</footer>


</body>
</html>



</body>

</html>

