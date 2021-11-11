
<div class="admin-container h-layout">
    
    <section class="admin-container__bids">
        <h2>Highest bids for the moment</h2>

        <?php foreach($bids as $item) {
            include BASE_DIR . '/views/partials/highest.php';
        } ?>
    </section>

    <section class="admin-container__numbers">
        <h2>Some numbers...</h2>
        <span class="subtitle">Total bids</span>
        <span class="number"><?= $totalBids[0] ['COUNT(*)'] ?></span>

        <span class="subtitle">Users</span>
        <span class="number"><?= $totalUsers[0] ['COUNT(*)'] ?></span>

        <span class="subtitle">Asked questions</span>
        <span class="number"><?= $totalQuestions[0] ['COUNT(*)'] ?></span>
    </section>
</div>

