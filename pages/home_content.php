<?php
    $post_result = $obj_application->select_new_published_post_info();
?>
<div>
      <div class="slider mt-2">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/slider_image/slider1.png" class="d-block w-100" height="250px" alt="...">
                </div>
                <div class="carousel-item">
                  <img  src="assets/slider_image/slider3.jpg" class="d-block w-100" height="250px"  alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
          </div>
        </div>
    <div class=""><h3 class="my-4 text-muted">A good way to learn programming</h3></div>
    
    <!-- Blog Post start  -->
    <?php while($post_info = mysqli_fetch_assoc($post_result)):?>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <a href="single_post.php?category_id=<?php echo $post_info['category_id'];?>&&post_id=<?php echo $post_info['post_id'];?>">
                  <img class="img-thumbnail mb-3" src="assets/lazyload/img/grey.gif" data-original="assets/<?php echo $post_info['post_image'];?>" alt="Card image cap">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post_info['post_title'];?></h5>
                    <p class="card-text"><?php echo substr($post_info['post_description'],0,200).'...';?></p>
                    <a href="single_post.php?category_id=<?php echo $post_info['category_id'];?>&&post_id=<?php echo $post_info['post_id'];?>" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer border-warning text-muted">
                    Published on <?php echo $post_info['post_date'];?>, by
                    <a href="#"><?php echo $post_info['name'];?></a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile;?>
    <!-- Blog Post End -->


    <!-- Pagination -->
    <!-- <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul> -->
 </div>