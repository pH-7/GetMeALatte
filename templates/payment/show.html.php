<?php use PH7\PH2Gravatar\Image; ?>

<div class="center">
    <h2 class="orange-text">
        <?= $view->escape($itemName) ?>
    </h2>

    <section>
        <p><?= nl2br($view->escape($summary)) ?></p>
        <p>Price: <em><?= $view->escape($currency) ?> <?= $view->escape($price) ?></em></p>
        <?php if (!empty($businessName)): ?>
            <p><small><?= $view->escape($businessName) ?></small></p>
        <?php endif ?>

      <?php if (!empty($userName) && !empty($userEmail)): ?>
        <p>
          <img src="<?= Image::get($userEmail) ?>" alt="<?= $userName ?>" class="materialboxed"  />
        </p>
      <?php endif ?>

        <p>
            <a href="<?= $paymentLink ?>" rel="nofollow" class="bold waves-effect btn-large">💰 Pay (<?= $view->escape($currency) ?> <?= $view->escape($price) ?>)</a>
        </p>
    </section>
</div>
