<?php
    if(isset($_POST['btn_save'])){
        $message = $obj_category->save_category_info($_POST);
    }
?>

<div class="col-md-12">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Add Category</li>
    </ol>
    <div class="card">
        <div class="card-header"><h3 class="text-center text-primary"><i class="fas fa-grip-horizontal"></i> ADD CATEGORY</h3></div>
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
                    <label for="Name" class="col-md-3">Category Name*</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="Name" name="category_name" required/>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="Description" class="col-md-3">Category Description</label>
                    <div class="col-md-9">
                        <textarea name="category_description" id="Description" cols="10" rows="10" class="form-control"></textarea>
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
                        <button type="submit" name="btn_save" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> SAVE CATEGORY INFO</button>
                    </div>
                </div>
            </form>
    </div>
</div>
