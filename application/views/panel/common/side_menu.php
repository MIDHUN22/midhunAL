<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="<?= site_url('panel/dashboard') ?>" class="brand-link navbar-light"> <img
            src="<?= base_url('assets/panel/dist/') ?>img/logo_square.png" alt="<?= $website_title ?>"
            class="brand-image-icon elevation-3"><img src="<?= base_url('assets/panel/dist/') ?>img/logo.png"
            class="brand-text brand-image-logo" alt="<?= $website_title ?>"> </a>
    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?= site_url('panel/dashboard') ?>"
                        class="nav-link <?= $active_menu == 'dashboard' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>
                    </a>
                </li>

                <?php if (config_item('disable_lm_ecommerce') != TRUE) { ?>
                <li
                    class="nav-item has-treeview <?= in_array($active_menu, array('direct_order', 'product_category', 'product', 'product_order', 'product_group', 'product_attribute', 'product_order', 'product_quotation', 'product_inquiry')) ? 'menu-open' : '' ?>">
                    <a href="#"
                        class="nav-link <?= in_array($active_menu, array('direct_order', 'product_category', 'product', 'product_order', 'product_group', 'product_attribute', 'product_order', 'product_quotation', 'product_inquiry')) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Ecommerce <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (config_item('disable_lm_inquiry') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product_inquiry/all') ?>"
                                class="nav-link <?= $active_menu == 'product_inquiry' ? 'active' : '' ?>"> <i
                                    class="fas fa-comment-dots nav-icon"></i>
                                <p>Inquiry</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (config_item('disable_lm_quotation') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product_quotation/all') ?>"
                                class="nav-link <?= $active_menu == 'product_quotation' ? 'active' : '' ?>"> <i
                                    class="fas fa-certificate nav-icon"></i>
                                <p>Quotations</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product_order/all') ?>"
                                class="nav-link <?= $active_menu == 'product_order' ? 'active' : '' ?>"> <i
                                    class="fas fa-cart-arrow-down nav-icon"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                        <?php if (config_item('disable_lm_direct_order') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product/checkout') ?>"
                                class="nav-link <?= $active_menu == 'direct_order' ? 'active' : '' ?>"> <i
                                    class="fas fa-shopping-bag nav-icon"></i>
                                <p>Direct Order</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product/all') ?>"
                                class="nav-link <?= $active_menu == 'product' ? 'active' : '' ?>"> <i
                                    class="fas fa-boxes nav-icon"></i>
                                <!-- $active_menu_group == 'product' || -->
                                <p>Products</p>
                            </a>
                        </li>
                        <?php if (config_item('disable_lm_product_category') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product_category/all') ?>"
                                class="nav-link <?= $active_menu == 'product_category' ? 'active' : '' ?>"> <i
                                    class="fas fa-layer-group nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (config_item('disable_lm_product_group') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product_group/all') ?>"
                                class="nav-link <?= $active_menu == 'product_group' ? 'active' : '' ?>"> <i
                                    class="fas fa-object-group nav-icon"></i>
                                <p>Groups</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (config_item('disable_lm_product_attribute') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/product_attribute/all') ?>"
                                class="nav-link <?= $active_menu == 'product_attribute' ? 'active' : '' ?>"> <i
                                    class="fas fa-boxes nav-icon"></i>
                                <p>Attributes</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php } ?>
                <?php if (config_item('disable_lm_menu') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/menu/all') ?>"
                        class="nav-link <?= $active_menu == 'menu' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-equals"></i>
                        <p>Menu & Other Texts</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_pages') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/page/all') ?>"
                        class="nav-link <?= $active_menu == 'page' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-file-alt"></i>
                        <p>Content Management</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_article') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/article/all') ?>"
                        class="nav-link <?= $active_menu == 'article' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-sticky-note"></i>
                        <p>Careers</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_bio') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/bio/all') ?>"
                        class="nav-link <?= $active_menu == 'bio' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-feather"></i>
                        <p>Bio</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_label') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/label/all') ?>"
                        class="nav-link <?= $active_menu == 'label' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-map-signs"></i>
                        <p>Labels</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_album') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/album/all') ?>"
                        class="nav-link <?= $active_menu == 'album' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-film"></i>
                        <p>Banners & Gallery</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_news') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/news/all') ?>"
                        class="nav-link <?= $active_menu == 'news' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-newspaper"></i>
                        <p>Gallery</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_candidate') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/candidate/all') ?>"
                        class="nav-link <?= $active_menu == 'candidate' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-user"></i>
                        <p>Candidate</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_testimonial') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/testimonial/all') ?>"
                        class="nav-link <?= $active_menu == 'testimonial' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-marker"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_brand') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/brand/all') ?>"
                        class="nav-link <?= $active_menu == 'brand' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-crown"></i>
                        <p>Brands</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_midhun') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/midhun/all') ?>"
                        class="nav-link <?= $active_menu == 'midhun' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-crown"></i>
                        <p>Midhun</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_enquiry') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/enquiryadmin/all') ?>"
                        class="nav-link <?= $active_menu == 'enquiry' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-crown"></i>
                        <p>enquiry</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_segments') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/segmentsadmin/all') ?>"
                        class="nav-link <?= $active_menu == 'segments' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-crown"></i>
                        <p>Focussed Segments</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_partner') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/partner/all') ?>"
                        class="nav-link <?= $active_menu == 'partner' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-handshake"></i>
                        <p>Partners</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_company') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/company/all') ?>"
                        class="nav-link <?= $active_menu == 'company' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-building"></i>
                        <p>Companies</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_advertisement') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/advertisement/all') ?>"
                        class="nav-link <?= $active_menu == 'advertisement' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-certificate"></i>
                        <p>Advertisements</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_career') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/career/all') ?>"
                        class="nav-link <?= $active_menu == 'career' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-handshake"></i>
                        <p>What We Do</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_mail') != TRUE) : ?>
                <li
                    class="nav-item has-treeview <?= in_array($active_menu, array('mail_sample', 'mail_compose', 'mail_sent')) ? 'menu-open' : '' ?>">
                    <a href="#"
                        class="nav-link <?= in_array($active_menu, array('mail_sample', 'mail_compose', 'mail_sent')) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Mail <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('panel/mailer/compose') ?>"
                                class="nav-link <?= $active_menu == 'mail_compose' ? 'active' : '' ?>"> <i
                                    class="fas fa-plus nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/mailer/sent') ?>"
                                class="nav-link <?= $active_menu == 'mail_sent' ? 'active' : '' ?>"> <i
                                    class="fas fa-paper-plane nav-icon"></i>
                                <p>Sent</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/mailer/sample') ?>"
                                class="nav-link <?= $active_menu == 'mail_sample' ? 'active' : '' ?>"> <i
                                    class="fas fa-envelope-open-text nav-icon"></i>
                                <p>Sample</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_distributors') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/distributor/all') ?>"
                        class="nav-link <?= $active_menu == 'distributor' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-truck"></i>
                        <p>Distributors</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_other_distributors') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/other_distributor/all') ?>"
                        class="nav-link <?= $active_menu == 'other_distributor' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-truck-loading"></i>
                        <p>Other Distributors</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_account_manage') != TRUE) : ?>
                <li
                    class="nav-item has-treeview <?= in_array($active_menu, array('accounts', 'groups', 'permissions')) ? 'menu-open' : '' ?>">
                    <a href="#"
                        class="nav-link <?= in_array($active_menu, array('accounts', 'groups', 'permissions')) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Account Management <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url('panel/user/accounts') ?>"
                                class="nav-link <?= $active_menu == 'accounts' ? 'active' : '' ?>"> <i
                                    class="fas fa-user-friends nav-icon"></i>
                                <p>Accounts</p>
                            </a>
                        </li>
                        <?php if (config_item('disable_lm_account_groups') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/user/groups') ?>"
                                class="nav-link <?= $active_menu == 'groups' ? 'active' : '' ?>"> <i
                                    class="fas fa-layer-group nav-icon"></i>
                                <p>Groups</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (config_item('disable_lm_account_permissions') != TRUE) : ?>
                        <li class="nav-item">
                            <a href="<?= site_url('panel/user/permissions') ?>"
                                class="nav-link <?= $active_menu == 'permissions' ? 'active' : '' ?>"> <i
                                    class="fas fa-shield-alt nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_languages') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/language/all') ?>"
                        class="nav-link <?= $active_menu == 'language' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-language nav-icon"></i>
                        <p>Languages</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_socialmedia') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/socialmedia/all') ?>"
                        class="nav-link <?= $active_menu == 'socialmedia' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-comments nav-icon"></i>
                        <p>Social Media</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_contact') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/contact/all') ?>"
                        class="nav-link <?= $active_menu == 'contact' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-address-card nav-icon"></i>
                        <p>Contact Details</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (config_item('disable_lm_settings') != TRUE) : ?>
                <li class="nav-item">
                    <a href="<?= site_url('panel/settings') ?>"
                        class="nav-link <?= $active_menu == 'settings' ? 'active' : '' ?>"> <i
                            class="nav-icon fas fa-cogs nav-icon"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>