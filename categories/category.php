<?php
require '../includes/header.php';
require_once '../config/config.php';

$posts = [];

if(isset($_GET['cat_id'])) {
    $id = $_GET['cat_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT posts.id AS id, posts.title AS title, posts.subtitle AS subtitle, posts.user_name AS user_name, posts.created_at AS created_at, posts.category_id AS category_id FROM categories JOIN posts ON categories.id = posts.category_id WHERE posts.category_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        $posts = $stmt->fetchAll(PDO::FETCH_OBJ);
    } else {
        // Output error information
        $errorInfo = $stmt->errorInfo();
        echo "Error executing query: " . $errorInfo[2];
    }
} else {
    echo "Category ID not set.";
}
?>

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $row): ?>
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="<?php echo base_url; ?>/posts/post.php?post_id=<?php echo $row->id; ?>">
                        <h2 class="post-title"><?php echo htmlspecialchars($row->title, ENT_QUOTES, 'UTF-8'); ?></h2>
                        <h3 class="post-subtitle"><?php echo htmlspecialchars($row->subtitle, ENT_QUOTES, 'UTF-8'); ?></h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!"><?php echo htmlspecialchars($row->user_name, ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php echo date('M', strtotime($row->created_at)) . ',' . date('d', strtotime($row->created_at)) . ' ' . date('Y', strtotime($row->created_at)); ?>
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            <?php endforeach; ?>
        <?php else: ?>
            <p>No posts found for this category.</p>
        <?php endif; ?>
    </div>
</div>

<?php require "../includes/footer.php" ?>