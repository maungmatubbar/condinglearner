<?php
   $obj_category = new App\classes\Category();
   if(isset($_GET['status'])){
       $category_id = $_GET['category_id'];
       if($_GET['status']=='unpublish'){
         $message = $obj_category->unpublished_category_info_by_id($category_id);
       }
       else if($_GET['status']=='publish'){
        $message = $obj_category->published_category_info_by_id($category_id);
       }
       else if($_GET['status']=='delete'){
        $message = $obj_category->delete_category_info_by_id($category_id);
       }
      
   }
    $query_result = $obj_category->select_category_info();
?>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Manage Category</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-center text-primary"><i class="fas fa-grip-horizontal"></i> MANAGE CATEGORY</h3>
            <?php if($message!=null){?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong><?php echo $message; ?>
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php }elseif(isset($_SESSION['message'])){?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>
                    <?php echo $_SESSION['message'];unset($_SESSION['message']);?>
                    </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php }?>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <span class="float-left">
                <i class="fas fa-table mr-1"></i>
               All category information goes here
            </span>
            <span class="float-right">
            <a href="add_category.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Category</a>
            <a href="manage_category.php" class="btn btn-primary"><i class="fas fa-sync"></i> Refresh</a>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                         <th>SL No</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <?php $i=1;?>
                    <tbody>
                     <?php while($category_info = mysqli_fetch_assoc($query_result)):?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $category_info['category_name']; ?></td>
                            <td><?php echo $category_info['category_description']; ?></td>
                            <td><?php echo $category_info['publication_status']==1? "Published" : "Unpublished";?></td>
                            <td>
                                <?php if($category_info['publication_status']==1):?>
                                <a href="?status=unpublish&category_id=<?php echo $category_info['category_id'];?>" class="btn btn-success btn-sm" title="Unpublished"><i class="fas fa-arrow-alt-circle-down"></i></a>
                                <?php else:?>
                                <a href="?status=publish&category_id=<?php echo $category_info['category_id'];?>" class="btn btn-warning  btn-sm" title="Published"><i class="fas fa-arrow-alt-circle-up"></i></a>
                                <?php endif;?>
                                <a href="edit_category.php?status=edit&category_id=<?php echo $category_info['category_id'];?>" class="btn btn-info  btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="?status=delete&category_id=<?php echo $category_info['category_id'];?>" class="btn btn-danger  btn-sm" title="Delete" onclick="return confirm('Are you sure delete this?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>