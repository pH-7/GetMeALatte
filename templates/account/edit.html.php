<div class="center">
    <h4 class="blue-text">Edit Account</h4>

    <form method="post" action="<?= site_url('/account/edit') ?>">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= $view->escape($user->fullname) ?>" required="required">
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $view->escape($user->email) ?>" required="required">
        </p>

        <p>
            <button type="submit" name="edit_submit" value="1" class="bold btn-large waves-effect">
                Save
            </button>
        </p>
    </form>
</div>
