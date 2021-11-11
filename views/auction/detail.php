<?php
$title = 'Detail auction';
?>

<div class="bids h-layout">
    <h2>highest bid: <span class="bid">€ <?= $highestBid->amount ?? 'No bids yet' ?></span></h2>
</div>

<div class="bids h-layout">
    <form method="POST">
        <div class="content">
            <p>Place your bid now!</p>
            <div class="form-content">
                <input type="number" min="<?= $highestBid->amount ?? '1000' ?>" max="1000000" step="100" name="bid" id="bid" required="required" placeholder="<?= $highestBid->amount ?? '1000' ?>">
                <button class="search-btn" type="submit">Bid</button>
            </div>
        </div>
    </form>
</div>

<div class="card h-layout">
    <div class="card__top">
        <div class="name">
            <h1 class="name"><?= $auction->name ?></h1>
            <h3>catalog no: <?= $auction->id ?></h3>
        </div>
        
        <div class="img">
            <img src="<?= BASE_URL ?>/images/<?= $auction->photo ?>" alt="image of the horse" >
        </div>
    </div>

    <div class="card__pedigree">
        <h3><?= $auction->pedigree ?></h3>
    </div>

    <div class="card__info">
        <div class="card__info-flex">
            <span class="type"><?= $auction->discipline ?></span>
            <span class="gender"><?= $auction->gender ?></span>
            <span class="color"><?= $auction->color ?></span>
            <span class="height"><?= $auction->height ?></span>
        </div>
    </div>

    <div class="card__desc">
        <h2>About</h2>
        <p><?= $auction->description ?></p>
    </div>

    <div class="card__media">
        <h2>Media</h2>
        <div class="card__media-images">
            <img src="<?= BASE_URL ?>/images/<?= $auction->photo ?>" alt="image of the horse">
            <img src="<?= BASE_URL ?>/images/<?= $auction->source ?>" alt="image of the horse">
            <img src="<?= BASE_URL ?>/images/<?= $auction->source_2 ?? ''?>" alt="image of the horse">
        </div>
    </div>

    <a class="secondary-btn" href="/contact">
        <span>Contact</span>
    </a>
</div>

<div class="questions h-layout">
    <h2>Any Questions? don't hesitate to ask.</h2>
    <p>Ask your question here.</p>

    <form method="POST">
        <textarea name="question"></textarea>
        <button type="submit">Send question</button>
    </form>

</div>

<?php 

    foreach( $messages as $item) {
        include BASE_URL . 'views/partials/questions.php';
    } 
?>