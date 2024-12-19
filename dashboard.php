<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="JavaScript/tailwind.js"></script>
</head>
<body class="bg-gray-100">
    
    <!-- Dashboard Home Page -->
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="flex">
            <aside class="w-64 bg-indigo-600 text-white flex-shrink-0 min-h-screen">
                <div class="p-6">
                    <h1 class="text-2xl font-bold">ITThink Dashboard</h1>
                </div>
                <nav class="px-4">
                    <ul>
                        <li class="mb-2">
                            <a href="#" class="block px-4 py-2 rounded-md hover:bg-indigo-500">Home</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="block px-4 py-2 rounded-md hover:bg-indigo-500">Users</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="block px-4 py-2 rounded-md hover:bg-indigo-500">Projects</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="block px-4 py-2 rounded-md hover:bg-indigo-500">Freelances</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="block px-4 py-2 rounded-md hover:bg-indigo-500">Categories</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Overview</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-700">Total Users</h3>
                        <p class="text-3xl font-bold text-indigo-500">120</p>
                    </div>
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-700">Published Projects</h3>
                        <p class="text-3xl font-bold text-indigo-500">45</p>
                    </div>
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-700">Active Freelancers</h3>
                        <p class="text-3xl font-bold text-indigo-500">30</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
