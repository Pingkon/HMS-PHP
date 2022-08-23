<?php
session_start();

include("include/connection.php");

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
        include("include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                
                            <div class="col-md-6">
                                <h5 class="text-center">All Doctors</h5>

                                <?php
                                    $query = "SELECT id, firstname, lastname, gender FROM doctors";
                                    $res = mysqli_query($connect,$query);

                                    $output = "
                                    <table class='table table-bordered'>
                                    <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <tr>
                                    ";

                                    if(mysqli_num_rows($res)<1){
                                        $output .= "<tr><td colspan='2' class='text-center'>No New Doctor</td></tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['id'];
                                        $firstname=$row['firstname'];
                                        $lastname=$row['lastname'];
                                        $gender=$row['gender'];

                                        $output .= "
                                        <tr>
                                        <td>$id</td>
                                        <td>$firstname</td>
                                        <td>$lastname</td>
                                        <td>$gender</td>
                                        ";
                                    }

                                    $output .= "
                                    </tr>

                                </table>
                                    ";

                                    echo $output;

                                ?>

                                

                                    
                                    
                            </div>
                            
                        
                    
                
            </div>

        </div>
    </div>
</body>
</html>