<?php
   $category_id =  $_GET['category_id'];
   $query_result = $obj_category->select_category_info_by_id($category_id);
   $category_info = mysqli_fetch_assoc($query_result);
    if(isset($_POST['btn_update'])){
        $obj_category->update_category_info_by_id($_POST);
    }
?>

<div class="col-md-12">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Category</li>
    </ol>
    <div class="card">
        <div class="card-header"><h3 class="text-center text-primary"><i class="fas fa-grip-horizontal"></i> Edit CATEGORY</h3></div>
        <?php if($message!=null){?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong><?php echo $message; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }?>
        <div class="card-body">
            <form action="" method="post" name="editCategory">
                <div class="row form-group">
                    <label for="Name" class="col-md-3">Category Name*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="Name" name="category_name" value="<?php echo $category_info['category_name'];?>" required/>
                        <input type="hidden" class="form-control" id="Name" name="category_id" value="<?php echo $category_info['category_id'];?>" required/>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="Description" class="col-md-3">Category Description</label>
                    <div class="col-md-9">
                        <textarea name="category_description" id="Description" cols="10" rows="10" class="form-control"><?php echo $category_info['category_description'];?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="" class="col-md-3">Publication Status</label>
                    <div class="col-md-9">
                        <label for="published"><input type="radio" name="publication_status" value="1" id="published" <?php echo $category_info['publication_status']==1?"checked":" "?>/> Published</label>
                        <label for="unpublished"><input type="radio" name="publication_status" value="0" id="unpublished" <?php echo $category_info['publication_status']==1?" ":"checked"?>/> Unpublished</label>
                    </div>
                </div>
                <div class="row form-group">
                    
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" name="btn_update" class="btn btn-sm btn-primary"><i class="fas fa-arrow-alt-circle-up"></i> UPDATE CATEGORY INFO</button>
                    </div>
                </div>
            </form>
    </div>
</div>
