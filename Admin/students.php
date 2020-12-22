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
    $student_cv=$_POST['scv'];
    $student_profile=$_POST['sprofile'];

$sql = "INSERT INTO student (name, username, email,password,dob,gender,course_name,college_name,yog,gpa,cv,profile_photo)
VALUES ('$student_name','$student_username','$student_email','$student_password','$student_dob','$student_gender','$student_course','$student_college','$student_yog','$student_gpa','$student_cv','$student_profile')";

if (mysqli_query($conn, $sql)) {
  echo '<script> alert("New record created successfully")</script>'; 
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header('location:students.php');
mysqli_close($conn);
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
                                    <input type="text" name="scv"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="CV">
                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Upload your Profile
                                        Picture</label>
                                    <input type="text" name="sprofile"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="profile photo">
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
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">edit</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                    <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>

                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                    <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                    <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                    <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                    <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                    <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                    <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>


                                <tr class="bg-gray-200">
                                    <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                    <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:622322662">622322662</a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </button>
                                    </td>
                                    <td class="text-left py-3 px-4">
                                        <button type="button"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>


        </div>

    </div>

