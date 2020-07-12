<?php require('app/views/partials/head.php'); ?>
<main class="main-layout page-space">
    <div class="export">
        <a href="/create-tag">
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
            <?php if (!empty($tags)) { ?>
                <?php foreach ($tags as $tag): ?>
                    <tr>
                        <td data-column="ID">
                            <?= $tag->id ?>
                        </td>
                        <td data-column="Title">
                            <?= $tag->title ?>
                        </td>
                        <td data-column="Edit">
                            <?= '<a href="/create-tag?id='.$tag->id.'">Edit</a>'; ?>
                        </td>
                        <td data-column="Delete">
                            <?= '<a href="/delete-tag?id='.$tag->id.'">Delete</a>'; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>

