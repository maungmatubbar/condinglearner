<?php
   
   
    $category_query_result = $obj_post->select_all_published_category();
    $tag_query_result = $obj_post->select_all_published_tag();
    if(isset($_POST['btn_save'])){
       $message = $obj_post->save_post_info($_POST);
       
    }
?>

<div class="col-md-12">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Add Post</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center text-primary float-left"> <i class="far fa-newspaper"></i> ADD NEW POST</h3>
            <a href="manage_post.php" class="btn btn-success float-right"><i class="fas fa-tasks"></i> Manage Post</a>
        </div>
        <?php if($message!=null){?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><?php echo $message; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }?>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <label for="post_title" class="col-md-3">Post Title*</label>
                    <div class="col-md-9">
                        <input type="text" id="post_title" name="post_title" class="form-control"  required/>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="category_name" class="col-md-3">Category Name*</label>
                    <div class="col-md-9">
                      <select name="category_id" id="category_name" class="form-control" required>
                        <option value="">Select category name</option>
                        <?php while($published_category = mysqli_fetch_assoc($category_query_result)):?>
                        <option value="<?php echo $published_category['category_id'];?>"><?php echo $published_category['category_name'];?></option>
                        <?php endwhile;?>
                      </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="tag_name" class="col-md-3">Tag Name*</label>
                    <div class="col-md-9">
                      <select name="tag_id" id="tag_name" class="form-control" required>
                        <option value="">Select tag name</option>
                        <?php while($published_tag = mysqli_fetch_assoc($tag_query_result)):?>
                        <option value="<?php echo $published_tag['tag_id'];?>"><?php echo $published_tag['tag_name'];?></option>
                        <?php endwhile;?>
                      </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="Description" class="col-md-3">Post Description*</label>
                    <div class="col-md-9">
                        <textarea id="editor" name="post_description" id="Description" cols="10" rows="10" class="form-control"  required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="post_image" class="col-md-3">Post Image</label>
                    <div class="col-md-9">
                        <input type="file" id="post_image" name="post_image" class="filepond">
                        <input type="hidden" name="admin_id" value="<?php echo $_SESSION['id'];?>"/>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="" class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        <label for="published"><input type="radio" name="publication_status" value="1" id="published" /> Published</label>
                        <label for="unpublished"><input type="radio" name="publication_status" value="0" id="unpublished" checked/> Unpublished</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" name="btn_save" class="btn btn-success btn-block"><i class="fas fa-save"></i> SAVE POST INFO</button>
                    </div>
                </div>
            </form>
    </div>
</div>
