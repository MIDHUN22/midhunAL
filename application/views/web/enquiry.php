<section class="inner-page-header position-relative">
    <img src="<?= base_url('assets/web') ?>/img/about-header.jpg" class="img-fluid">

    <div class="sub-page-title d-flex flex-column align-items-center breadcrumbs">

        <h2>Any Query</h2>
        <ol>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li>Enquiry</li>
        </ol>

    </div>

</section> <!-- End inner-page-header -->

<main>


    <section id="contact-in" data-aos="fade-top" data-aos-delay="250" class="contact-in aos-init aos-animate">
        <div class="container position-relative aos-init aos-animate" data-aos="fade-up">

            <div class="section-header">
                <h2>Enquiry</h2>
            </div>

            <div class="row d-flex justify-content-center">



                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-top" data-aos-delay="250">

                    <form action="<?= base_url('Enquiry/send') ?>" method="post" role="form" class="php-email-form"
                        data-aos=" " data-aos-delay="100">

                        <input type="hidden" name="enquiry_type" id="enquiry_type" value="<?= $enquiry_type ?>">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required="">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required="">
                            </div>
                        </div>
                        <!-- <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required="" value="<?= isset($subject) ? $subject : '' ?>"
                                <?= $enquiry_type == "careers" ? 'readonly' : '' ?>>
                        </div> -->
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="comments" rows="5" placeholder="Message"
                                required=""></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div><button type="submit" class="border-radius">Send Message</button></div>
                    </form>

                </div><!-- End Contact Form -->

            </div>

        </div>
    </section> <!-- End Contact -->

    <!-- <?php
            if ($common_contact->map) :
            ?>
    <section id="map" data-aos="fade-top" data-aos-delay="250" class="map aos-init aos-animate">
        <div class="container">
            <iframe src="<?= $common_contact->map ?>" width="100%" height="450" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>  -->
    <!-- End map-->

    <?php
            endif;
?>

</main>

<!-- End #main -->

<script>
function button_click() {
    $('#submit').after(
        '<img src="<?= base_url('assets/web/') ?>img/ajaximg.gif" width="70" height="70" class="loader" />');
}
</script>