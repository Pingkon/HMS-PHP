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
                                <h5 class="text-center">All Administrators</h5>

                                <?php
                                    $ad = $_SESSION['admin'];
                                    $query = "SELECT * FROM admin WHERE username !='$ad'";
                                    $res = mysqli_query($connect,$query);

                                    $output = "
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                    <tr>
                                    ";

                                    if(mysqli_num_rows($res)<1){
                                        $output .= "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['id'];
                                        $username=$row['username'];

                                        $output .= "
                                        <tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td>
                                            <button id='$id' class='btn btn-danger remove'>Remove</button>
                                        </td>
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
                                <h5 class="text-center">Add Administrator</h5>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-label">
                                        <label>Username</label>
                                        <input type="text name="uname" class="form-control">
                                    </div>
                                    <div class="form-label">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>

                                    <div class="form-label">
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                    <input type="submit" name=add value="Add New Admin" class="btn btn-success">

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