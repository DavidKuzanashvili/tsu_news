<?php require('partials/head.php'); ?>

<main class="main-layout page-space">
    <?php require('partials/covers/default-cover.php'); ?>
    <h1>Contact: </h1>
    <div class="flex-row flex-space-between">
        <div class="half-sz p-r-5">
            <div class="float-right">
                <?php require('partials/forms/contact-form.php'); ?>
            </div>
        </div>
        <div class="half-sz float-left p-l-5">
            <div>
                <bold>Address: </bold> Tbilisi, Kazbegi ave 12a
            </div>
            <div>
                <bold>Phone: </bold> +995555111111
            </div>
            <div>
                <bold>Email: </bold> ex@domain.com
            </div>
        </div>
    </div>
</main>

<?php require('partials/footer.php'); ?>
