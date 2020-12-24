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

                <div >
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Latest Training
                    </p>
                    <div class=" overflow-auto">


                    <?php
                            include('..\connect.php');
                                $sql = "SELECT * FROM training";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                    
                                               ?>          
                        <div class="lg:flex shadow-lg border rounded-lg my-8 mx-20 ">
                            <div class="bg-indigo-600 rounded-lg lg:w-2/8 py-4 block h-full shadow-inner">
                                <div class="text-center tracking-wide">
                                    <div class="text-white font-bold text-4xl p-4 "><?php echo  $row['training_at'] ;?></div>
                                </div>
                            </div>
                            <div class="w-full  lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
                                <div class="flex flex-row lg:justify-start justify-center">
                                    
                                    <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                                        Organiser : ST.Joseph
                                    </div>
                                </div>
                                <div class="font-semibold text-gray-800 text-4xl text-center lg:text-left px-10 ">
                                <?php echo  $row['name']?>
                                </div>

                                <div class="text-gray-600 font-medium text-sm pt-2 text-center lg:text-left px-5">
                                   Trained By:<?php echo  $row['trained_by'] ;?>
                                </div>
                            </div>
                            <div
                                class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0 rounded-lg">
                                <span
                                    class="tracking-wider text-gray-600 bg-gray-200 px-2 text-sm rounded leading-loose mx-2 font-semibold">
                                    <?php echo  $row['status'] ;?>
                                </span>

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
            </main>


        </div>

    </div>
    <?php
include('..\public\components\footer.php');
?>