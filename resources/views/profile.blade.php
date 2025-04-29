<html>
<head>
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script>
        function toggleModal() {
            document.getElementById('modal').classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img alt="Logo" class="h-0" height="100" src="images/gopermit/LOGO4.png" width="100"/>
                </div>
                <nav class="flex space-x-4">
                    <a class="text-gray-800 hover:text-gray-600" href="#">Home</a>
                    <a class="text-gray-800 hover:text-gray-600" href="#">Data Perizinan</a>
                    <a class="text-gray-800 hover:text-gray-600" href="#">Activity</a>
                </nav>
                <div class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden">
                    <img alt="Profile Picture" class="w-full h-full object-cover" src="https://storage.googleapis.com/a1aa/image/uky4cAUMY_3JxL9z-T2S_WWade-vYp3rndTaNxkoUi0.jpg"/>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
            <!-- Profile Sidebar -->
            <div class="w-full md:w-1/3 flex flex-col items-center bg-white p-4 shadow-md rounded-md relative">
                <img alt="Profile Picture" class="w-32 h-32 rounded-full mb-4" height="150" src="https://storage.googleapis.com/a1aa/image/uky4cAUMY_3JxL9z-T2S_WWade-vYp3rndTaNxkoUi0.jpg" width="150"/>
                <button class="absolute top-4 right-4 bg-gray-200 p-2 rounded-full hover:bg-gray-300" onclick="toggleModal()">
                    <i class="fas fa-edit text-gray-600"></i>
                </button>
                <h2 class="text-xl font-bold">Muhammad Sumbul</h2>
                <p class="text-gray-600 text-center">
                    Sumerta, Kec. Denpasar Tim.,<br/>
                    Kota Denpasar, Bali
                </p>
            </div>
            <!-- Profile Form -->
            <div class="w-full md:w-2/3 mt-8 md:mt-0 md:ml-8 bg-white p-6 shadow-md rounded-md">
                <h2 class="text-2xl font-bold mb-4">Profile</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input class="w-full border border-gray-300 p-2 rounded-md" type="text"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input class="w-full border border-gray-300 p-2 rounded-md" type="email"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Phone</label>
                        <input class="w-full border border-gray-300 p-2 rounded-md" type="text"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat</label>
                        <input class="w-full border border-gray-300 p-2 rounded-md" type="text"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Current Password</label>
                        <input class="w-full border border-gray-300 p-2 rounded-md" type="password"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Password</label>
                        <input class="w-full border border-gray-300 p-2 rounded-md" type="password"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Confirm New Password</label>
                        <input class="w-full border border-gray-300 p-2 rounded-md" type="password"/>
                    </div>
                    <button class="bg-[#52B69A] text-white px-4 py-2 rounded-md" type="submit">Save Change</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-md shadow-md w-1/3">
            <h2 class="text-2xl font-bold mb-4">Edit Profile Picture</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700">Upload New Picture</label>
                    <input class="w-full border border-gray-300 p-2 rounded-md" type="file"/>
                </div>
                <div class="flex justify-end">
                    <button class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2" type="button" onclick="toggleModal()">Cancel</button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>