<?php

include('..\connect.php');
include('..\public\components\header.php'); 
$id=$_GET['id'];

if (isset($_POST['submit'])){  
    $student_name=$_POST['sname'];
    $student_username=$_POST['susername'];
    $student_email=$_POST['semail'];
    $student_dob=$_POST['sdob'];
    $student_gender=$_POST['sgender'];
    $student_course=$_POST['scourse'];
    $student_college=$_POST['scollege'];
    $student_yog=$_POST['syog'];
    $student_gpa=$_POST['sgpa'];
            $edit = "UPDATE student SET name='$student_name', username='$student_username', email='$student_email',dob='$student_dob',gender='$student_gender',course_name='$student_course',college_name='$student_college',yog='$student_yog',gpa='$student_gpa' WHERE student.s_id='$id'";
                 if (mysqli_query($conn, $edit)) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Update Successfull");';
                    echo 'window.location.href = "dashboard.php";';
                    echo '</script>';            
        } else {
            echo "Insert Unsuccessfull.";
        }
    
    } 


?>
<body class="bg-gray-100 font-family-karla flex">



<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <div class="w-full overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">

            <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 mt-16">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Edit Personal Information
                    </h3>
                   
                </div><?php
                                $sql = "SELECT * FROM student where s_id='$id'";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                    
                                               ?>

<div class=" border-t border-gray-200">
    <form method="POST">

        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Full name
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <input type="text" name="sname" value="<?php echo $row['name'] ?>" required
                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Username
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="text" name="susername" value="<?php echo $row['username'] ?>" required
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Email address
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="text" name="semail" value="<?php echo $row['email'] ?>" required
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Dob
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="date" name="sdob" required value="<?php echo $row['dob'] ?>">
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Gender
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="radio" id="male" name="sgender" required value="male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="sgender" required value="female">
                <label for="female">Female</label><br>
                <input type="radio" id="other" name="sgender" required value="other">
                <label for="other">Other</label>
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Course Name
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="text" name="scourse" required value="<?php echo $row['course_name'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    College_name
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="text" name="scollege" required value="<?php echo $row['college_name'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Year of Graduation
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="date" name="syog" required value="<?php echo $row['yog'] ?>">
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Gpa
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <input type="text" name="sgpa" required value="<?php echo $row['gpa'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                </dd>
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <input type="reset" placeholder="clear"
                    class="w-1/5 bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal" />
                <input type="submit" name="submit"
                    class="w-1/5 bg-indigo-600 hover:bg-indigo-700 px-3 py-1 rounded text-white" />
            </div>



        </dl>


        <?php 
                                     }
                                     // Free result set
                                 mysqli_free_result($result);
                                } else  {
                                         echo "No Training Available .";
                                        }
                            } else  {
                                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                     }

                    // Close connection
            mysqli_close($conn);
            ?>
    </form>


</div>
                                    </div>
</main>