<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="fixed inset-y-0 left-0 w-64 bg-[#1a1f37] text-white transition-all duration-300 z-10">
        <div class="flex items-center justify-center h-16 border-b border-gray-700">
            <span class="text-2xl font-bold text-green-400">IT</span>
            <span class="text-2xl font-bold">THINK</span>
        </div>
        <div class="p-4">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-lg font-bold">
                    
                </div>
                <div>
                    <p class="font-medium"></p>
                    <p class="text-sm text-gray-400"></p>
                </div>
            </div>
            <nav class="space-y-2">
                <a href="#" class="flex items-center space-x-2 px-4 py-2.5 rounded-lg bg-[#252d4a] text-white hover:bg-[#2c365a] transition-all">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-2 px-4 py-2.5 rounded-lg text-gray-400 hover:bg-[#252d4a] transition-all">
                    <i class="fas fa-project-diagram"></i>
                    <span>Projects</span>
                </a>
                <a href="logout.php" class="flex items-center space-x-2 px-4 py-2.5 rounded-lg text-red-400 hover:bg-[#252d4a] transition-all">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </div>
    </div>

    <div class="ml-64 min-h-screen">
    
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <h1 class="text-xl font-semibold text-gray-800">My Projects</h1>
                    <button onclick="document.getElementById('createProjectModal').classList.remove('hidden')" 
                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>New Project</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r"></div>
            <?php endif; ?>

            
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
        
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                               
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-3">
                                    <button onclick="openEditModal(<?php echo $project['project_id']; ?>, '<?php echo addslashes($project['title']); ?>', '<?php echo addslashes($project['description']); ?>', <?php echo $project['category_id']; ?>)" 
                                            class="text-blue-600 hover:text-blue-900 transition-all">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="if(confirm('Are you sure you want to delete this project?')) window.location.href='delete_project.php?id=<?php echo $project['project_id']; ?>'" 
                                            class="text-red-600 hover:text-red-900 transition-all">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Project Modal -->
    <div id="createProjectModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="min-h-screen px-4 text-center">
            <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Create New Project</h3>
                        <button onclick="document.getElementById('createProjectModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form method="POST">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="title">Title</label>
                                <input type="text" id="title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                                <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="category_id">Category</label>
                                <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['category_id']; ?>"><?php echo htmlspecialchars($category['category_name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-2">
                            <button type="button" onclick="document.getElementById('createProjectModal').classList.add('hidden')" 
                                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                                Create Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Project Modal -->
    <div id="editProjectModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="min-h-screen px-4 text-center">
            <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Edit Project</h3>
                        <button onclick="document.getElementById('editProjectModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form action="edit_operations.php" method="POST">
                        <input type="hidden" id="edit_project_id" name="project_id">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="edit_title">Title</label>
                                <input type="text" id="edit_title" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="edit_description">Description</label>
                                <textarea id="edit_description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="edit_category">Category</label>
                                <select id="edit_category" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['category_id']; ?>"><?php echo htmlspecialchars($category['category_name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 flex justify-end space-x-2">
                            <button type="button" onclick="document.getElementById('editProjectModal').classList.add('hidden')" 
                                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                                Update Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function openEditModal(projectId, title, description, categoryId) {
        document.getElementById('edit_project_id').value = projectId;
        document.getElementById('edit_title').value = title;
        document.getElementById('edit_description').value = description;
        document.getElementById('edit_category').value = categoryId;
        document.getElementById('editProjectModal').classList.remove('hidden');
    }
    </script>
</body>
</html>