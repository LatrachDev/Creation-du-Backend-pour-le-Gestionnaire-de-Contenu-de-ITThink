<?php 
    require_once 'db_connection.php';

    if (isset($_GET['id'])) {
        $project_id = $_GET['id'];
    
        $sql = "SELECT * FROM projects WHERE id_projet = $project_id";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $project = $result->fetch_assoc();
        } else {
            echo "Project not found!";
            exit;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titre = $_POST['titre_projet'];
        $status = $_POST['status'];
        $description = $_POST['projet_description'];
    
        $update_sql = "UPDATE projects 
                       SET titre_projet = '$titre', status = '$status', projet_description = '$description' 
                       WHERE id_projet = $project_id";
    
        if ($conn->query($update_sql) === TRUE) {
            header("Location: admin_dashboard.php");
            exit;
        } else {
            echo "Error updating project: " . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <script src="Javascript/tailwind.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Project</h1>
        <form method="POST" class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="titre_projet" value="<?php echo $project['titre_projet']; ?>" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="pending" <?php if ($project['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                    <option value="done" <?php if ($project['status'] == 'done') echo 'selected'; ?>>Done</option>
                    <option value="in-progress" <?php if ($project['status'] == 'in-progress') echo 'selected'; ?>>In Progress</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="projet_description" rows="4" class="mt-1 block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo $project['projet_description']; ?></textarea>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
                <a href="admin_dashboard.php" class="text-blue-500 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
