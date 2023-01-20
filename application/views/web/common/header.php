<!-- ======= Header ======= -->

<header id="header" class="header d-flex align-items-center fixed-top">


    <a href="<?= base_url() ?>" class="logo d-flex align-items-center"><img
            src="<?= base_url('assets/web') ?>/img/logo.gif" alt="arclight"></a>


    <div class="container-fluid container-xl d-flex align-items-center justify-content-end">
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="<?= base_url() ?>" class="active">Home Page</a></li>


                <li class="dropdown"><a href="<?= base_url('segments') ?>"><span>Focused Segments</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <?php
                        if ($segments_menu) {
                            foreach ($segments_menu as $items) {
                        ?>
                        <li><a href="<?= base_url('segments/view/') . $items->id  ?>"><?= $items->title ?></a></li>
                        <?php
                            }
                        }
                        ?>
                        <!-- <li><a href="javascript:void(0)">Retail</a></li>
                        <li><a href="javascript:void(0)">Hospitality</a></li>
                        <li><a href="javascript:void(0)">Food & Beverages</a></li>
                        <li><a href="javascript:void(0)">Educational</a></li>
                        <li><a href="javascript:void(0)">Industrial & Commercial</a></li> -->
                    </ul>
                </li>


                <li class="dropdown"><a href="<?= base_url('services') ?>"><span>What We Do</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <?php
                        if ($services_menu) {
                            foreach ($services_menu as $items) {
                        ?>
                        <li><a href="<?= base_url('services/whatwedo/') ?><?= $items->id ?>"><?= $items->title ?></a>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="<?= base_url('gallery') ?>">Gallery Collection</a></li>
                <li><a href="<?= base_url('career') ?>">Join With Us</a></li>
                <li><a href="<?= base_url('contact_us') ?>">Get In Touch</a></li>
                <li><a href="<?= base_url('enquiry') ?>">Any Query</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->