<?php
    
    if(isset($_GET['status'])){
        $post_id = $_GET['post_id'];
        if($_GET['status'] == 'unpublish'){
            $message = $obj_post->unpublished_post_info_by_id($post_id);
        }
        else if($_GET['status'] == 'publish'){
            $message = $obj_post->published_post_info_by_id($post_id);
        }
        else if($_GET['status'] == 'delete'){
            $message =  $obj_post->delete_post_info_by_id($post_id);
        }
    }
    
    $query_result = $obj_post->select_all_post_info();
?>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Manage Post</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="text-center text-primary"><i class="fas fa-pencil-alt"></i> MANAGE POST INFO</h3>
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
    <div class="card border-warning mb-4">
        <div class="card-header">
            <span class="float-left">
                <i class="fas fa-table mr-1"></i>
               All post info goes here
            </span>
            <span class="float-right">
            <a href="add_post.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Post</a>
            <a href="manage_post.php" class="btn btn-primary"><i class="fas fa-sync"></i> Refresh</a>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Post Title</th>
                            <th>Category Name</th>
                            <th>Tag Name</th>
                            <th>Posted By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $i=1;?>
                    <tbody>
                        <?php while($post_info = mysqli_fetch_assoc($query_result)){?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $post_info['post_title']?></td>
                                <td><?php echo $post_info['category_name']?></td>
                                <td><?php echo $post_info['tag_name']?></td>
                                <td><?php echo $post_info['name']?></td>
                                <td><?php echo $post_info['publication_status']?"Published":"Unpublished"?></td>
                                <td>
                                    <?php if($post_info['publication_status']==1){?>
                                    <a href="?status=unpublish&post_id=<?php echo $post_info['post_id'];?>" class="btn btn-success btn-sm" title="Unpublished"><i class="fas fa-arrow-alt-circle-down"></i></a>
                                    <?php }else{ ?>
                                    <a href="?status=publish&post_id=<?php echo $post_info['post_id'];?>" class="btn btn-warning  btn-sm" title="Published"><i class="fas fa-arrow-alt-circle-up"></i></a>
                                    <?php }?>
                                    <a href="edit_post.php?post_id=<?php echo $post_info['post_id'];?>" class="btn btn-info  btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="view_post.php?post_id=<?php echo $post_info['post_id'];?>" class="btn btn-dark  btn-sm" title="View"><i class="far fa-eye"></i></a>
                                    <a href="?status=delete&post_id=<?php echo $post_info['post_id'];?>" class="btn btn-danger  btn-sm" title="Delete" onclick="return confirm('Are you sure delete this?');"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>