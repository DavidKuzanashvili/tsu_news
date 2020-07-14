<?php require('app/views/partials/head.php'); ?>

<main class="form-container main-layout page-space flex-center">
    <div class="form-wrapper">
        <form method="POST" action="/create-user">
            <div class="input-group">
                <input type="text" name="firstName" required />
                <span class="inputBar"></span>
                <label>First name</label>
            </div>

            <div class="input-group">
                <input type="text" name="lastName" required />
                <span class="inputBar"></span>
                <label>Last name</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" required />
                <span class="inputBar"></span>
                <label>Email</label>
            </div>

            <div class="input-group">
                <input type="text" name="phoneNumber" required />
                <span class="inputBar"></span>
                <label>Phone number</label>
            </div>

            <div class="input-group">
                <input type="text" name="privateNumber" required />
                <span class="inputBar"></span>
                <label>Private Number</label>
            </div>

            <div class="input-group">
                <input type="text" name="address" required />
                <span class="inputBar"></span>
                <label>Address</label>
            </div>

            <div class="input-group">
                <select name="role">
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>
                <label style="display:block;">Role</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" required />
                <span class="inputBar"></span>
                <label>Password</label>
            </div>

            <input type="submit" name="registration" value="Sign up">
        </form>
    </div>
</main>

<?php require('app/views/partials/footer.php'); ?>