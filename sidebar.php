<?php
    $recent_post_result = $obj_application->select_recent_post_info();
    $tag_result = $obj_application->select_all_published_tag();
?>
<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header bg-primary text-white">Recent Posts</h5>
    <div class="card-body">
        <div class="row">
            <div class="">
                <div class="list-group">
                    <?php while($recent_post = mysqli_fetch_assoc($recent_post_result)): ?>
                    <a href="single_post.php?category_id=<?php echo $recent_post['category_id'];?>&&post_id=<?php echo $recent_post['post_id'];?>" class="list-group-item"><i class="fas fa-arrow-right"></i> <?php echo $recent_post['post_title'];?></a>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
    <h5 class="card-header bg-success text-white">Tags</h5>
    <div class="card-body">
        <div class="list-group">
            <?php while($tag_info = mysqli_fetch_assoc($tag_result)):?>
                <a href="#" ><?php echo $tag_info['tag_name'];?></a>
            <?php endwhile;?>
       </div>
    </div>
</div>
