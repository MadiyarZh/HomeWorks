<?php
require('connect.php');

$id = $_GET['id'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM users WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: index.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>