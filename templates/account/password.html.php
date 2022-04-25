<div class="center">
    <div class="row">
        <h4 class="blue-text">
            Update Password
        </h4>

        <form method="post" action="<?= site_url('/account/password') ?>" class="col s12">
            <p class="input-field">
                <input type="password" name="current_password" id="current_password" required="required">
                <label for="current_password">Current Password:</label>
            </p>

            <p class="input-field">
                <input type="password" name="new_password" id="new_password" required="required">
                <label for="new_password">New Password:</label>
            </p>

            <p class="input-field">
                <input type="password" name="confirm_password" id="confirm_password" required="required">
                <label for="confirm_password">Confirm Password:</label>
            </p>

            <p>
                <button type="submit" name="password_submit" value="1" class="bold btn-large waves-effect">
                    Update
                </button>
            </p>
        </form>
    </div>
</div>
