<?php require('app/views/partials/head.php'); ?>

<main class="form-container main-layout page-space flex-center">
    <div class="form-wrapper">
        <form method="POST" action="/sign-in">
            <div class="input-group">
                <input type="email"
                       name="email"
                       required />
                <span class="inputBar"></span>
                <label>Email</label>
            </div>

            <div class="input-group">
                <input type="password"
                       name="password"
                       required />
                <span class="inputBar"></span>
                <label>Password</label>
            </div>
            <button type="submit">Log in</button>
        </form>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>