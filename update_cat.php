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

<?php if ($category): ?>
    <form method="POST" action="">
        <label for="nom_categorie">Category Name:</label>
        <input type="text" id="nom_categorie" name="nom_categorie" value="<?= htmlspecialchars($category['nom_categorie']) ?>" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Category</button>
    </form>
<?php endif; ?>
