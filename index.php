<?php  include "includes/header.php";  ?>

<section class="banner">
    <div class="slider">
        <img src="img/secpay.jpg" alt="Slide 1" style="width: 50%; max-height: 300px; object-fit: cover; display: block; margin: 0 auto;" loading="lazy">
        <img src="img/fasttrans.jpg" alt="Slide 2" style="width: 50%; max-height: 300px; object-fit: cover; display: block; margin: 0 auto;" loading="lazy">
        <img src="img/globalaccess.jpg" alt="Slide 3" style="width: 50%; max-height: 300px; object-fit: cover; display: block; margin: 0 auto;" loading="lazy">
    </div>
</section>

<section class="icon-block">
    <h2>Outsource Payment Services</h2>
    <div id="post-container">
        <?php include "php/fetch_posts.php"; ?>
    </div>
</section>

<?php include "includes/footer.php"; ?>