<?php
include('..\public\components\header.php'); 
include('session.php');

?>

<body class="bg-gray-100 font-family-karla flex">



    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <?php
        include('..\public\components\student-header.php');
        ?>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 mt-16">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Personal Information
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Personal details and application.
                        </p>
                    </div>
                    <?php
                            include('..\connect.php');
                            $id=$_SESSION['id'];
                                $sql = "SELECT * FROM student where s_id='$id'";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                    
                                               ?>

                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Full name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['name'] ;?>
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Username
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['username'] ;?>
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Email address
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['email'] ;?>
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Dob
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['dob'] ;?>
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Gender
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['gender'] ;?>
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Course Name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['course_name'] ;?>
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    College_name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['college_name'] ;?>
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Year of Graduation
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['yog'] ;?>
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Gpa
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <?php echo  $row['gpa'] ;?>
                                </dd>
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

                        <a
                            class="py-2 px-4 font-semibold rounded-lg shadow-md text-white bg-indigo-500 hover:bg-indigo-700"
                            href="editprofile.php?id=<?php echo $id?>"> edit
                        </a>
                    </div>
                </div>
            </main>


        </div>

    </div>
    <?php
include('..\public\components\footer.php');
?>