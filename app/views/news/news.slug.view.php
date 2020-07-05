<?php require('app/views/partials/head.php'); ?>

    <main class="main-layout page-space">
        <?php if (!empty($news)): ?>
            <section class="cover">
                <div>
                    <h1><?= $news->title; ?></h1>
                </div>
            </section>
            <section class="text-section">
                <p>
                    <?= $news->description; ?>
                </p>
            </section>
        <?php endif; ?>
    </main>

<?php require('app/views/partials/footer.php'); ?>