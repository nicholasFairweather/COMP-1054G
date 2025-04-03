<?php
session_start();
require_once 'database.php'; 

// Get data sent from the form
$post_id = $_POST['id'];       
$title = $_POST['title'];     
$content = $_POST['content'];  

// Create a new database connection
$database = new Database();
$conn = $database->getConnection();

// Prepare the SQL statement to update the post
$sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id AND user_id = :user_id";
$stmt = $conn->prepare($sql);

// Execute the query with parameters
$success = $stmt->execute([
    ':id' => $post_id,
    ':title' => $title,
    ':content' => $content,
    ':user_id' => $_SESSION['user_id'] 
]);

// Check if the update was successful
if ($success) {
    // Redirect back to home page after successful update
    header("Location: ../home.php");
} else {
    // Show error message if update failed
    echo "Error updating post.";
}

// Close the database connection
$conn = null;
?>


