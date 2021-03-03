<?php
    $message = '';
    if(isset($_POST['send'])){
        $message = $obj_application->send_message($_POST);
    }
    
?>
<div class="mt-3">
    <div class="card">
        <div class="card-header">
            <h3>Contact Form</h3>
            <p><?php echo $message;?></p>
        </div>
        <div class="card-body">
            <form action="" method="post"> 
                <div class="form-group">
                    <label for="" class="col-md-3">Name*</label>
                    <div class="col-md-9">
                        <input type="text" name="guest_name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3">Email*</label>
                    <div class="col-md-9">
                        <input type="email" name="guest_email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3">Message</label>
                    <div class="col-md-9">
                        <textarea name="message" class="form-control"id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9">
                        <button type="submit" name="send" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
</div>