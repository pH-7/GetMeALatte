<div class="center">
    <div class="row">
        <h3 class="blue-text">Sign In</h3>

        <form method="post" action="<?= site_url('/signin') ?>" class="col s12">
            <p class="input-field col s6">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" id="email" required="required">
                <label for="email">Email:</label>
            </p>

            <p class="input-field col s6">
                <i class="material-icons prefix">password</i>
                <input type="password" name="password" id="password" required="required">
                <label for="password">Password:</label>
            </p>

            <p class="col s12">
                <button type="submit" name="signin_submit" value="1" class="bold btn-large waves-effect">
                    Sign In
                </button>
            </p>
        </form>
    </div>
</div>
