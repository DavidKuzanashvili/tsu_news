<?php require('partials/head.php'); ?>

    <main class="main-layout page-space">
        <h1>News</h1>
        <div class="flex-row flex-wrap">
            <?php foreach(range(0, 11) as $number) : ?>
                <?php require('partials/news/news-widget.php') ?>
            <?php endforeach; ?>
        </div>
    </main>

<?php require('partials/footer.php'); ?>