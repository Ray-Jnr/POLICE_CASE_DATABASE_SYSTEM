<?php
// Include database connection file
require_once 'database.php';

if (isset($_POST["sub_mit"])) {
    $ServiceNumber = mysqli_real_escape_string($conn, $_POST['ServiceNumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password for security
    $hashed_password = md5($password);
    
    // Insert the new admin into the database
    $sql = "INSERT INTO users (ServiceNumber, password) VALUES ('$ServiceNumber', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New administrator added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
