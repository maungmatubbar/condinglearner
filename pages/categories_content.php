<?php

    $category_id = $_GET['category_id'];

    $category_post_result = $obj_application->select_post_info_by_category_id($category_id);
?>
<div>
    <ol class="breadcrumb mt-4 mb-4">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
</div>
<?php while($post_info = mysqli_fetch_assoc($category_post_result)):?>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <a href="single_post.php?category_id=<?php echo $category_id;?>&&post_id=<?php echo $post_info['post_id'];?>">
                    <img class="img-thumbnail mb-3" src="assets/lazyload/img/grey.gif" data-original="assets/<?php echo $post_info['post_image'];?>" alt="Card image cap">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post_info['post_title'];?></h5>
                    <p class="card-text"><?php echo substr($post_info['post_description'],0,200).'...';?></p>
                    <a href="single_post.php?category_id=<?php echo $category_id;?>&&post_id=<?php echo $post_info['post_id'];?>" class="btn btn-success">Read More &rarr;</a>
                </div>
                <div class="card-footer border-warning text-muted">
                    Published on <?php echo $post_info['post_date'];?>, by <?php echo $post_info['name'];?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile;?>