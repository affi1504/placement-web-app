<?php
include('..\public\components\header.php');
include('session.php');
?>
 
<body class="bg-gray-100 font-family-karla flex">

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
                <h1 class="text-3xl text-black pb-6">Dashboard</h1>

                <div class="w-full mt-12">
                <div id="container" class="w-full mx-auto">
                            <div class="grid grid-cols-4 ">
                                <!-- Card 1 -->        
                    
                                <div class="w-full mx-auto p-3">
                                    <div class="bg-blue-600 px-6 py-8 rounded-lg shadow-lg text-center shadow-lg hover:shadow-xl hover:bg-indigo-800">  
                                    <h1 class="text-xl font-medium text-white">No Of Students</h1>  
                                        <h2 class="text-xl font-medium text-white">  <?php
                            include('..\connect.php');
                                $sql = "SELECT COUNT(s_id) FROM student";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                     echo $row[0];
                                                    }
                                                    // Free result set
                                                mysqli_free_result($result);
                                               } else  {
                                                        echo "No Training Available .";
                                                       }
                                           } else  {
                                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }
               
                                 ?>
                                                    
                                                      </h2>
                                    </div>
                                    
                                </div>
                                
                                <div class="w-full mx-auto p-3">
                                <div class="bg-blue-600 px-6 py-8 rounded-lg shadow-lg text-center shadow-lg hover:shadow-xl hover:bg-indigo-800">  
                                    <h1 class="text-xl font-medium text-white">No of Companies</h1>  
                                        <h2 class="text-xl font-medium text-white"><?php
                            include('..\connect.php');
                                $sql = "SELECT COUNT(c_id) FROM company";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                     echo $row[0];
                                                    }
                                                    // Free result set
                                                mysqli_free_result($result);
                                               } else  {
                                                        echo "No Training Available .";
                                                       }
                                           } else  {
                                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }
               
                                 ?></h2>
                                    </div>
                                    
                                </div>
                                
                                <div class="w-full mx-auto p-3">
                                <div class="bg-blue-600 px-6 py-8 rounded-lg shadow-lg text-center shadow-lg hover:shadow-xl hover:bg-indigo-800">  
                                    <h1 class="text-xl font-medium text-white">No of Trainings</h1>  
                                        <h2 class="text-xl font-medium text-white"><?php
                            include('..\connect.php');
                                $sql = "SELECT COUNT(t_id) FROM training";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                     echo $row[0];
                                                    }
                                                    // Free result set
                                                mysqli_free_result($result);
                                               } else  {
                                                        echo "No Training Available .";
                                                       }
                                           } else  {
                                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }
               
                                 ?></h2>
                                    </div>
                                    
                                </div>
                                
                                <div class="w-full mx-auto p-3">
                                <div class="bg-blue-600 px-6 py-8 rounded-lg shadow-lg text-center shadow-lg hover:shadow-xl hover:bg-indigo-800">  
                                    <h1 class="text-xl font-medium text-white">No of Placements</h1>  
                                        <h2 class="text-xl font-medium text-white"><?php
                            include('..\connect.php');
                                $sql = "SELECT COUNT(p_id) FROM placement";
                                    if($result = mysqli_query($conn, $sql))
                                    {
                                       if(mysqli_num_rows($result) > 0)
                                       {
                                             while($row = mysqli_fetch_array($result))
                                                 {
                                                     echo $row[0];
                                                    }
                                                    // Free result set
                                                mysqli_free_result($result);
                                               } else  {
                                                        echo "No Training Available .";
                                                       }
                                           } else  {
                                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                                    }
               
                                 ?></h2>
                                    </div>
                                    
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