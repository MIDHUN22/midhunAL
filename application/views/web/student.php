<section class="inner-page-header position-relative">
    <img src="<?= base_url('assets/web') ?>/img/about-header.jpg" class="img-fluid">

    <div class="sub-page-title d-flex flex-column align-items-center breadcrumbs">

        <h2>What We Do</h2>
        <ol>
            <li><a href="index.html">Home</a></li>
            <li>What We Do</li>
        </ol>

    </div>

</section> <!-- End inner-page-header -->

<main>



    <section id="what-we-do" class="what-we-do">

        <div class="container aos-init aos-animate" data-aos="fade-up">


            <div class="row gy-4 aos-init aos-animate" data-aos="fade-left">

                <?php
                if ($midhun) {
                    foreach ($midhun as $items) {
                ?>

                <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box-1">
                        <!-- <img src="<?= base_url('assets/web') ?>/img/whatwedo/1.jpg" class="img-fluid" alt="Drawing"> -->
                        <img src="<?= base_url('assets/uploads/brand/') . $items->image ?>" class="img-fluid"
                            alt="<?= $items->title ?>">
                        <h3><?= $items->name ?></h3>
                        <p>
                            <?= $items->education ?>
                        </p>

                        <a href="#" class="re-more">Read More</a>
                    </div>
                </div> <!-- End item -->
                <?php
                    }
                }
                ?>





            </div>

        </div>

    </section>



</main>




<!-- ======= Hero Section ======= -->

<!-- ======= Hero Section End ======= -->


<!-- End #main -->