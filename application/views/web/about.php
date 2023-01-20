<section class="inner-page-header position-relative">
    <img src="<?= base_url('assets/web/') ?>/img/about-header.jpg" class="img-fluid">

    <div class="sub-page-title d-flex flex-column align-items-center breadcrumbs">

        <h2>Who We Are</h2>
        <ol>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li>Who We Are</li>
        </ol>

    </div>

</section> <!-- End inner-page-header -->

<main>

    <section id="about" class="about">
        <!-- about -->
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row gy-4 aos-init aos-animate" data-aos="fade-up">
                <div class="col-lg-4">
                    <div class="img-ho"> <img src="<?= base_url('assets/uploads') ?>/page/<?= $about_us[0]->desc_img ?>" class="img-fluid" alt="interior"> </div>
                </div>
                <div class="col-lg-8">
                    <div class="content ps-lg-5">

                        <p><?= $about_us[0]->description ?></p>

                    </div>
                </div>
            </div>

        </div>
    </section> <!-- End about -->


    <section id="services-list" class="services-list">

        <div class="container pt-5 pb-5 aos-init aos-animate" data-aos="fade-up">


            <div class="row gy-5">

                <div class="col-lg-4 col-md-4 service-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                    <div>
                        <h4 class="title"><a href="#" class="stretched-link"><?= $vision->title ?></a></h4>
                        <p class="description"><?= $vision->short_desc ?></p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-lg-4 col-md-4 service-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

                    <div>
                        <h4 class="title"><a href="#" class="stretched-link"><?= $motto->title ?></a></h4>
                        <p class="description"><?= $motto->short_desc ?></p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-4 service-item d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

                    <div>
                        <h4 class="title"><a href="#" class="stretched-link"><?= $mission->title ?></a></h4>
                        <p class="description"><?= $mission->short_desc ?></p>
                    </div>
                </div><!-- End Service Item -->





            </div>

        </div>
    </section> <!-- End mission Item -->




    <section id="why-us1" class="why-us1 pt-0">

        <div class="container pt-5 pb-5 aos-init aos-animate" data-aos="fade-up">

            <header class="section-header">
                <h2><?= $about_us[1]->title ?></h2>
                <p><?= $about_us[1]->description ?></p>
            </header>

            <div class="row">

                <div class="col-lg-6">
                    <img src="<?= base_url('assets/uploads') ?>/page/<?= $about_us[1]->desc_img ?>" class="img-fluid" alt="hospital interior">
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                    <div class=" align-self-center gy-4">


                        <img src="<?= base_url('assets/uploads') ?>/page/<?= $about_us[2]->desc_img ?>" class="img-fluid p-5" alt="hospital interior">


                    </div>
                </div>

            </div>


        </div>

    </section> <!-- End mission Item -->


</main>