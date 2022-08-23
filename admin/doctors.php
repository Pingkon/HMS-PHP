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
                                <h5 class="text-center">All Doctors</h5>

                                <?php
                                    $ad = $_SESSION['admin'];
                                    $query = "SELECT * FROM doctors WHERE username !='$ad'";
                                    $res = mysqli_query($connect,$query);

                                    $output = "
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <tr>
                                    ";

                                    if(mysqli_num_rows($res)<1){
                                        $output .= "<tr><td colspan='2' class='text-center'>No New Doctor</td></tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['id'];
                                        $username=$row['username'];
                                        $firstname=$row['firstname'];
                                        $lastname=$row['lastname'];
                                        $gender=$row['gender'];
                                        $phone=$row['phone'];

                                        $output .= "
                                        <tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td>$firstname</td>
                                        <td>$lastname</td>
                                        <td>$gender</td>
                                        <td>$phone</td>
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
                                            $uname=$_POST['uname'];
                                            $pass=$_POST['pass'];
                                            $fname=$_POST['fname'];
                                            $lname=$_POST['lname'];
                                            $gender=$_POST['gender'];
                                            $phone=$_POST['phone'];

                                            $error=array();

                                            if(empty($uname)){
                                                $error['u']="Enter Username";
                                            }else if(empty($pass)){
                                                $error['u']="Enter Password";
                                            }else if(empty($fname)){
                                                $error['u']="Enter First Name";
                                            }else if(empty($lname)){
                                                $error['u']="Enter Last Name";
                                            }else if(empty($gender)){
                                                $error['u']="Enter Gender";
                                            }else if(empty($phone)){
                                                $error['u']="Enter Phone";
                                            }

                                            if(count($error)==0){
                                                $q="INSERT INTO doctors(username, password, firstname, lastname, gender, phone) VALUES ('$uname','$pass','$fname', '$lname', '$gender', '$phone')";

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
                                    
                                <h5 class="text-center">Add Doctor</h5>

                                <form method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php echo $show;
                                        ?>
                                    </div>
                                    <div class="form-label">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control">
                                    </div>
                                    <div class="form-label">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
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

                                    <input type="submit" name=add value="Add New Doctor" class="btn btn-success">

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