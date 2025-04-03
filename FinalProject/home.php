<?php require ('./php/header.php'); ?> 

<?php
require_once './php/database.php'; 

// Create a new instance of the Database class and get the PDO connection
$database = new Database();
$conn = $database->getConnection();

// SQL query to fetch all posts along with the username of the creator
$sql = "SELECT posts.*, accounts.username FROM posts 
        JOIN accounts ON posts.user_id = accounts.id
        ORDER BY posts.created_at DESC";

// Prepare and execute the SQL query
$stmt = $conn->prepare($sql);
$stmt->execute();

// Fetch all posts as an associative array
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$conn = null;
?>

<body>
    <div class="container">
        <div class="feed">
            <h2 class="postFeed">Posts Feed!</h2>

            <!-- Loop through each post and display it -->
            <?php foreach ($posts as $post): ?>
            <div class="post">
                <div class="postHeader">
                    <!-- Static profile image -->
                    <img src="./img/profile.png" alt="Profile Picture">

                    <div>
                        <!-- Display the username and the time the post was created -->
                        <h4>By: <?php echo ($post['username']); ?></h4>
                        <p class="postInfo"><?php echo $post['created_at']; ?></p>
                    </div>
                </div>

                <div class="postContent">
                    <!-- Display the post title -->
                    <h3><?php echo ($post['title']); ?></h3>

                    <!-- If the post has an image, display it -->
                    <?php if (!empty($post['image'])): ?>
                        <img src="<?php echo ($post['image']); ?>" alt="Post Image" style="max-width: 50%; height: auto; margin_top: 10px;">
                    <?php endif; ?>

                    <!-- Display the post content -->
                    <p><?php echo (($post['content'])); ?></p>
                </div>
                
                <div class="postFooter">
                    <!-- Show edit/delete options only to the post owner -->
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
                        <a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a>
                        <a href="./php/delete_post.php?id=<?php echo $post['id']; ?>">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

<!-- Include the footer layout -->
<?php require ('./php/footer.php'); ?>
