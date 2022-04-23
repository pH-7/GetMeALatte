<div class="center">
    <div class="row">
        <h3 class="blue-text">Your Item</h3>

        <form method="post" action="<?= site_url('/item') ?>" class="col s12">
            <p class="input-field">
                <label for="id_name">Item ID Name</label>
                <input type="text" name="id_name" value="<?= $view->escape($idName) ?>" <?= $isFieldDisabled ? 'disabled' : '' ?> id="id_name" placeholder="Your Unique item ID name" required="required">
            </p>

            <p class="input-field">
                <label for="item_name">Item Name</label>
                <input type="text" name="item_name" value="<?= $view->escape($itemName) ?>" <?= $isFieldDisabled ? 'disabled' : '' ?> id="item_name" placeholder="Item Name" required="required">
            </p>

            <p class="input-field">
                <label for="business_name">Business Name</label>
                <input type="text" name="business_name" value="<?= $view->escape($businessName) ?>" <?= $isFieldDisabled ? 'disabled' : '' ?> id="business_name" placeholder="Business Name">
            </p>

            <p class="input-field">
                <label for="summary">Summary</label>
                <textarea
                    name="summary"
                    id="summary"
                    class="materialize-textarea"
                    placeholder="Item Summary ... ✍️"
                    required="required"
                    <?= $isFieldDisabled ? 'disabled' : '' ?>
                ><?= $view->escape($summary) ?></textarea>
            </p>

            <p class="input-field">
                <label for="price">Price</label>
                <input type="number" name="price"value="<?= $price ?>" <?= $isFieldDisabled ? 'disabled' : '' ?> step="0.01" id="price" placeholder="5.00">
            </p>

            <p>
                <button type="submit" name="item_submit" <?= $isFieldDisabled ? 'disabled' : '' ?> value="1" class="bold btn-large waves-effect">
                    Save
                </button>
            </p>
        </form>

        <?php if (strlen($shareItemUrl)): ?>
            <p>
                <input type="text" readonly="readonly" value="<?= $shareItemUrl ?>" onclick="this.select()">
            </p>
        <?php endif ?>
    </div>
</div>
