<!-- ======= Hero Section ======= -->
<div class="hero-main">

    <div class="slogan-main">

        <h2 data-aos="fade-up" class="shimmer"><?= $home_content['0']->title ?></h2>
        <blockquote data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
            <p><?= $home_content['0']->subtitle ?></p>
        </blockquote>
        <div class="d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <a href="<?= base_url() ?>" class="btn-get-started border-radius">Contact Us</a>
        </div>

    </div>

    <div class="slo-gon-mobile">
        <h4><?= $home_content['0']->title ?></h4>
    </div>

    <div class="banner-main">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                foreach ($home_banners as $key => $banner) {
                    $active = ($key == 0) ? ' class="active" aria-current="true" ' : "";
                ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $key ?>" <?= $active ?> aria-label="Slide <?= ($key + 1) ?>"></button>
                <?php
                }
                ?>
            </div>
            <div class="carousel-inner">
                <?php
                foreach ($home_banners as $key => $banner) {
                    $active = ($key == 0) ? ' active ' : "";
                ?>
                    <div class="carousel-item <?= $active ?>">
                        <img src="<?= base_url('assets/uploads') ?>/album/<?= $banner->file ?>" class="d-block w-100" alt="<?= $banner->title ?>">
                        <div class="carousel-caption d-md-block" id="float">
                            <h5 class="ml2"><?= $banner->title ?></h5>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </div>
</div>
<!-- ======= Hero Section End ======= -->


<main id="main">

    <div data-aos="fade-up" data-aos-delay="100" class="slogan-main-mob-c aos-init aos-animate">


        <div class="container">

            <div class="slogan-content">
                <blockquote data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                    <p><?= $home_content['0']->subtitle ?></p>
                </blockquote>
                <div class="aos-init aos-animate align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <a href="<?= base_url() ?>" class="btn-get-started">Contact Us</a>
                </div>
            </div>
        </div>
    </div>




    <!-- ======= About Us Section ======= -->



    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2><?= $home_content['1']->title ?></h2>

            </div>

            <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                <div class="col-xl-5 img-bg" style="background-image: url('<?= base_url('assets/uploads') ?>/page/<?= $home_content['1']->desc_img ?>')" data-aos="fade-right">
                    <div class="box">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="text-center c-td"> <img src="<?= base_url('assets/web') ?>/img/logo.png" alt="arclight"> </div>
                    </div>
                </div>
                <div class="col-xl-7 slides  position-relative">

                    <div class="swiper" data-aos="fade-left">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="item con-an">
                                    <p><?= $home_content['1']->description ?></p>
                                </div>
                            </div><!-- End slide item -->




                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>




    <!-- End About Us Section -->



    <!-- ======= Our Services Section ======= -->

    <section id="services-list" class="services-list">
        <div class="container pt-5 pb-5" data-aos="fade-up">


            <div class="row gy-5">

                <div class="col-lg-4 col-md-4 service-item d-flex" data-aos="fade-up" data-aos-delay="100">

                    <div>
                        <h4 class="title"><a href="#" class="stretched-link"><?= $home_content['2']->title ?></a></h4>
                        <p class="description"><?= $home_content['2']->short_desc ?></p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-4 service-item d-flex" data-aos="fade-up" data-aos-delay="200">

                    <div>
                        <h4 class="title"><a href="#" class="stretched-link"><?= $home_content['3']->title ?></a></h4>
                        <p class="description"><?= $home_content['3']->short_desc ?></p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-4 service-item d-flex" data-aos="fade-up" data-aos-delay="200">

                    <div>
                        <h4 class="title"><a href="#" class="stretched-link"><?= $home_content['4']->title ?></a></h4>
                        <p class="description"><?= $home_content['4']->short_desc ?></p>
                    </div>
                </div><!-- End Service Item -->





            </div>

        </div>
    </section>
    <!--End mission-->





    <section id="portfolio" class="portfolio pt-0">

        <div class="container">

            <header class="section-header">
                <h2>Recent Projects</h2>
            </header>

            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php
                    if ($gallery) {
                        foreach ($gallery as $items) {
                    ?>
                            <div class="swiper-slide">
                                <div class="portfolio-item filter-app">
                                    <img src="<?= base_url('assets/uploads') ?>/news/<?= $items->file ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4><?= $items->title ?></h4>
                                        <p><?= $items->description ?></p>
                                        <a href="<?= base_url('assets/uploads') ?>/news/<?= $items->file ?>" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div><!-- End Portfolio Item -->
                            </div> <!-- End swiper-slide -->
                    <?php
                        }
                    }
                    ?>
                </div>
            </div> <!-- End swiper-container -->
        </div>
    </section> <!-- Gallery -->














    <!-- End Our Services Section -->




    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="zoom-out">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-4">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="<?= $home_content['5']->subtitle ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= $home_content['5']->title ?></p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-4 col-md-4">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="<?= $home_content['6']->subtitle ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= $home_content['6']->title ?></p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-4 col-md-4">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="<?= $home_content['7']->subtitle ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p><?= $home_content['7']->title ?></p>
                    </div>
                </div><!-- End Stats Item -->


            </div>

        </div>
    </section><!-- End Stats Counter Section -->


    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Our Clients</h2>
            </header>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <?php
                    if ($clients) {
                        foreach ($clients as $client) {
                    ?>
                            <div class="swiper-slide"><img src="<?= base_url('assets/uploads') ?>/album/<?= $client->file ?>" class="img-fluid" alt=""></div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </section><!-- End Clients Section -->




    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container position-relative" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact Us</h2>
            </div>

            <div class="row gy-4 d-flex">

                <div class="col-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                    <div class="info-item d-flex" data-aos="fade-right">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p><?= str_replace(',', '<br>', $common_contact->address) ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p><?= $common_contact->email ?></p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p><?= str_replace(PHP_EOL, '<br>', $common_contact->phone) ?></p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="250">

                    <form action="home/send" method="post" role="form" class="php-email-form" data-aos=" " data-aos-delay="100" data-recaptcha-site-key="<?= config_item('SITE_KEY') ?>">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="comments" rows="5" placeholder="Message" required></textarea>
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
    </section>
    <!-- Contact Section -->

</main><!-- End #main -->