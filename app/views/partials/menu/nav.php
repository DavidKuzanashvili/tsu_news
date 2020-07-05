<nav class="nav">
    <ul class="nav__list">
        <li class="nav__list-item active-link">
            <a href="/">Home</a>
        </li>
        <li class="nav__list-item">
            <a href="/news">News</a>
        </li>
        <li class="nav__list-item">
            <a href="/about">About</a>
        </li>
        <li class="nav__list-item">
            <a href="/contact">Contact</a>
        </li>
        <?php if (!empty($_COOKIE['userRole']) && $_COOKIE['userRole'] == 'admin'): ?>
            <li class="nav__list-item">
                <a href="/users">Users</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
