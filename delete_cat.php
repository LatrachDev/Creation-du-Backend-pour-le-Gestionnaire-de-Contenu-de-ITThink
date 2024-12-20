<?php
require_once 'db_connection.php';

if (isset($_GET['id'])) {
    $categoryId = intval($_GET['id']);
    $sql = "DELETE FROM categories WHERE id_categorie = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $categoryId);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php?message=Category deleted successfully");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid category ID.";
}
?>
