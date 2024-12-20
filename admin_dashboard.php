<?php
    require_once 'db_connection.php';

    $total_users = $conn->query('SELECT COUNT(*) AS total_users FROM users')->fetch_assoc()['total_users'];
    $total_projects = $conn->query('SELECT COUNT(*) AS total_projects FROM projects')->fetch_assoc()['total_projects'];
    $total_freelancers = $conn->query('SELECT COUNT(*) AS total_freelancers FROM freelances')->fetch_assoc()['total_freelancers'];
    $total_testimonials = $conn->query('SELECT COUNT(*) AS total_testimonials FROM testimonials')->fetch_assoc()['total_testimonials'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="Javascript/tailwind.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Hide sections by default */
        .dashboard-section {
            display: none;
        }
        /* Show active section */
        .dashboard-section.active {
            display: block;
        }
        /* Active navigation state */
        .nav-link.active {
            background-color: #6366f1;
        }
    </style>
</head>
<body>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-40 sm:w-64 bg-indigo-600">
            <div class="p-6">
                <h1 class="text-white text-2xl font-bold">ITThink Dashboard</h1>
            </div>
            
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#statistics" onclick="showSection('statistics')" class="nav-link block text-white hover:bg-indigo-500 rounded p-2">
                            Statistics
                        </a>
                    </li>
                    <li>
                        <a href="#category" onclick="showSection('category')" class="nav-link block text-white hover:bg-indigo-500 rounded p-2">
                            Category management
                        </a>
                        </a>
                    </li>
                    <li>
                        <a href="#projects" onclick="showSection('projects')" class="nav-link block text-white hover:bg-indigo-500 rounded p-2">
                            Project management
                        </a>
                    </li>
                    <li>
                        <a href="#settings" onclick="showSection('settings')" class="nav-link block text-white hover:bg-indigo-500 rounded p-2">
                            Testimonial management
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-lg">
                <div class="p-4 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Welcome back!</h1>
                        <p class="text-gray-600">Mohammed Latrach</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 hover:bg-gray-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </button>
                        <div class="w-10 h-10 bg-gray-300 rounded-full overflow-hidden"><img class="w-full h-full object-cover object-center" src="images/myPic.JPG" alt="Admin picture"></div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <!-- statistics -->
                <section id="statistics" class="dashboard-section active">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-700 text-lg font-semibold mb-2">Total Users</h3>
                            <p class="text-3xl font-bold text-indigo-500"><?php echo $total_users ?></p>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-700 text-lg font-semibold mb-2">Active Projects</h3>
                            <p class="text-3xl font-bold text-indigo-500"><?php echo $total_projects ?></p>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-700 text-lg font-semibold mb-2">Total Freelancers</h3>
                            <p class="text-3xl font-bold text-indigo-500"><?php echo $total_freelancers ?></p>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-gray-700 text-lg font-semibold mb-2">Testimonials</h3>
                            <p class="text-3xl font-bold text-indigo-500"><?php echo $total_testimonials ?></p>
                        </div>
                    </div>
                </section>

                <!-- Category Management -->
                <section id="category" class="mb-8 dashboard-section">
                    <?php 
                        $sql_cat = "SELECT * FROM categories";
                        $cat_result = $conn -> query($sql_cat);
                    
                        if ($cat_result->num_rows > 0) {
                            $rows = $cat_result->fetch_all(MYSQLI_ASSOC);?>
                                                
                        <h2 class="text-2xl font-bold mb-4 text-indigo-600">Category Management</h2>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="mb-4 inline-block">
                                <a href="addCategorie.php" id="add_cat" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add new category</a>
                            </div>
                            <div class="mb-4 inline-block">
                                <a href="addSubCat.php" id="add_sub_cat" class="cursor-pointer bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Add new subcategory</a>
                            </div>
                            <div class="grid grid-cols-4 gap-4">
                                <?php foreach($rows as $row){?>
                                <div class="border p-4 rounded-lg">
                                        <h3 class="font-bold"><?=$row["nom_categorie"]?></h3>
                                        <div class="mt-4 space-x-2">
                                            <a href="update_cat.php?id=<?=$row['id_categorie']?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                                            <a href="delete_cat.php?id=<?=$row['id_categorie']?>" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php }else echo "no data";
                    ?> 
                </section>

                <!-- Projects Section -->
                <section id="projects" class="mb-8 dashboard-section active">
                    <h2 class="text-2xl font-bold mb-4 text-indigo-600">Projects management</h2>
                    <div class="bg-white rounded-lg shadow p-6">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php 
                                    $sql = "SELECT * FROM projects";
                                    $resultat = $conn->query($sql);
                                    while ($row = mysqli_fetch_array($resultat)) {
                                        ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["id_projet"]?></td>
                                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["titre_projet"]?></td>
                                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row["status"]?></td>
                                            <td class="px-6 py-4"><?php echo $row["projet_description"]?></td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="edit_project.php?id=<?=$row["id_projet"]?>" class="edit-btn bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 cursor-pointer">Modifier</a>
                                                <a href="remove_project.php?id=<?=$row["id_projet"]?>" class="edit-btn bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 cursor-pointer">Remove</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Testimonial management -->
                <section id="settings" class="dashboard-section">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Testimonial management</h2>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.dashboard-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Update active navigation state
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`a[href="#${sectionId}"]`).classList.add('active');
        }

        // Check URL hash on page load
        window.addEventListener('load', () => {
            const hash = window.location.hash.slice(1) || 'statistics';
            showSection(hash);
        });
    </script>
</body>
</html>