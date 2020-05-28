<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add student <small>Add New student</small></h1>
<ol class="breadcrumb">

    <li> <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
    <li class="active"><i class="fa fa-user-plus"></i> Add student </a></li>

</ol>



<?php

 require_once ('./db/dbcon.php');


if(isset($_POST['add-student'])){

$name=$_POST['name'];
$roll=$_POST['roll'];
$class=$_POST['class'];
$city=$_POST['city'];
$p_contact=$_POST['p_contact'];


$photo=explode('.',$_FILES['photo']['name']);
$photo_ex=end($photo);
$photo_name=$roll.'.'.$photo_ex;



 $query="INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `p_contact`, `photo`) VALUES ('$name','$roll','$class','$city','$p_contact','$photo_name')";

   $result=mysqli_query($link,$query);





 if($result) {
    $success="Data insert successfully";



    move_uploaded_file($_FILES['photo']['tmp_name'],'Resources/student_images/'.$photo_name);

}else{


    $error="wrong";
}
}


?>


<div class="row">

    <?Php if(isset($success)) {echo '  <p class="alert alert-success col-sm-6">'.$success.'</p>';}?>
    <?Php if(isset($error)) {echo '  <p class="alert alert-danger col-sm-6">'.$error.'</p>';}?>





</div>




<div class="row">

    <div class="col-sm-6">

        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">

                <label for="name" >Student  Name</label>


                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control"  required=""/>



            </div>

            <div class="form-group">

                <label for="roll" >Student Roll</label>


                <input type="text" name="roll" placeholder="Roll" id="roll" class="form-control" pattern="[0-9]{6}" required=""/>






            <div class="form-group">

                <label for="class" >Class</label>

           <select id="class" class="form-control" name="class">
               <option value="">Select</option>
               <option value="1st">1st</option>
               <option value="2nd">2nd</option>
               <option value="3rd">3rd</option>
               <option value="4th">4th</option>

           </select>




            </div>


            <div class="form-group">

                <label for="city" >City</label>


                <input type="text" name="city" placeholder="City" id="city" class="form-control" required=""/>





            </div>


                <div class="form-group">

                    <label for="p_contact" >P_contact</label>


                    <input type="text" name="p_contact" placeholder="01*******" id="p_contact" class="form-control" pattern="01[0-9]{8}" required=""/>



                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo"/>

                </div>

                <div class="form-group">

                 <input type="submit" value="Add student" name="add-student" class="btn btn-primary pull-right" >

                </div>


        </form>

    </div>



</div>