<div class="center">
    <div class="row">
        <h3 class="blue-text">
            Contact Us
        </h3>

        <form method="post" action="<?= site_url('/contact') ?>" class="col s12">
            <p class="input-field">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" placeholder="Peter King" required="required">
            </p>

            <p class="input-field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="valid-email@mail.com" required="required">
            </p>

            <p class="input-field">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="materialize-textarea" placeholder="Hi there.... I contact your for ..." required="required"></textarea>
            </p>

            <button type="submit" name="contact_submit" value="1" class="bold btn-large waves-effect">✉️ Send Message</button>
        </form>
    </div>
</div>
