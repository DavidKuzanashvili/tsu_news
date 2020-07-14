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
        <?php if (isset($_COOKIE['userRole']) && $_COOKIE['userRole'] == 'admin'): ?>
            <li class="nav__list-item">
                <a href="/users">Users</a>
            </li>
        <?php endif; ?>
        <?php if (isset($_COOKIE['identity'])): ?>
            <li class="nav__list-item">
                <a href="/create-news">Create news</a>
            </li>
            <li class="nav__list-item">
                <a href="/categories">Categories</a>
            </li>
            <li class="nav__list-item">
                <a href="/tags">Tags</a>
            </li>
            <li class="nav__list-item">
                <a href="/subscribers">Subscribers</a>
            </li>
            <li class="nav__list-item">
                <a href="/contacts">Contacts</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
