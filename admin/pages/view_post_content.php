<?php
$post_id = $_GET['post_id'];
$qeury_result = $obj_post->selete_post_info_by_id($post_id);

 $post_info = mysqli_fetch_assoc($qeury_result);
?>
<script src="//code.jquery.com/jquery.min.js"></script>
<script type="text/JavaScript" src="../assets/lazy-image/ImageLoader/js/jquery.dop.ImageLoader.js"></script>
<script type="text/JavaScript">
    $(document).ready(function(){
        $('body').DOPImageLoader({'Container':'#image', 'LoaderURL': '../assets/lazy-image/ImageLoader/images/loader2.gif'});
    })
</script>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Post</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center text-info float-left">VIEW POST INFO</h3>
            <a href="manage_post.php" class="btn btn-success float-right" title="Manage Post">Manage Post</a>
        </div>
        <div class="card-body"> 
            <table class="table table-striped "> 
                <tr>
                    <th>Post Title</th>
                    <td><?php echo $post_info['post_title'];?></td>
                </tr>
                <tr>
                    <th>Category Name</th>
                    <td><?php echo $post_info['category_name'];?></td>
                </tr>
                <tr>
                    <th>Tag Name</th>
                    <td><?php echo $post_info['tag_name'];?></td>
                </tr>
                <tr>
                    <th>Post Description</th>
                    <td><?php echo $post_info['post_description'];?></td>
                </tr>
                <tr>
                    <th>Post Image</th> 
                    <td><div id="image"><img class="img-thumbnail" src="<?php echo $post_info['post_image'];?>" alt="postImage" width="300px" height="200px"/></div></td>
                </tr>
                <tr>
                    <th>Posted By</th> 
                    <td><?php echo $post_info['name'];?></td>
                </tr>
                <tr>
                    <th>Published Date</th> 
                    <td><?php echo $post_info['post_date'];?></td>
                </tr>
                
                <tr>
                    <th>Publication status</th> 
                    <td><?php echo $post_info['publication_status']==1?"Published":"Unpublished";?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
