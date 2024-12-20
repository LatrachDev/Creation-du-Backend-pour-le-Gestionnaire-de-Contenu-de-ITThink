<?php
require_once 'db_connection.php';

if (isset($_GET['id'])) {
    $categoryId = intval($_GET['id']);
    $sql = "SELECT * FROM categories WHERE id_categorie = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newName = trim($_POST['nom_categorie']);
        if (!empty($newName)) {
            $updateSql = "UPDATE categories SET nom_categorie = ? WHERE id_categorie = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param('si', $newName, $categoryId);

            if ($updateStmt->execute()) {
                header("Location: admin_dashboard.php?message=Category updated successfully");
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Category name cannot be empty.";
        }
    }
} else {
    echo "Invalid category ID.";
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
        <div class="mx-auto p-6">
            <h1 class="text-2xl font-bold mb-4 text-indigo-600 text-center mt-20">Update category</h1>
            
            <?php if ($category): ?>
                <form method="POST" action="" class="bg-white w-6/12 mt-10 h-52 p-6 rounded-lg mx-auto shadow-md space-y-4">
                <div>
                    <label for="nom_categorie" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label>
                    <input type="text" id="nom_categorie" name="nom_categorie" 
                        value="<?= htmlspecialchars($category['nom_categorie']) ?>" 
                        required
                        class="shadow-sm border focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2">
                </div>
                <div class="w-full flex">
                    <button type="submit" class="w-4/12 mx-auto mt-5 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">
                        Update Category
                    </button>
                </div>
            </form>
            <?php endif; ?>
    </div>
</body>
</html>