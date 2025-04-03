<?php include('./php/header.php'); ?>

<!-- Main content area for creating a new post -->
<div class="postBody">
    <div class="postContainer">
        <h1>Create a New Post</h1>

        <!-- Form to submit a new post -->
        <form action="./php/save_post.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="title" placeholder="Post Title" required>
            </div>
            <div>
                <label for="content">Post Content:</label>
                <textarea id="content" name="content" rows="4" cols="50" placeholder="Write something..." required></textarea>
            </div>
            <div>
                <label for="image">Upload Image (optional):</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div>
                <input type="submit" value="Create Post">
            </div>
        </form>
    </div>
</div>

<?php include('./php/footer.php'); ?> 
