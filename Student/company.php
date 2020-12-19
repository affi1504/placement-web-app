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
                        <i class="fas fa-list mr-3"></i> Latest Reports
                    </p>
                    <div class=" overflow-auto">








                        <div id="container" class="w-full mx-auto">
                            <div class="grid grid-cols-4 ">
                                <!-- Card 1 -->
                                <div class="w-full p-2">
                                    <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
                                        <div class="mb-3">
                                            <img class="w-auto mx-auto rounded-full"
                                                src="https://i.pravatar.cc/150?img=66" alt="" />
                                        </div>
                                        <h2 class="text-xl font-medium text-gray-700">Pande Muliada</h2>
                                        <span class="text-blue-500 block mb-5">Front End Developer</span>

                                        <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">Hire</a>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div class="w-full p-2">
                                    <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
                                        <div class="mb-3">
                                            <img class="w-auto mx-auto rounded-full"
                                                src="https://i.pravatar.cc/150?img=31" alt="" />
                                        </div>
                                        <h2 class="text-xl font-medium text-gray-700">Saraswati Cahyati</h2>
                                        <span class="text-blue-500 block mb-5">Back End Developer</span>

                                        <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">Hire</a>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div class="w-full p-2">
                                    <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
                                        <div class="mb-3">
                                            <img class="w-auto mx-auto rounded-full"
                                                src="https://i.pravatar.cc/150?img=18" alt="" />
                                        </div>
                                        <h2 class="text-xl font-medium text-gray-700">Wayan Alex</h2>
                                        <span class="text-blue-500 block mb-5">Data Scientist</span>

                                        <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">Hire</a>
                                    </div>
                                </div>

                                <!-- Card 4 -->
                                <div class="w-full mx-auto p-2">
                                    <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
                                        <div class="mb-3">
                                            <img class="w-auto mx-auto rounded-full"
                                                src="https://i.pravatar.cc/150?img=28" alt="" />
                                        </div>
                                        <h2 class="text-xl font-medium text-gray-700">Ketut Julia</h2>
                                        <span class="text-blue-500 block mb-5">Project Manager</span>

                                        <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full">Hire</a>
                                    </div>
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