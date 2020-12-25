<?php
include('..\public\components\header.php'); 
include('..\connect.php');
include('session.php');

if (isset($_POST['submit'])){  
    $company_name=$_POST['cname'];
    $company_email=$_POST['cemail'];
    $company_address=$_POST['caddress'];
    $company_description=$_POST['cdescription'];
    $company_link=$_POST['clink'];
    $company_phone=$_POST['cphone'];

    
       
    $company_logo = $_FILES['logo']['name'];
    


    // destination of the file on the server
    $destinationlogo = '../public/assets/logo/'.$company_logo;

    // get the file extension
    $extensionlogo = pathinfo( $company_logo, PATHINFO_EXTENSION);
    // the physical file on a temporary uploads directory on the server
    $filelogo = $_FILES['logo']['tmp_name'];
    $sizelogo = $_FILES['logo']['size'];

    if (!in_array($extensionlogo, ['jpg', 'pdf', 'jpeg']))  {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif  ($_FILES['logo']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($filelogo, $destinationlogo))  {
            $sql = "INSERT INTO company (name,email,address,description,link,p_no,logo)
            VALUES ('$company_name','$company_email','$company_address','$company_description','$company_link','$company_phone','$destinationlogo')";
                 if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Insert Successfull')</script>";
            }
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
                <h1 class="text-3xl text-black pb-6">Companies</h1>

                <button
                    class="w-1/4 float-right bg-indigo-600 font-semibold py-2 mt-5 rounded-br-lg show-modal rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-indigo-800 flex items-center justify-center text-white ">
                    <i class="fas fa-plus mr-3"></i> New Company
                </button>

                <div
                    class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden overflow-auto">
                    <!-- modal -->
                    <div class="bg-white rounded shadow-lg w-1/2 h-3/4">
                        <!-- modal header -->
                        <div class="border-b px-4 py-2 flex justify-between items-center ">
                            <h3 class="font-semibold text-lg">Add Companies</h3>
                            <button class="text-black close-modal">&cross;</button>
                        </div>
                        <!-- modal body -->



                        <form action="companies.php" method="POST" enctype="multipart/form-data">
                            <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Company Name</label>
                                    <input type="text" name="cname"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Name">
                                </div>


                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Email</label>
                                    <input type="text" name="cemail"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Email">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Address</label>
                                    <textarea rows="4" cols="50" name="caddress"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Description</label>
                                    <textarea rows="4" cols="50" name="cdescription"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
                                    </textarea>
                                </div>



                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">link</label>
                                    <input type="text" name="clink"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Website">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Phone Number</label>
                                    <input type="tel" name="cphone"
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Phone Number">
                                </div>


                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Logo</label>
                                    <input type="file" name="logo"
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
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Company Name</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">link</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone number</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">edit</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">delete</th>
                                </tr>
                            </thead>


                            <?php
                                $sql = "SELECT * FROM company";
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
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="mailto:<?php echo  $row['email'] ;?>"><?php echo  $row['email'] ;?></a>
                                    </td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="<?php echo  $row['link'] ;?>"><?php echo  $row['link'] ;?></a></td>
                                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                                            href="tel:<?php echo  $row['p_no'] ;?>"><?php echo  $row['p_no'] ;?></a>
                                    </td>


                                    <td>
                                        <a
                                            class="border border-yellow bg-yellow-500 text-white rounded-md py-2 px-4 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            class="border border-red bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                            href="delete.php?id=<?php echo $row['0']; ?>&&idd=c_id&&table=company&&head=companies.php">
                                            Delete
                                        </a>
                                    </td>
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

    <?php 
include('..\public\components\footer.php');
?>