<?php
    $post_id = $_GET['post_id'];
    $single_post_result = $obj_application->select_post_info_by_id($post_id);
    $single_post_info = mysqli_fetch_assoc($single_post_result);

?>
<div>
    <ol class="breadcrumb mt-4 mb-4">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Single Post</li>
    </ol>
</div>
<div class="">
    <!-- <img src="assets/slider_image/slider4.jpg" alt="image"> -->
</div>
<div class="mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="text-dark"><?php echo $single_post_info['post_title'];?></h3>
        </div>
        <div class="card-body">
            <p><?php echo $single_post_info['post_description'];?></p>
        </div>
        <div class="card-footer">
            <p>Published: <?php echo $single_post_info['post_date'];?></p>
        </div>
    </div>
</div>
           
  