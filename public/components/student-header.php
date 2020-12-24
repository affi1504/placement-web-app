
<header class="w-full flex items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-2/3">
        <div>
           
            <a href="dashboard.php?"
                class="py-2 px-8 mx-4 font-semibold rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 ">Home</a>
            <a href="training.php"
                class="py-2 px-8 mx-4 font-semibold rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 ">Placement
                trainings</a>
            <a href="company.php"
                class="py-2 px-8 mx-4 font-semibold rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700">Company
                profiles</a>
            <a href="placement.php"
                class="py-2 px-8 mx-4 font-semibold rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 ">Placement
                Drives</a>
        </div>

    </div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen"
            class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
            <a href="../profile.php" class="block px-4 py-2 account-link hover:text-white">Account</a>
            <a href="../logout.php" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
        </div>
    </div>
</header>