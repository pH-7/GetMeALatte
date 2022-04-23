<?php use BuyMeACoffeeClone\Kernel\Http\Router; ?>

<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="<?= site_url() ?>" class="brand-logo">
            <?= site_name() ?>
        </a>

        <ul class="right hide-on-med-and-down">
            <?php if (!empty($isLoggedIn) && $isLoggedIn === true): ?>
                <li <?= Router::doesContain('account/edit') ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('/account/edit') ?>" title="Edit Account">Edit</a>
                </li>
                <li <?= Router::doesContain('account/password') ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('/account/password') ?>" title="Edit Password">Password</a>
                </li>
                <li <?= Router::doesContain('payment') ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('/payment') ?>">Payment</a>
                </li>
                <li <?= Router::doesContain('item') ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('/item') ?>">Item</a>
                </li>
                <li>
                    <a href="<?= site_url('/account/logout') ?>">Logout</a>
                </li>
            <?php else: ?>
                <li <?= Router::doesContain('signin') ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('/signin') ?>">Sign In</a>
                </li>
                <li <?= Router::doesContain('signup') ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('/signup') ?>">Sign Up</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>

<?= Router::doesContain('/account/edit') ?>
