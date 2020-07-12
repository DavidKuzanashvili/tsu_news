<?php require('app/views/partials/head.php'); ?>

<main class="main-layout page-space">
    <div class="form-container flex-center">
        <div class="form-wrapper">
            <form method="POST" action="/create-category">
                <div class="input-group">
                    <input type="hidden"
                           name="id"
                           value="<?= !empty($result['model']) ? $result['model']->id : 0 ?>"
                           required />
                </div>

                <div class="input-group">
                    <input type="text"
                           name="title"
                           value="<?= !empty($result['model']) ? $result['model']->title : '' ?>"
                           required />
                    <span class="inputBar"></span>
                    <label>Title</label>
                </div>

                <input type="submit" name="createCategory" value="Create/Update">
            </form>
        </div>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>
