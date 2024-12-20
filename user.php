<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="Javascript/tailwind.js"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-indigo-600 text-white py-4 shadow-lg">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Welcome, User!</h1>
                <nav class="space-x-4">
                    <a href="#profile" class="hover:underline">Profile</a>
                    <a href="#projects" class="hover:underline">My Projects</a>
                    <a href="#settings" class="hover:underline">Settings</a>
                    <a href="logout.php" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Logout</a>
                </nav>
            </div>
        </header>

        <main class="flex-1 container mx-auto px-6 py-8">
            <section id="profile" class="mb-8">
                <h2 class="text-xl font-bold text-indigo-600 mb-4">Profile</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="font-semibold text-gray-700">Name:</h3>
                            <p class="text-gray-600">John Doe</p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700">Email:</h3>
                            <p class="text-gray-600">john.doe@example.com</p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700">Membership:</h3>
                            <p class="text-gray-600">Premium User</p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700">Joined:</h3>
                            <p class="text-gray-600">January 1, 2024</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="projects" class="mb-8">
                <h2 class="text-xl font-bold text-indigo-600 mb-4">My Projects</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-6 py-3 text-gray-600 text-sm font-semibold uppercase">ID</th>
                                <th class="px-6 py-3 text-gray-600 text-sm font-semibold uppercase">Title</th>
                                <th class="px-6 py-3 text-gray-600 text-sm font-semibold uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 text-gray-700">1</td>
                                <td class="px-6 py-4 text-gray-700">Project Alpha</td>
                                <td class="px-6 py-4 text-gray-700">In Progress</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-gray-700">2</td>
                                <td class="px-6 py-4 text-gray-700">Project Beta</td>
                                <td class="px-6 py-4 text-gray-700">Completed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="settings" class="mb-8">
                <h2 class="text-xl font-bold text-indigo-600 mb-4">Settings</h2>
                <div class="bg-white rounded-lg shadow p-6">
                    <form action="update_profile.php" method="POST">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-semibold mb-2">Name:</label>
                                <input type="text" id="name" name="name" value="John Doe" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                                <input type="email" id="email" name="email" value="john.doe@example.com" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300">
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <footer class="bg-indigo-600 text-white py-4">
            <div class="container mx-auto px-6 text-center">
                <p>&copy; 2024 ITThink. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
