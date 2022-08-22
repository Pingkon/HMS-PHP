<?php
session_start();

include("include/connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($username)) {
        $error['admin'] = "Enter Username";
    }else if (empty($password)){
        $error['admin'] = "Enter Password";
    }

    if (count($error)==0){
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($connect,$query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have Login As an admin')</script>";

            $_SESSION['admin']=$username;

            header("Location:admin/index.php");
            exit();
        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>

    <?php
    include("include/header.php");
    ?>

    <div class="containter">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 rounded-3" style="margin-top: 50px;">
                <img src="images/admin.png" alt="admin" class="col-md-3 offset-md-4">
                    <form method="post" style="margin: 50px 50px;" class="my-2">

                        <div class="alert alert-danger">
                            <?php
                                if(isset($error['admin'])){
                                    $show= $error['admin'];
                                }
                                else{
                                    $show= "";
                                }

                                echo $show;
                            ?>
                        </div>
                        <div class="form-label">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-label">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

</body>

</html>