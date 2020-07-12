<?php require('app/views/partials/head.php'); ?>
    <main class="main-layout page-space">
        <div class="errors">
            <ul>
                <?php if (!empty($result['errors'])) {
                    foreach ($result['errors'] as $fileError): ?>
                        <li><?= $fileError; ?></li>
                    <?php endforeach;
                } ?>
            </ul>
        </div>
        <div class="form-container flex-center">
            <div class="form-wrapper">
                <form method="POST" action="/create-news" enctype="multipart/form-data">
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

                    <div class="input-group">
                        <input type="checkbox"
                               name="pinnedToHomePage"
                               <?php echo !empty($result['model']->pinnedToHomePage) && $result['model']->pinnedToHomePage ? 'checked' : ''; ?> />
                        <span class="inputBar"></span>
                        <label>Pin to home page</label>
                    </div>

                    <div class="input-group">
                        <textarea type="textarea"
                              name="description"
                              required><?= !empty($result['model']) ? $result['model']->description : '' ?></textarea>
                        <span class="inputBar"></span>
                        <label>Description</label>
                    </div>

                    <div class="input-group">
                        <select name="categoryId">
                            <?php if (!empty($result['categories'])) {
                                foreach ($result['categories'] as $category): ?>
                                    <?php if (isset($result['model']->categoryId) && $category->id == $result['model']->categoryId): ?>
                                        <option value="<?php echo $category->id; ?>" selected>
                                            <?= $category->title ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?php echo $category->id; ?>">
                                            <?= $category->title ?>
                                        </option>
                                    <?php endif; ?>

                                <?php endforeach;
                            } ?>
                        </select>
                        <label style="display:block;">Select category</label>
                    </div>

                    <div class="input-group">
                        <select name="tagIds[]" multiple>
                            <?php if (!empty($result['tags'])) {
                                foreach ($result['tags'] as $tag): ?>
                                    <?php if (false): ?>
                                        <option value="<?php echo $tag->id; ?>" selected>
                                            <?= $tag->title ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?php echo $tag->id; ?>">
                                            <?= $tag->title ?>
                                        </option>
                                    <?php endif; ?>

                                <?php endforeach;
                            } ?>
                        </select>
                        <label style="display:block;">Select tags</label>
                    </div>

                    <div class="upload-form-wrapper">
                        <div class="image-container">
                            <?= !empty($result['model']) ? '<img src="public/uploads/'.$result['model']->image.'"/>' : '' ?>
                        </div>
                        <div class="upload-container container">
                            <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label">
                                Enter
                                <div class="file-names">
                                    <?= !empty($result['model']) ? $result['model']->image : '' ?>
                                </div>
                            </label>
                            <input type="file"
                                   name="fileToUpload"
                                   id="et_pb_contact_brand_file_request_0"
                                   class="file-upload" />
                            <input type="hidden" name="image" value="<?php echo !empty($result['model']) ? $result['model']->image : ''; ?>">
                        </div>
                    </div>

                    <input type="submit" name="createNews" value="Create/Update">
                </form>
            </div>
        </div>
    </main>

    <script>
        (function() {
            const checkBox = document.querySelector('input[type="checkbox"]');
            checkBox.addEventListener('change', function () {
                if(this.checked) {
                    this.setAttribute('checked', '');
                } else {
                    this.removeAttribute('checked');
                }
            });
        })();
    </script>

<?php require('app/views/partials/footer.php'); ?>