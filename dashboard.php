<h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>

</ol>

<?php
$count_student=mysqli_query($link,"SELECT * FROM `student_info`");
$total_student=mysqli_num_rows($count_student);


$count_user=mysqli_query($link,"SELECT * FROM `user`");
$total_user=mysqli_num_rows($count_user);









?>


<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">

            <div class="panel-heading">

                <div class="row">
                    <div class="col-xs-3"><i class="fa fa-users fa-5x"></i> </div>
                    <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px"><?=$total_student; ?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All students</div>



                    </div>



                </div>
            </div>
            <a href="index.php?page=all-student">

                <div class="panel-footer">

                    <span class="pull-left">All students</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i> </span>
                    <div class="clearfix"></div>


                </div>

            </a>


        </div>



    </div>
    <div class="col-sm-4">
        <div class="panel panel-primary">

            <div class="panel-heading">

                <div class="row">
                    <div class="col-xs-3"><i class="fa fa-users fa-5x"></i> </div>
                    <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px"><?=$total_user; ?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All user</div>



                    </div>



                </div>
            </div>
            <a href="index.php?page=all-user">

                <div class="panel-footer">

                    <span class="pull-left">All user</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i> </span>
                    <div class="clearfix"></div>


                </div>

            </a>


        </div>



    </div>














</div>





<hr>

<h3>New Students</h3>

<div class="table-responsive">
    <table id="data"  class="table table-hover  table-bordered table-striped">


        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Roll</th>
            <th>City</th>
            <th>Contact</th>
            <th>photo</th>
        </tr>



        </thead>

        <tbody>


        <?php


        $db_sinfo=mysqli_query($link,"SELECT * FROM `student_info`");



        while($row = mysqli_fetch_assoc($db_sinfo))

        {
            ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo ucwords($row['name']); ?></td>
            <td><?php echo $row['roll'] ?></td>
            <td><?php echo ucwords($row['city']); ?></td>
            <td><?php echo $row['p_contact']; ?></td>
            <td><img style="width: 100px;height: 100px" src="Resources/student_images/<?php echo $row['photo']; ?>" alt=""/>             </td>

        </tr>


        <?php

        }
        ?>

        </tbody>



    </table>


</div>



