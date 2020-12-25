<?php
include('..\connect.php');
include('session.php');
$id = $_GET['id']; // get id through query string
$idd=$_GET['idd'];
$table=$_GET['table'];
$head=$_GET['head'];
echo"delete from $table where $idd='$id'";
$sql="delete from $table where $idd='$id'";
if($result = mysqli_query($conn, $sql))
    {
        header('location:'.$head);
    }



?>