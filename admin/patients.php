<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrators</title>
</head>
<body>
    <?php
        include("../include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -15px;">
                    <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All Patients</h5>

                                <?php
                                    $query = "SELECT id, firstname, lastname, gender, phone, sickness FROM patients";
                                    $res = mysqli_query($connect,$query);

                                    $output = "
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Sickness</th>
                                    <tr>
                                    ";

                                    if(mysqli_num_rows($res)<1){
                                        $output .= "<tr><td colspan='2' class='text-center'>No New Patient</td></tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['id'];

                                        $firstname=$row['firstname'];
                                        $lastname=$row['lastname'];
                                        $gender=$row['gender'];
                                        $phone=$row['phone'];
                                        $sickness=$row['sickness'];

                                        $output .= "
                                        <tr>
                                        <td>$id</td>
                                        <td>$firstname</td>
                                        <td>$lastname</td>
                                        <td>$gender</td>
                                        <td>$phone</td>
                                        <td>$sickness</td>
                                        ";
                                    }

                                    $output .= "
                                    </tr>

                                </table>
                                    ";

                                    echo $output;

                                ?>

                                

                                    
                                    
                            </div>
                            <div class="col-md-6">
                                    <?php

                                        if(isset($_POST['add'])) {
                                            $fname=$_POST['fname'];
                                            $lname=$_POST['lname'];
                                            $gender=$_POST['gender'];
                                            $phone=$_POST['phone'];
                                            $sickness=$_POST['sickness'];

                                            $error=array();

                                            if(empty($fname)){
                                                $error['u']="Enter First Name";
                                            }else if(empty($lname)){
                                                $error['u']="Enter Last Name";
                                            }else if(empty($gender)){
                                                $error['u']="Enter Gender";
                                            }else if(empty($phone)){
                                                $error['u']="Enter Phone";
                                            }else if(empty($sickness)){
                                                $error['u']="Enter Sickness";
                                            }

                                            if(count($error)==0){
                                                $q="INSERT INTO patients(firstname, lastname, gender, phone, sickness) VALUES ('$fname', '$lname', '$gender', '$phone', '$sickness')";

                                                $result = mysqli_query($connect,$q);

                                            }
                                        }
                                    

                                    if(isset($error['u'])){
                                        $er = $error['u'];

                                        $show = "<h6 class='text-center alert alert-danger'>$er</h6>";
                                    }else{
                                        $show="";
                                    }
                                    ?>
                                    
                                <h5 class="text-center">Add Patient</h5>

                                <form method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php echo $show;
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <label>First Name</label>
                                        <input type="text" name="fname" class="form-control">
                                    </div>

                                    <div class="form-label">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" class="form-control">
                                    </div>

                                    <div class="form-label">
                                        <label>Gender</label>
                                        <input type="text" name="gender" class="form-control">
                                    </div>

                                    <div class="form-label">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>

                                    <div class="form-label">
                                        <label>Sickness</label>
                                        <input type="text" name="sickness" class="form-control">
                                    </div>

                                    <input type="submit" name=add value="Add New Patient" class="btn btn-success">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>