<?php
session_start(); 
require_once 'database.php'; 

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $user_id = $_SESSION['user_id'];     
    $title = $_POST['title'];            
    $content = $_POST['content'];       
    $imagePath = NULL;                  

    // Check if an image was uploaded
    if (!empty($_FILES['image']['name'])) {
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']; 
        $uploadDir = "../img/";                     
        $fileName = time() . "_" . basename($_FILES['image']['name']); 
        $filePath = $uploadDir . $fileName;            
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 

        // Validate file type
        if (!in_array($fileExt, $allowedTypes)) {
            exit("Invalid file type."); // Stop if file type is not allowed
        }

        // Move uploaded file to the target directory
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            exit("Error uploading image."); // Stop if upload fails
        }

        // Store relative path for database
        $imagePath = "img/" . $fileName;
    }

    // Create a new database connection
    $database = new Database();
    $conn = $database->getConnection();

    // Prepare and execute the SQL insert query
    $sql = "INSERT INTO posts (user_id, title, content, image) VALUES (:user_id, :title, :content, :image)";
    $stmt = $conn->prepare($sql);

    $success = $stmt->execute([
        ':user_id' => $user_id,
        ':title' => $title,
        ':content' => $content,
        ':image' => $imagePath
    ]);

    // Redirect to home if post was successfully saved
    if ($success) {
        header("Location: ../home.php");
        exit();
    } else {
        // Show error if insert fails
        echo "Error saving post.";
    }

    // Close the database connection
    $conn = null;
}
?>

