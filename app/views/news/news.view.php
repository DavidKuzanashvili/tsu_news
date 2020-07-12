<?php require('app/views/partials/head.php'); ?>
    <main class="main-layout page-space">
        <h1>News</h1>
        <div class="flex-row flex-wrap">
            <?php if (!empty($news)) {
                foreach($news as $item) : ?>
                    <article class="news-widget">
                         <?php if (isset($_COOKIE['identity'])) {
                            echo '<a href="/create-news?id='.$item->id. '">Edit</a>';
                         } ?>
                        <?php if (isset($_COOKIE['userRole']) && $_COOKIE['userRole'] == 'admin') {
                            echo '/ <a href="/delete-news?id='.$item->id. '">Delete</a>';
                        } ?>
                        <div class="news-widget__image-block"
                             style="background: lightblue url('/public/uploads/<?php echo $item->image; ?>') no-repeat center;"></div>
                        <div class="news-widget__info-panel">
                            <div>
                                <a href="/news?id=<?= $item->id; ?>">
                                    <time>
                                        <span><?= date('d', strtotime($item->createDate)); ?></span>
                                        <br />
                                        <?= date('m',strtotime($item->createDate)); ?>
                                    </time>
                                    <h3><?= $item->title; ?></h3>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach;
            } ?>
        </div>
    </main>

<?php require('app/views/partials/footer.php'); ?>