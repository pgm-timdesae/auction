<?php
    require_once BASE_DIR . '/app.php';

    //print_r($_POST['gender'])
?>

<section class="search h-layout">
    <div class="search-one">
        <h1>Discover our collection of future stars</h1>

        <p>Search a horse by name</p>
        
        <form method="POST">
            <div class="form-content">
                <input type="text" value="<?= $search_str ?? '' ?>" name="search_string" placeholder="name of horse">
                <button class="search-btn" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="search-two">
        <p>Search a horse by gender</p>
    
        <form method="POST">
            <select name="gender" id="gender-select">
                <option value="">--Please choose a gender--</option>
                <option value="Stallion">Stallion</option>
                <option value="Mare">Mare</option>
                <option value="Gelding">Gelding</option>
            </select>
            <button class="search-btn" type="submit">Search</button>
        </form>
    </div>
</section>

<section class="collection h-layout">
    <?php
        $title = 'Auctions';

        foreach($auctions as $item) {
            include 'views/partials/card.php';
        }
    ?>
</section>

