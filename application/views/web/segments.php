<section class="inner-page-header position-relative">
    <img src="<?= base_url('assets/web') ?>/img/about-header.jpg" class="img-fluid">

    <div class="sub-page-title d-flex flex-column align-items-center breadcrumbs">

        <h2>Focused Segments</h2>
        <ol>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li>Focused Segments</li>
        </ol>

    </div>

</section> <!-- End inner-page-header -->

<main>


    <!-- ======= focusedsegments Section ======= -->
    <section id="featured-services" class="focusedsegments">
        <div class="container" data-aos="fade-up">


            <div class="row">
                <?php
                if ($segments) {
                    foreach ($segments as $items) {
                ?>

                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-building"></i></div>
                        <h4 class="title"><a href=""><?= $items->title ?></a></h4>
                        <p class="description"><?= $items->short_description ?></p>
                        <a href="<?= base_url('segments/view/') . $items->id ?>">View More</a>
                    </div>
                </div>
                <?php
                    }
                }
                ?>


            </div>

        </div>
    </section><!-- End focusedsegments Section -->



</main>




<!-- ======= Hero Section ======= -->

<!-- ======= Hero Section End ======= -->


<!-- End #main -->