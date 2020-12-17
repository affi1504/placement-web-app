<?php
    include('..\connect.php'); 
       $user= "admin";
       $pass= "password";
       $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
       $sql="INSERT into admin values 'admin', '$user' , '$hashed_pass'; ";
       $result=mysqli_query($conn,$sql);
       $row=mysqli_fetch_array($result);
       if($row)
       {
           echo("successful");
       }
       else
       echo"unsuccessful";
?>