<?php
include('..\public\components\header.php'); 
include('..\connect.php');
include('session.php');

if (isset($_POST['submit'])){  
    $student_name=$_POST['sname'];
    $student_username=$_POST['susername'];
    $student_email=$_POST['semail'];
    $hashed_pass=$_POST['spassword'];
    $student_password= password_hash($hashed_pass, PASSWORD_DEFAULT);
    $student_dob=$_POST['sdob'];
    $student_gender=$_POST['sgender'];
    $student_course=$_POST['scourse'];
    $student_college=$_POST['scollege'];
    $student_yog=$_POST['syog'];
    $student_gpa=$_POST['sgpa'];
            
       
    $student_cv=$_FILES['scv']['name'];
    $student_profile=$_FILES['sprofile']['name'];


    // destination of the file on the server
    $destinationcv = '../public/assets/cv/' .$student_cv;
    $destinationprofile = '../public/assets/profile/' . $student_profile;

    // get the file extension
    $extensioncv = pathinfo( $student_cv, PATHINFO_EXTENSION);
    $extensionprofile = pathinfo($student_profile, PATHINFO_EXTENSION);


    // the physical file on a temporary uploads directory on the server
    $filecv = $_FILES['scv']['tmp_name'];
    $sizecv = $_FILES['scv']['size'];
    $fileprofile = $_FILES['sprofile']['tmp_name'];
    $sizeprofile = $_FILES['sprofile']['size'];

    if ((!in_array($extensioncv, ['jpg', 'pdf', 'jpeg'])) && (!in_array($extensionprofile, ['jpg', 'pdf', 'jpeg']))) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ( ($_FILES['scv']['size'] > 10000000)&&($_FILES['sprofile']['size'] > 10000000)) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if ((move_uploaded_file($filecv, $destinationcv)) && (move_uploaded_file($fileprofile, $destinationprofile))) {
            $sql = "INSERT INTO student (name, username, email,password,dob,gender,course_name,college_name,yog,gpa,cv,profile_photo,cv_path,profile_path,cv_temp,profile_temp)
            VALUES ('$student_name','$student_username','$student_email','$student_password','$student_dob','$student_gender','$student_course','$student_college','$student_yog','$student_gpa','$student_cv','$student_profile','$destinationcv','$destinationprofile','$filecv','$fileprofile')";
                 if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Insert Successfull')</script>";
            }
        } else {
            echo "Insert Unsuccessfull.";
        }
    }
}


?>









<body class="bg-gray-00 font-family-karla flex">

    <?php
    include('..\public\components\sidebars.php');
    ?>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <?php
        include('..\public\components\admin-header.php');
        ?>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Students</h1>

                <button
                    class="w-1/4 float-right bg-indigo-600 font-semibold py-2 mt-5 rounded-br-lg show-modal rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-indigo-800 flex items-center justify-center text-white ">
                    <i class="fas fa-plus mr-3"></i> New Student
                </button>

                <div
                    class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden overflow-auto">
                    <!-- modal -->
                    <div class="bg-white rounded shadow-lg w-1/2 h-3/4">
                        <!-- modal header -->
                        <div class="border-b px-4 py-2 flex justify-between items-center ">
                            <h3 class="font-semibold text-lg">Add Student</h3>
                            <button class="text-black close-modal">&cross;</button>
                        </div>
                        <!-- modal body -->



                        <form action="students.php" method="post" enctype="multipart/form-data">
                            <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Full Name</label>
                                    <input type="text" name="sname"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Full Name">
                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Username</label>
                                    <input type="text" name="susername"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Username">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Email</label>
                                    <input type="text" name="semail"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Email">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Password</label>
                                    <input type="text" name="spassword"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Password">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Date of Birth</label>
                                    <input type="date" name="sdob">

                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Gender</label>
                                    <input type="radio" id="male" name="sgender" value="male">
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="sgender" value="female">
                                    <label for="female">Female</label><br>
                                    <input type="radio" id="other" name="sgender" value="other">
                                    <label for="other">Other</label>
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Course Name</label>
                                    <input type="text" name="scourse"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Course Name">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">College Name</label>
                                    <input type="text" name="scollege"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="College Name">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Year of graduation</label>
                                    <input type="date" name="syog">

                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">GPA</label>
                                    <input type="text" name="sgpa"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="GPA">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Curriculum Vitae</label>

                                    <input type="file" name="scv"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Upload your Profile
                                        Picture</label>
                                    <input type="file" name="sprofile"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                                </div>








                                <div class="flex justify-end items-center w-100 border-t p-3">
                                    <input type="reset" placeholder="clear"
                                        class="w-1/2 bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal" />
                                    <input type="submit" name="submit"
                                        class="w-1/2 bg-indigo-600 hover:bg-indigo-700 px-3 py-1 rounded text-white" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                const modal = document.querySelector('.modal');

                const showModal = document.querySelector('.show-modal');
                const closeModal = document.querySelectorAll('.close-modal');

                showModal.addEventListener('click', function() {
                    modal.classList.remove('hidden')
                });

                closeModal.forEach(close => {
                    close.addEventListener('click', function() {
                        modal.classList.add('hidden')
                    });
                });
                </script>














                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Latest Reports
                    </p>


                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Course Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">GPA</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">edit</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">delete</th>
                                </tr>
                            </thead>


                            <?php
                                $sql = "SELECT * FROM student";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                    
                                               ?>












                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="text-left py-3 px-4"><?php echo  $row['name'] ;?></td>
                                    <td class="text-left py-3 px-4"><?php echo  $row['username'];?></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="<?php echo  $row['email'] ;?>"><?php echo  $row['email'] ;?></a></td>
                                    <td class="text-left py-3 px-4"><?php echo  $row['course_name'];?></td>
                                    <td class="text-left py-3 px-4"><?php echo  $row['gpa'];?></td>
                                    <td>
                                        <a
                                            class="border border-yellow bg-yellow-500 text-white rounded-md py-2 px-4 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline"
                                            href="editstudent.php?id=<?php echo $row['0']; ?>">

                                            Edit
                                        </a>
                                    </td>

                                    <td><a class="border border-red bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                            href="delete.php?id=<?php echo $row['0']; ?>&&idd=s_id&&table=student&&head=students.php">
                                            Delete</a></td>


                                    <?php 
                                     }
                                     // Free result set
                                 mysqli_free_result($result);
                                } else  {
                                         echo "No records matching your query were found.";
                                        }
                            } else  {
                                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                     }

                    // Close connection
            mysqli_close($conn);
            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </main>


        </div>

    </div>