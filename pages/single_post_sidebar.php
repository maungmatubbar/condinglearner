<?php
    $category_id = $_GET['category_id'];
    $sigle_post_result_sidebar = $obj_application->select_post_title_by_category_id($category_id);
?>
<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header bg-primary text-white">Related Posts</h5>
    <div class="card-body">
        <div class="row">
            <div class="list-group">
                <?php while($single_post_sidebar = mysqli_fetch_assoc($sigle_post_result_sidebar)): ?>
                <a href="single_post.php?category_id=<?php echo $category_id;?>&&post_id=<?php echo $single_post_sidebar['post_id'];?>" class="list-group-item"><?php echo $single_post_sidebar['post_title'] ?></a>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</div>

