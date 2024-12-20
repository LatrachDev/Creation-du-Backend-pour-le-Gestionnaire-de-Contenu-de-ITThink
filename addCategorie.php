<?php
require_once 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryName = trim($_POST['nom_categorie']);
    if (!empty($categoryName)) {
        $sql = "INSERT INTO categories (nom_categorie) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $categoryName);

        if ($stmt->execute()) {
            header("Location: admin_dashboard.php?message=Category added successfully");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Category name cannot be empty.";
    }
}
?>

<form method="POST" action="">
    <label for="nom_categorie">Category Name:</label>
    <input type="text" id="nom_categorie" name="nom_categorie" required>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Category</button>
</form>
