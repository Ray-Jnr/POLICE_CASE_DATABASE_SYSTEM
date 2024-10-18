<?php

    require_once 'database.php';
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // SQL query to delete the user
        $sql = "DELETE FROM users WHERE id = '$id'";
    
        if (mysqli_query($conn, $sql)) {
            echo "User deleted successfully!";
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
        // Redirect to the admin panel or another page
        header("Location: unauthorized.php");
        exit;
    } else {
        echo "Invalid request.";
    }
 ?>
    
