<div class="center">
    <!-- Error Messages -->
    <?php if (!empty($error_message)): ?>
        <?php if (is_array($error_message) && count($error_message)): ?>
            <ul>
                <?php foreach ($error_message as $message): ?>
                    <li class="error"><?= $message ?></li>
                <?php endforeach ?>
            </ul>
        <?php else: ?>
            <span class="error"><?= $error_message ?></span>
        <?php endif ?>
    <?php endif ?>

    <!-- Success Messages -->
    <?php if (!empty($success_message)): ?>
        <?php if (is_array($success_message) && count($success_message)): ?>
            <ul>
                <?php foreach ($success_message as $message): ?>
                    <li class="success"><?= $message ?></li>
                <?php endforeach ?>
            </ul>
        <?php else: ?>
            <span class="success"><?= $success_message ?></span>
        <?php endif ?>
    <?php endif ?>
</div>
