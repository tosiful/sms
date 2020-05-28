<h1 class="text-primary"><i class="fa fa-users"></i> All User <small>All User </small></h1>
<ol class="breadcrumb">

    <li> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li><a href="#"><i class="fa fa-user-plus"></i> All User  </a></li>

</ol>



<div class="table-responsive">
    <table id="data"  class="table table-hover  table-bordered table-striped">


        <thead>
        <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Photo</th>

        </tr>

        <?php

        $db_sinfo=mysqli_query($link,"SELECT * FROM `user`");

        while($row=mysqli_fetch_assoc($db_sinfo)){
        ?>


        </thead>

        <tbody>
        <tr>
            <td><?php echo ucwords($row['name']) ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>

            <td><img style="width: 100px;height: 100px " src="Resources/images/<?php echo $row['photo'] ?>" alt=""/></td>
            <td>


        </tr>

        <?php

        }
?>

        </tbody>



    </table>


</div>