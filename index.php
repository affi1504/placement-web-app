<?php
include('public\components\header.php'); 
?>

<body class="bg-indigo-600 h-screen font-sans">
    <div class="container mx-auto h-full flex justify-center items-center">
        <div class="w-1/6 mr-8" >
            <div class="border-teal p-4 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
            <img class="justify-center m-auto py-4 px-4" src="public\assets\images\avatar.png">
            <a href="Admin\login-admin.php" class="group relative flex shadow-lg m-auto justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                        Admin Sign in
            </a>
            </div>
        </div>
        <div class="w-1/6 mr-8" >
            <div class="border-teal p-4 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
            <img class="justify-center m-auto py-4 px-4" src="public\assets\images\avatar.png">
            <a href="Student\login.php" class="group relative flex m-auto justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none ">
                        Student Sign in
            </a>
            </div>
        </div>
    </div>
</body>


<?php
include('public\components\footer.php');
?>