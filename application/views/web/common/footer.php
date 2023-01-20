<!-- ======= Footer ======= -->
<footer id="footer" class="footer" data-aos="fade-up">

    <div class="footer-content">
        <div class="container">




            <div class="row gy-4">


                <div class="col-lg-2 col-md-4 col-12 footer-links">

                    <h4>Useful Links</h4>

                    <ul>
                        <li><i class="bi bi-dash"></i> <a href="<?= base_url() ?>">Home</a></li>
                        <li><i class="bi bi-dash"></i> <a href="<?= base_url('about') ?>">About Us</a></li>
                        <li><i class="bi bi-dash"></i> <a href="<?= base_url('gallery') ?>">Gallery</a></li>
                        <li><i class="bi bi-dash"></i> <a href="<?= base_url('career') ?>">Careers</a></li>
                        <li><i class="bi bi-dash"></i> <a href="javascript:void(0)">Upcoming Projects</a></li>
                    </ul>
                </div>


                <div class="col-lg-9 col-md-4 col-12 footer-links">
                    <div class="row">

                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bi bi-dash"></i> <a href="javascript:void(0)">Concept Development</a></li>
                            <li><i class="bi bi-dash"></i> <a href="javascript:void(0)">Turnkey Interiors</a></li>
                            <li><i class="bi bi-dash"></i> <a href="javascript:void(0)">MEP</a></li>
                            <li><i class="bi bi-dash"></i> <a href="javascript:void(0)">Joinery</a></li>
                            <li><i class="bi bi-dash"></i> <a href="javascript:void(0)">Glass and Aluminium</a></li>
                        </ul>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Arclight</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://arabinfotechllc.com/">Arabinfotec</a>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div class="cotact-details aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
    <?php if($social_facebook) : ?> <a href="<?= $social_facebook->url ?>"><i class="bi bi-facebook"></i></a><?php endif; ?>
    <?php if($social_instagram) : ?> <a href="<?= $social_instagram->url ?>"><i class="bi bi-instagram"></i></a><?php endif; ?>
    <?php if($social_whatsapp) : ?> <a href="<?= $social_whatsapp->url ?>"><i class="bi bi-whatsapp"></i></a><?php endif; ?>
    <a href="tel:<?= explode(PHP_EOL,$common_contact->phone)[0] ?>"><i class="bi bi-telephone-forward"></i></a>
    <a href="mailto:<?= $common_contact->email ?>"><i class="bi bi-envelope"></i></a>
</div>