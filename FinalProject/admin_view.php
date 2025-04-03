<?php require ('./php/header.php'); ?> 

<?php
require_once './php/database.php'; 

// Create a new Database instance and establish a connection
$db = new Database();
$conn = $db->getConnection();

// SQL query to fetch all users from the accounts table
$sql = "SELECT id, first_name, last_name, username FROM accounts";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Fetch all user records as an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="feed">
        <?php
        // Check if there are any users and display them in a table
        if ($users) {
            echo "<table class='userTable'>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Username</th></tr>";
            foreach ($users as $row) {
                echo "<tr>";
                echo "<td>" . ($row["id"]) . "</td>";
                echo "<td>" . ($row["first_name"]) . "</td>";
                echo "<td>" . ($row["last_name"]) . "</td>";
                echo "<td>" . ($row["username"]) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No users found.</p>";
        }
        ?>
    </div>
</div>

<?php require ('./php/footer.php'); ?>

