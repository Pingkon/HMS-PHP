<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Signup</title>
</head>
<body>
    <?php
        include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -15px;">
                    <?php
                    include("include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                

                                

                                    
                                    
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
                                                $error['u']="Enter Your Sickness";
                                            }

                                            if(count($error)==0){
                                                $q="INSERT INTO patients(firstname, lastname, gender, phone, sickness) VALUES ('$fname', '$lname', '$gender', '$phone' , '$sickness')";

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
                                    
                                <h5 class="text-center">Please fill up the form!</h5>
                                <h5 class="text-center">One of our representatives will contact you soon!</h5>

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

                                    <input type="submit" name=add value="Submit" class="btn btn-success">

                                </form>
                            </div>
                            <div class="col-md-2">
                                

                                

                                    
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>