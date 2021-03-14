<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<!-- Header Section Start -->
<div class="header section">

    <!-- Header Top Start -->
    <div class="header-top bg-secondary">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Header Top Link/Search Start -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 mr-auto text-left justify-content-start">
                    <ul class="header-top-links mr-auto text-left justify-content-start">
                        <?php if (!empty($settings->phone_1)) : ?>
                            <li>
                                <a href="tel:<?= $settings->phone_1 ?>" title="<?= $languageJSON["footer"]["phone_1"]["value"] ?>" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-phone align-items-center my-auto py-auto"></i> <?= $settings->phone_1 ?></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->phone_2)) : ?>
                            <li>
                                <a href="tel:<?= $settings->phone_2 ?>" title="<?= $languageJSON["footer"]["phone_2"]["value"] ?>" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-mobile-phone align-items-center my-auto py-auto"></i> <?= $settings->phone_2 ?></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->fax_1)) : ?>
                            <li>
                                <a href="tel:<?= $settings->fax_1 ?>" title="<?= $languageJSON["footer"]["fax_1"]["value"] ?>" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-fax align-items-center my-auto py-auto"></i> <?= $settings->fax_1 ?></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->fax_2)) : ?>
                            <li>
                                <a href="tel:<?= $settings->fax_2 ?>" title="<?= $languageJSON["footer"]["fax_2"]["value"] ?>" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-fax align-items-center my-auto py-auto"></i> <?= $settings->fax_2 ?></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->email)) : ?>
                            <li>
                                <a href="mailto:<?= $settings->email ?>" title="E-mail" class="align-items-center my-auto py-auto"><i class="fa fa-envelope align-items-center my-auto py-auto"></i> <?= $settings->email ?></a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- Header Top Link/Search End -->
                <!-- Header Top Action Bar Start -->
                <div class="col-xl-3 col-xl-3 col-md-3 col-sm-12 col-12 ml-auto text-right justify-content-end">
                    <ul class="ml-auto text-right justify-content-end header-top-links">
                        <?php if (!empty($settings->facebook)) : ?>
                            <li>
                                <a href="<?= $settings->facebook ?>" title="Facebook" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-facebook align-items-center my-auto py-auto mx-auto"></i></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->twitter)) : ?>
                            <li>
                                <a href="<?= $settings->twitter ?>" title="Twitter" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-twitter align-items-center my-auto py-auto mx-auto"></i></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->instagram)) : ?>
                            <li>
                                <a href="<?= $settings->instagram ?>" title="Instagram" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-instagram align-items-center my-auto py-auto mx-auto"></i></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->linkedin)) : ?>
                            <li>
                                <a href="<?= $settings->linkedin ?>" title="Linkedin" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-linkedin align-items-center my-auto py-auto mx-auto"></i></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->youtube)) : ?>
                            <li>
                                <a href="<?= $settings->youtube ?>" title="Youtube" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-youtube align-items-center my-auto py-auto mx-auto"></i></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->medium)) : ?>
                            <li>
                                <a href="<?= $settings->medium ?>" title="Medium" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-medium align-items-center my-auto py-auto mx-auto"></i></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($settings->pinterest)) : ?>
                            <li>
                                <a href="<?= $settings->pinterest ?>" title="Pinterest" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-pinterest align-items-center my-auto py-auto mx-auto"></i></a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
                <!-- Header Top Action Bar End -->
            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom section header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Header Logo Start -->
                <div class="col-xl-2 col-lg-3 col-6">
                    <div class="header-logo">
                        <a href="<?= base_url() ?>" title="<?= $settings->company_name ?>">
                            <picture>
                                <img src="<?= get_picture("settings_v", $settings->logo) ?>" alt="<?= $settings->company_name ?>" class="lazyload img-full img-fluid">
                            </picture>
                        </a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Menu Start -->
                <div class="col-xl-10 col-lg-9 col-6">
                    <!-- Main Menu Start -->
                    <div class="main-menu d-none d-lg-flex">
                        <?= $menus ?>
                    </div>
                    <!-- Main Menu End -->

                    <!-- Main Menu Riht Side Start -->
                    <div class="main-menu-right-side d-flex d-lg-none">

                        <!-- Mobile Menu Bar Start -->
                        <div class="mobile-menu-bar-wrapper">
                            <a href="javascript:void(0)" class="mobile-menu-bar"><i class="fa fa-bars"></i></a>
                        </div>
                        <!-- Mobile Menu Bar End -->

                    </div>
                    <!-- Main Menu Riht Side End -->

                </div>
                <!-- Header Menu End -->
            </div>
        </div>
    </div>
    <!-- Header Bottom End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu-wrapper">
        <div class="body-overlay"></div>
        <!-- Mobile Menu Inner Start -->
        <div class="mobile-menu-inner">

            <!-- Button Close Start -->
            <div class="btn-close-bar">
                <i class="fa fa-times"></i>
            </div>
            <!-- Button Close End -->

            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <nav>
                    <?= $mobileMenus ?>
                </nav>
            </div>
            <!-- mobile menu end -->

            <!-- Contact Links/Social Links Start -->
            <div class="mt-auto">
                <!-- Contact Link Start -->
                <ul class="contact-links">
                    <?php if (!empty($settings->phone_1)) : ?>
                        <li>
                            <a href="tel:<?= $settings->phone_1 ?>" title="<?= $languageJSON["footer"]["phone_1"]["value"] ?>"><i class="fa fa-phone"></i> <?= $settings->phone_1 ?></a>
                        </li>
                    <?php endif ?>
                    <?php if (!empty($settings->phone_2)) : ?>
                        <li>
                            <a href="tel:<?= $settings->phone_2 ?>" title="<?= $languageJSON["footer"]["phone_2"]["value"] ?>"><i class="fa fa-mobile-phone"></i> <?= $settings->phone_2 ?></a>
                        </li>
                    <?php endif ?>
                    <?php if (!empty($settings->fax_1)) : ?>
                        <li>
                            <a href="tel:<?= $settings->fax_1 ?>" title="<?= $languageJSON["footer"]["fax_1"]["value"] ?>"><i class="fa fa-fax"></i> <?= $settings->fax_1 ?></a>
                        </li>
                    <?php endif ?>
                    <?php if (!empty($settings->fax_2)) : ?>
                        <li>
                            <a href="tel:<?= $settings->fax_2 ?>" title="<?= $languageJSON["footer"]["fax_2"]["value"] ?>"><i class="fa fa-fax"></i> <?= $settings->fax_2 ?></a>
                        </li>
                    <?php endif ?>
                    <?php if (!empty($settings->email)) : ?>
                        <li>
                            <a href="mailto:<?= $settings->email ?>" title="E-mail"><i class="fa fa-envelope"></i> <?= $settings->email ?></a>
                        </li>
                    <?php endif ?>
                </ul>
                <!-- Contact Link End -->

                <!-- Social Widget Start -->
                <div class="widget-social">
                    <?php if (!empty($settings->facebook)) : ?>
                        <a href="<?= $settings->facebook ?>" title="Facebook" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-facebook align-items-center my-auto py-auto mx-auto"></i></a>
                    <?php endif ?>
                    <?php if (!empty($settings->twitter)) : ?>
                        <a href="<?= $settings->twitter ?>" title="Twitter" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-twitter align-items-center my-auto py-auto mx-auto"></i></a>
                    <?php endif ?>
                    <?php if (!empty($settings->instagram)) : ?>
                        <a href="<?= $settings->instagram ?>" title="Instagram" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-instagram align-items-center my-auto py-auto mx-auto"></i></a>
                    <?php endif ?>
                    <?php if (!empty($settings->linkedin)) : ?>
                        <a href="<?= $settings->linkedin ?>" title="Linkedin" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-linkedin align-items-center my-auto py-auto mx-auto"></i></a>
                    <?php endif ?>
                    <?php if (!empty($settings->youtube)) : ?>
                        <a href="<?= $settings->youtube ?>" title="Youtube" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-youtube align-items-center my-auto py-auto mx-auto"></i></a>
                    <?php endif ?>
                    <?php if (!empty($settings->medium)) : ?>
                        <a href="<?= $settings->medium ?>" title="Medium" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-medium align-items-center my-auto py-auto mx-auto"></i></a>
                    <?php endif ?>
                    <?php if (!empty($settings->pinterest)) : ?>
                        <a href="<?= $settings->pinterest ?>" title="Pinterest" class="align-items-center my-auto py-auto mx-auto"><i class="fa fa-pinterest align-items-center my-auto py-auto mx-auto"></i></a>
                    <?php endif ?>
                </div>
                <!-- Social Widget End -->
            </div>
            <!-- Contact Links/Social Links End -->

        </div>
        <!-- Mobile Menu Inner End -->
    </div>
    <!-- Mobile Menu End -->

</div>
<!-- Header Section End -->