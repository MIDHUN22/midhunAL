    <script src="<?= base_url('assets/web') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/web') ?>/vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets/web') ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets/web') ?>/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('assets/web') ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets/web') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets/web') ?>/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('assets/web') ?>/js/anime.min.js"></script>
    <script src="<?= base_url('assets/web') ?>/js/jquery.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url('assets/web') ?>/js/main.js"></script>



    <?php
if (isset($active_menu) && in_array($active_menu, ['contact_us', 'home'])) {
?>
    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?= config_item('SITE_KEY') ?>"></script>
<?php
}
?>


</body>

</html>