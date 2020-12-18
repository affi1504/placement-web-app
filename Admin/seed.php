<?php
    include('..\connect.php'); 
       $user= "admin";
       $pass= "password";
       $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
       $sql="INSERT INTO admin (id, name,username,password) VALUES ('1','admin','$user','$hashed_pass') ";
       if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
?>