<?php
include('..\public\components\header.php');
include('..\connect.php');
include('session.php');
$id=$_GET['id'];
$result = mysqli_query($conn,"select * from training where t_id='$id'"); // select query
$row = mysqli_fetch_array($result);
if (isset($_POST['submit'])){  
    $trainingname=$_POST['tname'];
    $trainingdate=$_POST['tdate'];
    $trainer=$_POST['trainer'];
    $trainingstatus=$_POST['sstatus'];
            $edit = "UPDATE training SET name='$trainingname',training_at='$trainingdate',trained_by='$trainer',status='$trainingstatus' WHERE training.t_id='$id'";
                 if (mysqli_query($conn, $edit)) 
                 {
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Update Successfull");';
                    echo 'window.location.href = "trainings.php";';
                    echo '</script>';           
                 }
                 else {
            echo "Insert Unsuccessfull.";
                 }
    }
?>

<!-- modal -->
<div class="bg-indigo-600 rounded  mt-5 mb-5 pt-10 pb-10 w-1/2 h-3/4 px-10 m-auto">
    <div class="border-b px-4 py-2 flex justify-between items-center ">
        <h3 class="font-semibold text-lg text-white m-auto">Update Training</h3>
    </div>
    <form method="POST">
        <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Trainig Name</label>
                <input type="text" name="tname" value="<?php echo $row['name'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                    >
            </div>

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Training Date</label>
                <input type="date" name="tdate" value="<?php echo $row['training_at'] ?>">

            </div>

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Trained By</label>
                <input type="text" name="trainer" value="<?php echo $row['trained_by'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                    >
            </div>
            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Status of the training</label>
                <input type="text" name="sstatus" value="<?php echo $row['status'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow"
                    >
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