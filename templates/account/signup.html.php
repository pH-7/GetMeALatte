<div class="center">
    <h3 class="underline blue-text">
        Sign Up for Free Today 🚀
    </h3>

    <form method="post" action="<?= site_url('/signup') ?>">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required="required">
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required="required">
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required="required">
        </p>

        <p>
            <button type="submit" name="signup_submit" value="1" class="bold btn-large waves-effect">
                Sign Up
            </button>
        </p>
    </form>
</div>
