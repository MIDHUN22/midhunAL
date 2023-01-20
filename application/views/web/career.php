<section class="inner-page-header position-relative">
    <img src="<?= base_url('assets/web') ?>/img/about-header.jpg" class="img-fluid">

    <div class="sub-page-title d-flex flex-column align-items-center breadcrumbs">

        <h2>Join With Us</h2>
        <ol>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li>Join With Us</li>
        </ol>

    </div>

</section> <!-- End inner-page-header -->

<main>


    <section id="career" data-aos="fade-top" data-aos-delay="250" class="career aos-init aos-animate">

        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">

                    <div class="row gy-5 posts-list">

                        <div class="col-lg-12 sidebar">

                            <div class="col-sm-12 col-lg-4 col-md-6">

                                <div class="sidebar-item search-form">
                                    <h4 class="sidebar-title">Search</h4>
                                    <form action="" class="mt-3" method="POST">
                                        <input type="text" name="search" id="search" value="<?= ($_POST && $_POST['search']) ? $_POST['search'] : '' ?>">
                                        <button type="submit"><i class="bi bi-search"></i></button>
                                    </form>
                                </div><!-- End sidebar search formn-->

                            </div>
                        </div>

                        <?php
                        if ($careers) {
                            foreach ($careers as $career) {
                        ?>
                                <div class="col-lg-6">
                                    <article class="d-flex flex-column">
                                        <h2 class="title">
                                            <a href="<?= base_url('contact_us/post/').$career->id ?>"><?= $career->title ?></a>
                                        </h2>
                                        <div class="meta-top">
                                            <?= $career->subtitle ?>
                                        </div>
                                        <div class="content">
                                            <p><?= $career->description ?></p>
                                        </div>
                                        <div class="read-more mt-auto align-self-start">
                                            <a href="<?= base_url('contact_us/post/').$career->id ?>">Apply Now<i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </article>
                                </div><!-- End post list item -->
                        <?php
                            }
                        } else {
                            // echo 'No search result found';
                        }
                        ?>

                    </div><!-- End blog posts list -->

                    <!-- <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div> -->
                    
                    <!-- End blog pagination -->

                </div>



            </div>

        </div>
    </section>
    <!-- End Contact -->



</main>

<!-- End #main -->