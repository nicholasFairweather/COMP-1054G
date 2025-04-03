<?php
session_start(); 
require_once 'database.php';

// Create a new database connection
$database = new Database();
$conn = $database->getConnection();

// Get the post ID from the URL
$post_id = $_GET['id'];

// Prepare the SQL statement to delete the post
$sql = "DELETE FROM posts WHERE id = :id AND user_id = :user_id";
$stmt = $conn->prepare($sql);

// Execute the delete query with post ID and current user ID
$success = $stmt->execute([
    ':id' => $post_id,
    ':user_id' => $_SESSION['user_id']
]);

// Redirect to home if successful, otherwise show error
if ($success) {
    header("Location: ../home.php");
    exit();
} else {
    echo "Error deleting post.";
}

// Close the database connection
$conn = null;
?>

