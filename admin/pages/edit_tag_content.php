<?php
    $tag_id = $_GET['tag_id'];
    $query_result = $obj_tag->select_tag_info_by_id($tag_id);
    $tag_info = mysqli_fetch_assoc($query_result);
    if(isset($_POST['btn_update'])){
       $obj_tag->update_tag_info_by_id($_POST);
    }
?>

<div class="col-md-12">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Tag</li>
    </ol>
    <div class="card">
        <div class="card-header"><h3 class="text-center text-primary"><i class="fas fa-tags"></i> EDIT TAG</h3></div>
        <?php if($message!=null){?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><?php echo $message; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }?>
        <div class="card-body">
            <form action="" method="post">
                <div class="row form-group">
                    <label for="Name" class="col-md-3">Tag Name*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="Name" name="tag_name" value="<?php echo $tag_info['tag_name'];?>" required/>
                        <input type="hidden" class="form-control" name="tag_id" value="<?php echo $tag_info['tag_id'];?>" required/>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="" class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        <label for="published"><input type="radio" name="publication_status" value="1" id="published" <?php echo $tag_info['publication_status']==1?'checked':' ';?>/> Published</label>
                        <label for="unpublished"><input type="radio" name="publication_status" value="0" id="unpublished" <?php echo $tag_info['publication_status']==0?'checked':' ';?>/> Unpublished</label>
                    </div>
                </div>
                <div class="row form-group">
                    
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" name="btn_update" class="btn btn-sm btn-primary"><i class="fas fa-arrow-up"></i> UPDATE TAG INFO</button>
                    </div>
                </div>
            </form>
    </div>
</div>
