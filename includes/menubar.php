<?php
  $query_result = $obj_application->select_all_published_categories();
?>
<script>
    $(document).ready(function(){
        $('.navbar-nav li').find('li').addClass('active');
    })
</script>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:#0c2c84">
    <div class="container">
        <h3><a class="navbar-brand" href="index.php"><i class="fas fa-laptop-code"></i> CodingLearner</a></h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i>
                Home
                </a>
            </li>

            <?php while($categories = mysqli_fetch_assoc($query_result)):?>
            <li class="nav-item">
                <a class="nav-link" href="categories.php?category_id=<?php echo $categories['category_id'];?>"><i class="fab fa-pied-piper-square"></i> <?php echo $categories['category_name'];?></a>
            </li> 
            <?php endwhile;?>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php"><i class="fas fa-address-card"></i> About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fab fa-servicestack"></i> Services</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="contact.php"><i class="fas fa-address-book"></i> Contact</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
