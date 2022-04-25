<div class="center">
    <div class="row">
        <h3 class="blue-text">
            Contact Us
        </h3>

        <form method="post" action="<?= site_url('/contact') ?>" class="col s12">
            <div class="input-field col s4">
                <i class="material-icons prefix">account_circle</i>
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" placeholder="Peter King" required="required">
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">email</i>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="valid-email@mail.com" required="required">
            </div>

            <div class="input-field col s4">
                <i class="material-icons prefix">phone</i>
                <label for="phone_number">Phone Number</label>
                <input type="tel" name="phone_number" id="phone_number" placeholder="043949393">
            </div>

            <div class="input-field col s12">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="materialize-textarea" placeholder="Hi there.... I contact your for ..." required="required"></textarea>
            </div>

            <div class="col s12">
                <button type="submit" name="contact_submit" value="1" class="bold btn-large waves-effect">
                    ✉️ Send Message
                </button>
            </div>
        </form>
    </div>
</div>
