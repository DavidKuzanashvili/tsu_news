<?php require('app/views/partials/head.php'); ?>
    <main class="form-container main-layout page-space flex-center">
        <div class="form-wrapper">
            <form method="POST" action="/create-news">
                <div class="input-group">
                    <input type="hidden"
                           name="id"
                           value="<?= !empty($news) ? $news->id : 0 ?>"
                           required />
                </div>

                <div class="input-group">
                    <input type="text"
                           name="title"
                           value="<?= !empty($news) ? $news->title : '' ?>"
                           required />
                    <span class="inputBar"></span>
                    <label>Title</label>
                </div>

                <div class="input-group">
                    <textarea type="textarea"
                              name="description"
                              required>
                        <?= !empty($news) ? $news->description : '' ?>
                    </textarea>
                    <span class="inputBar"></span>
                    <label>Description</label>
                </div>

                <input type="submit" name="createNews" value="Create/Update">
            </form>
        </div>
    </main>

<?php require('app/views/partials/footer.php'); ?>