<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to index.php
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta information for charset and viewport settings -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Final Project</title>
        <meta name="description" content="TrendHive Social Media Page">
        <meta name="robots" content="noindex, nofollow">
        <link rel="icon" href="img/TrendHiveLogo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/styles.css">  
    </head>
    <body>
        <nav>
            <div class="navbar">
                <img src="./img/TrendHiveLogo.png" alt="Trend Hive Logo">
                <h2>TrendHive</h2>

                <div class="linkNav">
                    <div class="links">
                        <a href="home.php" alt="Home">Home</a>
                    </div>
                    <div class="links">
                        <a href="about.php">About Us</a>
                    </div>
                    <div class="links">
                        <a href="create_post_form.php">Create Post</a>
                    </div>
                    <div class="links">
                        <a href="logout.php" class="logoutButton">Logout</a>
                    </div>
                    <div class="links">
                        <?php
                            if (!empty($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) { 
                                echo '<a href="admin_view.php">Admin Panel</a>'; 
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </nav>