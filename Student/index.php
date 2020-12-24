<?php
include('..\public\components\header.php'); 
include('..\connect.php');


if (isset($_POST['submit'])){
       $user= $_POST['username'];
       $pass= $_POST['password'];
       if($user == "" || $pass == "" ){
           

       }
       else{
        $sql="select * from student WHERE username='$user'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($row['username']== $user && password_verify($pass,$row['password']))
        {
            session_start();
            $_SESSION['logged_student']=$user;
            header('location:dashboard.php?id='.$row['s_id']);
        }
        else
        header('index.php');
     }
       }
 

?>


<body class="bg-indigo-600 h-screen font-sans">
    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="w-1/3">
            <h1 class="text-4xl font-semibold mb-6 text-white text-center">Student Login</h1>
            <form action="index.php" method="post">
                <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label class="font-bold text-indigo-600 block mb-2">Username </label>
                        <input type="text" name="username"
                            class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                            placeholder="Your Username">
                    </div>

                    <div class="mb-4">
                        <label class="font-bold text-indigo-600 block mb-2">Password</label>
                        <input type="password"
                            class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                            name="password" placeholder="Your Password">
                    </div>

                    <div class="flex items-center justify-between mb-4">
                    </div>

                    <div>
                        <input type="submit" name="submit" placeholder="submit" class=" group relative w-full flex justify-center py-2 px-4 border border-transparent
                            text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </input>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>



<?php
include('public\components\footer.php');
?>