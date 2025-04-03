<?php
session_start(); 
require_once './php/database.php'; 

// Get the post ID from the URL and the current user ID from the session
$post_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Create a new database connection
$database = new Database();
$conn = $database->getConnection();

// Prepare and execute the query to fetch the post that belongs to the current user
$sql = "SELECT * FROM posts WHERE id = :id AND user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $post_id,
    ':user_id' => $user_id
]);

// Fetch the post data
$post = $stmt->fetch(PDO::FETCH_ASSOC);

// If the post doesn't exist or doesn't belong to the user, redirect them
if (!$post) {
    header('Location: home.php');
    exit();
}

// Close the database connection
$conn = null;
?>

<?php include('./php/header.php'); ?> 

<!-- Edit post form -->
<div class="postBody">
    <div class="postContainer">
        <h1>Edit Post</h1>

        <!-- Form to submit updated post data -->
        <form action="./php/update_post.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            <div>
                <input type="text" name="title" value="<?php echo ($post['title']); ?>" required>
            </div>
            <div>
                <textarea name="content" rows="4" cols="50" required><?php echo ($post['content']); ?></textarea>
            </div>
            <div>
                <input type="submit" value="Update Post">
            </div>
        </form>
    </div>
</div>

<?php include('./php/footer.php'); ?> 

