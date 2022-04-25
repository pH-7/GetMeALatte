<div class="center">
    <div class="row">
        <h3 class="blue-text">
             Your Payment Gateway 💸
        </h3>

        <form action="<?= site_url('/payment') ?>" method="post" class="col s12">
            <p class="input-field col s6">
                <i class="material-icons prefix">email</i>
                <input type="email" name="paypal_email" value="<?= $view->escape($paypalEmail) ?>" id="paypal_email" required="required">
                <label for="paypal_email">Paypal Email</label>
            </p>

            <p class="input-field col s6">
                <select name="currency" id="currency">
                    <option value="USD" <?= $currency === 'USD' ? 'selected' : '' ?>>USD</option>
                    <option value="CAD" <?= $currency === 'CAD' ? 'selected' : '' ?>>CAD</option>
                    <option value="AUD" <?= $currency === 'AUD' ? 'selected' : '' ?>>AUD</option>
                    <option value="EUR" <?= $currency === 'EUR' ? 'selected' : '' ?>>EUR</option>
                    <option value="GBP" <?= $currency === 'GBP' ? 'selected' : '' ?>>GBP</option>
                </select>
                <label for="currency">Currency</label>
            </p>

            <p class="col s12">
                <button type="submit" name="payment_submit" value="1" class="bold waves-effect btn-large">
                    Save
                </button>
            </p>
        </form>
    </div>
</div>
