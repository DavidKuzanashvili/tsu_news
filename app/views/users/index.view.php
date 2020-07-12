<?php require('app/views/partials/head.php'); ?>
<main class="main-layout page-space">
    <div class="export">
        <a href="/export-users">
            Export users
        </a>
    </div>
    <div class="tsu-news-table-wrapper">
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Email verified</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($users)) { ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td data-column="ID">
                            <?= $user->id ?>
                        </td>
                        <td data-column="First Name">
                            <?= $user->firstName ?>
                        </td>
                        <td data-column="Last Name">
                            <?= $user->lastName ?>
                        </td>
                        <td data-column="Email">
                            <?= $user->email ?>
                        </td>
                        <td data-column="Email verified">
                            <?= $user->emailConfirmed ? 'verified' : 'not yet' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>
