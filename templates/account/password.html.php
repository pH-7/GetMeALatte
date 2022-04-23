<div class="center">
    <h4 class="blue-text">Update Password</h4>

    <form method="post" action="<?= site_url('/account/password') ?>">
        <p>
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password" required="required">
        </p>

        <p>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" required="required">
        </p>

        <p>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required="required">
        </p>

        <p>
            <button type="submit" name="password_submit" value="1" class="bold btn-large waves-effect">
                Update
            </button>
        </p>
    </form>
</div>
