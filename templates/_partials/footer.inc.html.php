                <br><br>
            </div>
        </div>
    </div>
    <footer class="page-footer orange">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text"><?= site_name() ?></h5>
                    <p class="grey-text text-lighten-4">
                        We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.
                    </p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>

                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>

                    <ul>
                        <li>
                            <a class="white-text" href="<?= site_url('/about') ?>">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="white-text" href="<?= site_url('/contact') ?>">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <em>
                    &copy; <?= date('Y') ?> <a href="<?= site_url() ?>"><?= site_name() ?></a>
                </em>
            </div>
        </div>
    </footer>
   <script src="<?= site_url('/assets/materialize/js/materialize.js') ?>"></script>
   <script>
       document.addEventListener('DOMContentLoaded', function() {
           const elements = document.querySelectorAll('select');
           M.FormSelect.init(elements);
       });
   </script>
</body>
</html>
