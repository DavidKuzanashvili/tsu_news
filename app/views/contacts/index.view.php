<?php require('app/views/partials/head.php'); ?>
<main class="main-layout page-space">
    <div class="tsu-news-table-wrapper">
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($contacts)) { ?>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td data-column="ID">
                            <?= $contact->id ?>
                        </td>
                        <td data-column="Name">
                            <?= $contact->name ?>
                        </td>
                        <td data-column="Email">
                            <?= $contact->email ?>
                        </td>
                        <td data-column="Message">
                            <?= $contact->message ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>

