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
                        <i class="fas fa-list mr-3"></i> Companies
                    </p>
                    <div class=" ">




                  

                      











                        <div id="container" class="w-full mx-auto">
                            <div class="grid grid-cols-4 ">
                                <!-- Card 1 -->  <?php
                            include('..\connect.php');
                            $sql = "SELECT * FROM company";
                                if($result = mysqli_query($conn, $sql))
                                {
                                   if(mysqli_num_rows($result) > 0)
                                   {
                                         while($row = mysqli_fetch_array($result))
                                             {
                                                
                                           ?>          
                    
                                <div class="w-full mx-auto p-3">
                                    <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
                                        <div class="mb-3">
                                            <img class="object-contain w-25 h-20 mx-auto rounded-full "
                                                src="<?php echo $row['logo'];?>" alt="" />
                                        </div>
                                        <h2 class="text-xl font-medium text-gray-700"><?php echo $row['name'];?></h2>
                                        <h2 class=" mt-2 mb-2"> Contact Information</h2>
                                        <a class=" block "><?php echo $row['email'];?></a>
                                        <a class=" block "><?php echo $row['p_no'];?></a>
                                        <a class="text-blue-500 block "><?php echo $row['link'];?></a>

                                   
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
                </div>
            </main>


        </div>

    </div>
    <?php
include('..\public\components\footer.php');
?>