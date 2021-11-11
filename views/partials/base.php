<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?? 'nextgen'; ?></title>
        <link rel="stylesheet" href="<?= BASE_URL; ?>/css/layout.css?v=<?= time() ?>">
        <link rel="stylesheet" href="<?= BASE_URL; ?>/css/main.css?v=<?= time() ?>">
    </head>
    
    <body>
        <header class="h-layout">
            <?php include BASE_DIR . '/views/partials/header.php'; ?>
        </header>

        <main>
            <?= $content; ?>
        </main>

        <footer>
            <?php include BASE_DIR . '/views/partials/footer.php'; ?>
        </footer>

        <script src="<?= BASE_URL; ?>/js/main.js?v=<?= time() ?>"></script>
    </body>
</html>