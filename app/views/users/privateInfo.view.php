<?php require('app/views/partials/head.php'); ?>

<main class="main-layout page-space">
    <div class="tsu-news-table-wrapper">
        <?php if (!empty($privateInfo)) { ?>
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Address</th>
                    <th>Private number</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-column="ID">
                            <?= $privateInfo->id ?>
                        </td>
                        <td data-column="Address">
                            <?= $privateInfo->address ?>
                        </td>
                        <td data-column="Private number">
                            <?= $privateInfo->privateNumber ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } else {
            echo '<div class="flex-center" style="height: 50vh;color:red;">User didn"t fill out his/her private info</div>';
        } ?>

    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>
