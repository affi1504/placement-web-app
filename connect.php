<?php
$host="localhost";
$username="root";
$password="";
$db="suha";

$conn=mysqli_connect($host,$username,$password,$db);
if (!$conn){
    die("database not connected");
}


?>