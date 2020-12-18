<?php
    include('..\connect.php'); 
       $user= "student";
       $pass= "password";
       $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
       $sql="INSERT INTO student (s_id,name,username,password) VALUES ('1','student','$user','$hashed_pass') ";
       if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
?>