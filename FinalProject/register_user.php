<?php
require_once './php/database.php';  

// Create the Database class
$database = new Database();

// Get the database connection
$conn = $database->getConnection();

// Variables to store the user input data from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

$ok = true;

include './php/header.php';

// Validation checks 
if(empty($first_name)){
    $ok = false;
    echo '<p>First name cannot be empty</p>';
}
if(empty($last_name)){
    $ok = false;
    echo '<p>Last name cannot be empty</p>';
}
if(empty($username)){
    $ok = false;
    echo '<p>Username cannot be empty</p>';
}
if((empty($password)) || ($password != $confirm)){
    $ok = false;
    echo '<p>Password invalid</p>';
}

// If all validations pass, insert the data into the database
if ($ok) {
 
    // Hash the password 
    $password = hash('sha512', $password);

    // SQL query to insert the new user into the accounts table
    $sql = "INSERT INTO accounts (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";

    // Execute the query
    $conn->exec($sql);

    // Display a success message once the data is saved
    echo "<section class='success-row'>";
    echo "<div>";
    echo "<h3>User Saved</h3>";  
    echo "</div>";
    echo "</section>";

    // Close the database connection
    $conn = null; 
}
?>

<?php require ('./php/footer.php'); ?>

