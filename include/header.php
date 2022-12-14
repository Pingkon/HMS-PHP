<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <title>HMS</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white" style="margin-left: 5px;">Hospital Management System</h5>

        <div class="me-auto"></div>

        <ul class="navbar-nav">
            <?php
            
            if (isset($_SESSION['admin'])){

                $user = $_SESSION['admin'];

                echo '
                <li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
                ';

            }
            else if (isset($_SESSION['doctors'])){

                $user = $_SESSION['doctors'];

                echo '
                <li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>
                ';

            }
            else{
                echo '
                <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
                <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
                <li class="nav-item"><a href="" class="nav-link text-white">Patient</a></li>
                ';
            }

            ?>
        </ul>
    </nav>

</body>

</html>