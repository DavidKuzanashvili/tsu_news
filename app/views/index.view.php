<?php require('partials/head.php'); ?>

<main class="main-layout page-space">
    <h1>Featured News</h1>
    <section class="slider-section">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if (!empty($news)) {
                    foreach ($news as $item) : ?>
                        <div class="bg-image swiper-slide"
                             style="background: lightblue url('/public/uploads/<?php echo $item->image; ?>') no-repeat center;"><?= $item->title; ?></div>
                    <?php endforeach;
                } ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
</main>

<?php require('partials/footer.php'); ?>
