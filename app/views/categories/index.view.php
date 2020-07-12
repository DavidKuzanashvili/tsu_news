<?php require('app/views/partials/head.php'); ?>
<main class="main-layout page-space">
    <div class="export">
        <a href="/create-category">
            Create new
        </a>
    </div>
    <div class="tsu-news-table-wrapper">
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($categories)) { ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td data-column="ID">
                            <?= $category->id ?>
                        </td>
                        <td data-column="Title">
                            <?= $category->title ?>
                        </td>
                        <td data-column="Edit">
                            <?= '<a href="/create-category?id='.$category->id.'">Edit</a>'; ?>
                        </td>
                        <td data-column="Delete">
                            <?= '<a href="/delete-category?id='.$category->id.'">Delete</a>'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>

