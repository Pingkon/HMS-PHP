<?php
session_start();

if(isset($_SESSION['doctors'])){
    unset($_SESSION['doctors']);

    header("Location:../index.php");
}

?>