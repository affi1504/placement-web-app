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
                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Placements Available
                    </p>
                    <div class=" ">













                        <?php
                            include('..\connect.php');
                            $sql = "SELECT * FROM placement p,company c where c.c_id=p.c_id";
                                if($result = mysqli_query($conn, $sql))
                                {
                                   if(mysqli_num_rows($result) > 0)
                                   {
                                         while($row = mysqli_fetch_array($result))
                                             {
                                                
                                           ?>




                        <div id="container" class="w-full mx-auto">
                            <div class="grid grid-cols-1 ">
                                <!-- Card 1 -->

                                <div class="w-1/2  p-3 mx-auto  ">
                                    <div class="bg-white px-6 py-8 rounded-lg shadow-lg  ">
                                        <div class="flex">
                                        <div class="mb-3 w-full relative px-5">
                                            <img class="object-fit relative w-3/5 rounded-full  "
                                                src="<?php echo $row['logo'];?>" alt="" />
                                            <h3 class="text-xs font-bold text-gray-700   pt-5 ">
                                                Position: <?php echo $row['position'];?></h3>
                                            <h3 class="text-xs font-bold  text-gray-700   pt-5 ">
                                            Requirement: <?php echo $row['requirement'];?></h3>
                                            <h3 class="text-xs font-bold text-gray-700   pt-5 ">
                                                salary: $<?php echo $row['salary'];?></h3>
                                            <h3 class="text-xs font-bold text-gray-700   pt-5 ">
                                                Placement Date: <?php echo $row['d_date'];?></h3>
                                        </div>
                                        <div class="relative">
                                            <h2 class="text-2xl font-medium text-gray-700 text-center  pt-5   ">
                                                <?php echo $row['name'];?></h2>
                                            <br>
                                            
                                                <p class="text-xs font-medium text-gray-700 text-center  pt-5   "><?php echo $row['description'];?></p>
                                        </div>
                                        </div>
                                        <p class="text-xl font-medium text-gray-700 text-center  pt-5   ">What will you be doing: <?php echo $row['about'];?></p>
                                        <br><p class="float-right font-light text-gray-700">Uploaded at: <?php echo $row['uploaded_at'];?></p>
                                    </div>


                                </div>




                            </div>




                            <?php 
                                     }
                                     // Free result set
                                 mysqli_free_result($result);
                                } else  {
                                         echo "No Training Available .";
                                        }
                            } else  {
                                     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                     }

                    // Close connection
            mysqli_close($conn);
            ?>



                        </div>













                    </div>
                </div>
            </main>


        </div>

    </div>
    <?php
include('..\public\components\footer.php');
?>