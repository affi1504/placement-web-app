<?php
session_start();
if(!isset($_SESSION['logged_student']))
{
    header('location:../index.php');
}

?>