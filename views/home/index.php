<?php
include BASE_DIR . '/views/partials/banner.php'; 
?>

<section class="home__collection h-layout">

    <?php
    foreach($auctions as $item) {
        include 'views/partials/card.php';
    }
    ?>

</section>




