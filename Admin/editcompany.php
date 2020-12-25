<?php
include('..\public\components\header.php');
include('..\connect.php');
include('session.php');
$id=$_GET['id'];
$result = mysqli_query($conn,"select * from company where c_id='$id'"); // select query
$row = mysqli_fetch_array($result);
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
    if(!($company_logo==$row['logo_name']))
    {
        if($company_logo==NULL)
       {
            $company_logo=$row['logo_name'];
            $destinationlogo=$row['logo'];

        }
        else{

        
        $logopath="E:/Apps/xamp/htdocs/dashboard/placement-web-app/public/assets/logo/" .$row['logo_name'];
        if(file_exists($logopath))
        unlink($logopath);
        }
    }
    if (!in_array($extensionlogo, ['jpg', 'pdf', 'jpeg']))  {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif  ($_FILES['logo']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($filelogo, $destinationlogo))  {
            $edit = "UPDATE company SET name=' $company_name',email='$company_email',address='$company_address',description='$company_description',link='$company_link',p_no='$company_phone',logo='$destinationlogo',logo_name='$company_logo' WHERE c_id='$id'";
                 if (mysqli_query($conn, $edit)) {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Update Successfull");';
                    echo 'window.location.href = "companies.php";';
                    echo '</script>';            }
        } else {
            echo "Insert Unsuccessfull.";
        }
    }
       
}

    

?>

<!-- modal -->
<div class="bg-indigo-600 rounded  mt-5 mb-5 pt-10 pb-10 w-1/2 h-3/4 px-10 m-auto">
    <div class="border-b px-4 py-2 flex justify-between items-center ">
        <h3 class="font-semibold text-lg text-white m-auto">Update Student</h3>
    </div>
    <form method="POST" enctype="multipart/form-data">
                            <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Company Name</label>
                                    <input type="text" name="cname" value="<?php echo $row['name'] ?>" required
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Name">
                                </div>


                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Email</label>
                                    <input type="text" name="cemail" value="<?php echo $row['email'] ?>" required
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Email">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Address</label>
                                    <textarea rows="4" cols="50" name="caddress" required
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"><?php echo $row['address'] ?>
                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Description</label>
                                    <textarea rows="4" cols="50" name="cdescription" required
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"><?php echo $row['description'] ?>
                                    </textarea>
                                </div>



                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">link</label>
                                    <input type="text" name="clink" value="<?php echo $row['link'] ?>" required
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Website">
                                </div>

                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Phone Number</label>
                                    <input type="tel" name="cphone" value="<?php echo $row['p_no'] ?>" required
                                        class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                                        placeholder="Company Phone Number">
                                </div>


                                <div class="mb-4">
                                    <label class="font-bold text-indigo-600 block mb-2">Logo</label>
                                    <input type="file" name="logo" value="<?php echo $row['logo'] ?>" required
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