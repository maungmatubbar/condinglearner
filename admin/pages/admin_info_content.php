<?php
    $obj_admin = new App\classes\Admin();
    $admin_info_result = $obj_admin->select_all_admin_info();
?>
<div class="container-fluid">
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Admin Info</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <span class="float-left">
                <i class="fas fa-table mr-1"></i>
               All admins information goes here
            </span>
            <span class="float-right">
            <a href="admin_info.php" class="btn btn-primary"><i class="fas fa-sync"></i> Refresh</a>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Admin Name</th>
                            <th>Email Address</th>
                            <th>Access Level</th>
                            <th>Activation Status</th>
                            <th>Deletion Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while($admin_info = mysqli_fetch_assoc($admin_info_result)){?>
                        <tr>
                            <td><?php echo $i++;?></td> 
                            <td><?php echo $admin_info['name'];?></td> 
                            <td><?php echo $admin_info['email'];?></td> 
                            <td><?php echo $admin_info['name'];?></td> 
                            <td><?php if($_SESSION['id']){echo "Active";}else{echo "Inactive";}?></td> 
                            <td><?php if($admin_info['deletion_status']==1){echo "No Delete";}else{echo "Delete";}?></td> 
                            <td></td> 
                           
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>