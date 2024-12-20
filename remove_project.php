<?php 
    require_once 'db_connection.php';

    if (isset($_GET['id'])) {
        $project_id = $_GET['id'];
    
        $delete_sql = "DELETE FROM projects WHERE id_projet = $project_id";
    
        if ($conn->query($delete_sql) === TRUE) {
            header("Location: admin_dashboard.php"); 
            exit;
        } else {
            echo "Error deleting project: " . $conn->error;
        }
    } else {
        echo "No project ID provided!";
    }
?>