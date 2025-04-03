<?php
session_start(); // Start the session to access session variables

require_once 'database.php'; // Include the database connection class

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']); // Hash the password using SHA-512

    // Create a new database connection
    $database = new Database();
    $conn = $database->getConnection();

    // Check if the user is an admin
    $sql_admin = "SELECT * FROM admin_accounts WHERE username = :username";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->execute([':username' => $username]);

    // If an admin record is found, log them in as admin
    if ($stmt_admin->rowCount() > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = true;
        header("Location: ../admin_view.php"); 
        exit();
    }

    // Check if a normal user exists with the provided credentials
    $sql = "SELECT id FROM accounts WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the result row

    // If user is found, log them in
    if ($row) {
        $_SESSION['user_id'] = $row['id'];
        header('Location: ../home.php'); // Redirect to home page
        exit();
    } else {
        // If no match is found, show error
        echo "Invalid login.";
    }

    // Close the database connection
    $conn = null;
}
?>


