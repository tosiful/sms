<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update student <small>Update student</small></h1>
<ol class="breadcrumb">

    <li> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li> <a href="index.php?page=all-student"><i class="fa fa-users"></i> All student</a> </li>

    <li class="active"> <i class="fa fa-pencil-square-o"></i> update student </li>

</ol>
<?php




  $id= base64_decode($_GET['id']);

   $db_data= mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`='$id'");

   $db_row=mysqli_fetch_assoc($db_data);






if(isset($_POST['update-student'])) {

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $p_contact = $_POST['p_contact'];


    $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`p_contact`='$p_contact' WHERE `id`='$id'";

    $result = mysqli_query($link, $query);

    if($result){

        header("location:index.php?page=all-student");



    }
}






?>







<div class="row">

    <div class="col-sm-6">

        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">

                <label for="name" >Student  Name</label>


                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control"  required="" value="<?= $db_row['name'] ?>"/>





            </div>

            <div class="form-group">

                <label for="roll" >Student Roll</label>


                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{6}" required=""value="<?=$db_row['roll'] ?>" >






            <div class="form-group">

                <label for="class" >Class</label>

           <select id="class" class="form-control"name="class">
               <option value="">Select</option>
               <option <?php echo $db_row['class']=='1st'?'selected=""':''; ?> value="">1st</option>
               <option <?php echo $db_row['class']=='2nd'?'selected=""':''; ?>value="">1st</option>
               <option <?php echo $db_row['class']=='3rd'?'selected=""':''; ?>value="">2nd</option>
               <option <?php echo $db_row['class']=='4th'?'selected=""':''; ?>value="">3rd</option>
               <option <?php echo $db_row['class']=='5th'?'selected=""':''; ?>value="">4th</option>

           </select>





            </div>


            <div class="form-group">

                <label for="city" >City</label>


                <input type="text" name="city" placeholder="City" id="city" class="form-control" required="" value="<?=$db_row['city'] ?>"/>





            </div>


                <div class="form-group">

                    <label for="p_contact" >P_contact</label>


                    <input type="text" name="p_contact" placeholder="01*******" id="p_contact" class="form-control" pattern="01[0-9]{8}" required="" value="<?=$db_row['p_contact'] ?>"/>



                </div>



                <div class="form-group">

                 <input type="submit" value="Update student" name="update-student" class="btn btn-primary pull-right" >

                </div>


        </form>

    </div>



</div>