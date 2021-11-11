<div class="card">
    <div class="card__top">
        <div class="name">
            <h1 class="name"><?= $item['name'] ?></h1>
            <h3>catalog no: <?= $item['id'] ?></h3>
        </div>
        
        <div class="img">
            <img src="<?= BASE_URL ?>/images/<?= $item['photo'] ?>" alt="image of the horse">
        </div>
    </div>

    <div class="card__pedigree">
        <h3><?= $item['pedigree'] ?></h3>
    </div>

    <div class="card__info">
        <p class="short-descr"><?= $item['short'] ?></p>

        <div class="card__info-flex">
            <span class="type"><?= $item['discipline'] ?> | </span>
            <span class="gender"><?= $item['gender'] ?> | </span>
            <span class="color"><?= $item['color'] ?> | </span>
            <span class="height"><?= $item['height'] ?>cm</span> 
        </div>

        <a class="secondary-btn" href="/auction/detail/<?= $item['id'] ?>">
            <span>More info</span>
        </a>
    </div>
</div>

