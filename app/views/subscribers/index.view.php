<?php require('app/views/partials/head.php'); ?>
<main class="main-layout page-space">
    <div class="tsu-news-table-wrapper">
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($subscribers)) { ?>
                <?php foreach ($subscribers as $subscriber): ?>
                    <tr>
                        <td data-column="ID">
                            <?= $subscriber->id ?>
                        </td>
                        <td data-column="Email">
                            <?= $subscriber->email ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>

