<?php require('app/views/partials/head.php'); ?>

    <main class="main-layout page-space">
        <?php if (!empty($news)): ?>
            <section class="cover" style="background: lightblue url('/public/uploads/<?php echo $news->image; ?>') no-repeat center;">
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