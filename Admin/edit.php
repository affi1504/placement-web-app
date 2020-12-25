<?php
include('..\public\components\header.php');
include('..\connect.php');
include('session.php');
$id=$_GET['id'];

$result = mysqli_query($conn,"select * from student where s_id='$id'"); // select query
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])){  
    $student_name=$_POST['sname'];
    $student_username=$_POST['susername'];
    $student_email=$_POST['semail'];
    $student_dob=$_POST['sdob'];
    $student_gender=$_POST['sgender'];
    $student_course=$_POST['scourse'];
    $student_college=$_POST['scollege'];
    $student_yog=$_POST['syog'];
    $student_gpa=$_POST['sgpa'];
    $edit = "UPDATE student SET name='$student_name', username='$student_username', email='$student_email',dob='$student_dob',gender='$student_gender',course_name='$student_course',college_name='$student_college',yog='$student_yog',gpa='$student_gpa' WHERE student.s_id='$id'";
       if (mysqli_query($conn, $edit)) {
        echo "<script>alert('update Successfull')</script>";

                 }
 else {
    echo "<script>alert('Sorry,!!Insert Unuccessfull')</script>";
}     
header(('location:students.php'));

}

    

?>

<!-- modal -->
<div class="bg-indigo-600 rounded  mt-5 mb-5 pt-10 pb-10 w-1/2 h-3/4 px-10 m-auto">
    <div class="border-b px-4 py-2 flex justify-between items-center ">
        <h3 class="font-semibold text-lg text-white m-auto">Update Student</h3>
    </div>
    <form method="post">
        <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Full Name</label>
                <input type="text" name="sname" value="<?php echo $row['name'] ?>" required
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
            </div>
            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Username</label>
                <input type="text" name="susername" value="<?php echo $row['username'] ?>"required
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
            </div>

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Email</label>
                <input type="text" name="semail" value="<?php echo $row['email'] ?>"required
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
            </div>

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Date of Birth</label>
                <input type="date" name="sdob" required value="<?php echo $row['dob'] ?>">

            </div>
            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Gender</label>
                <input type="radio" id="male" name="sgender" required value="male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="sgender" required value="female">
                <label for="female">Female</label><br>
                <input type="radio" id="other" name="sgender" required value="other">
                <label for="other">Other</label>
            </div>

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Course Name</label>
                <input type="text" name="scourse" required value="<?php echo $row['course_name'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
            </div>

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">College Name</label>
                <input type="text" name="scollege" required value="<?php echo $row['college_name'] ?>"
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow">
            </div>

            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">Year of graduation</label>
                <input type="date" name="syog" required value="<?php echo $row['yog'] ?>">

            </div>
            <div class="mb-4">
                <label class="font-bold text-indigo-600 block mb-2">GPA</label>
                <input type="text" name="sgpa" required value="<?php echo $row['gpa'] ?>"
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