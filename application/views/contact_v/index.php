<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Section Start -->
<div class="section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-breadcrumb-area">
                    <h1 class="title"><?= strto("lower|upper", $languageJSON["contact"]["contact"]["value"]) ?></h1>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a>
                        </li>
                        <li><span><?= strto("lower|upper", $languageJSON["contact"]["contact"]["value"]); ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Contact Details Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-12 section-title" data-aos="fade-up" data-aos-delay="300">
                <h2 class="title"><?= strto("lower|upper", $languageJSON["contact"]["contact"]["value"]) ?></h2>
                <span></span>
            </div>
            <!-- Section Title End -->
        </div>
        <div class="row row-cols-sm-2 row-cols-lg-4 row-cols-1 mb-n6">

            <div class="col mb-6" data-aos="fade-up" data-aos-delay="300">

                <!-- Single Contact Address Start -->
                <div class="single-contact-address">
                    <div class="contact-address-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h4 class="title">Address Street</h4>
                    <?php if (!empty($settings->address)) : ?>
                        <p><?= clean($settings->address) ?></p>
                    <?php endif ?>
                    <a href="http://maps.google.com/maps?q=<?= clean($settings->address) ?>" target="_blank" title="<?= $languageJSON["footer"]["map"]["value"] ?>"><i class="fa fa-map"></i> <?= $languageJSON["footer"]["map"]["value"] ?></a>
                </div>
                <!-- Single Contact Address End -->

            </div>

            <div class="col mb-6" data-aos="fade-up" data-aos-delay="400">

                <!-- Single Contact Address Start -->
                <div class="single-contact-address">
                    <div class="contact-address-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h4 class="title">Phone Number</h4>
                    <?php if (!empty($settings->phone_1)) : ?>
                        <p><a href="tel:<?= $settings->phone_1 ?>" title="<?= $languageJSON["footer"]["phone_1"]["value"] ?>"><i class="fa fa-phone"></i> <?= $settings->phone_1 ?></a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->phone_2)) : ?>
                        <p><a href="tel:<?= $settings->phone_2 ?>" title="<?= $languageJSON["footer"]["phone_2"]["value"] ?>"><i class="fa fa-mobile-phone"></i> <?= $settings->phone_2 ?></a></p>
                    <?php endif ?>
                </div>
                <!-- Single Contact Address End -->

            </div>

            <div class="col mb-6" data-aos="fade-up" data-aos-delay="500">

                <!-- Single Contact Address Start -->
                <div class="single-contact-address">
                    <div class="contact-address-icon">
                        <i class="fa fa-fax"></i>
                    </div>
                    <h4 class="title">Fax Number</h4>
                    <?php if (!empty($settings->fax_1)) : ?>
                        <p><a href="tel:<?= $settings->fax_1 ?>" title="<?= $languageJSON["footer"]["fax_1"]["value"] ?>"><i class="fa fa-fax"></i> <?= $settings->fax_1 ?></a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->fax_2)) : ?>
                        <p><a href="tel:<?= $settings->fax_2 ?>" title="<?= $languageJSON["footer"]["fax_2"]["value"] ?>"><i class="fa fa-fax"></i> <?= $settings->fax_2 ?></a></p>
                    <?php endif ?>
                </div>
                <!-- Single Contact Address End -->

            </div>

            <div class="col mb-6" data-aos="fade-up" data-aos-delay="600">

                <!-- Single Contact Address Start -->
                <div class="single-contact-address">
                    <div class="contact-address-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h4 class="title">Address Email</h4>
                    <p><a href="mailto:<?= $settings->email ?>" title="E-mail"><i class="fa fa-envelope"></i> <?= $settings->email ?></a></p>
                    <?php if (!empty($settings->facebook)) : ?>
                        <p><a href="<?= $settings->facebook ?>" title="Facebook"><i class="fa fa-facebook"></i> Facebook</a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->twitter)) : ?>
                        <p><a href="<?= $settings->twitter ?>" title="Twitter"><i class="fa fa-twitter"></i> Twitter</a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->instagram)) : ?>
                        <p><a href="<?= $settings->instagram ?>" title="Instagram"><i class="fa fa-instagram"></i> Instagram</a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->linkedin)) : ?>
                        <p><a href="<?= $settings->linkedin ?>" title="Linkedin"><i class="fa fa-linkedin"></i> Linkedin</a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->youtube)) : ?>
                        <p><a href="<?= $settings->youtube ?>" title="Youtube"><i class="fa fa-youtube"></i> Youtube</a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->medium)) : ?>
                        <p><a href="<?= $settings->medium ?>" title="Medium"><i class="fa fa-medium"></i> Medium</a></p>
                    <?php endif ?>
                    <?php if (!empty($settings->pinterest)) : ?>
                        <p><a href="<?= $settings->pinterest ?>" title="Pinterest"><i class="fa fa-pinterest"></i> Pinterest</a></p>
                    <?php endif ?>
                </div>
                <!-- Single Contact Address End -->

            </div>

        </div>
    </div>
</div>
<!-- Contact Details Section End -->

<!-- Contact Map Start -->
<div class="section section-padding pt-0" data-aos="fade-up" data-aos-delay="300">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Google Map Area Start-->
                <div class="google-map-area w-100">
                    <?= htmlspecialchars_decode($settings->map) ?>
                </div>
                <!--Google Map Area Start-->
            </div>
        </div>
    </div>
</div>
<!-- Contact Map End -->

<!-- Contact Form Start -->
<div class="section bg-gray section-padding" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-12 section-title" data-aos="fade-up" data-aos-delay="300">
                <h2 class="title"><?= $languageJSON["contactForm"]["contactForm"]["value"] ?></h2>
                <span></span>
                <p><?= $languageJSON["contactForm"]["contactFormDesc"]["value"] ?></p>
            </div>
            <!-- Section Title End -->
        </div>
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="contact-form">
                    <form onsubmit="return false" enctype="multipart/form-data" method="POST" id="contact-form">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input class="input-item" type="text" name="full_name" data-aos="fade-right" data-aos-delay="300" placeholder="<?= $languageJSON["contactForm"]["namesurname"]["value"] ?>" required minlength="2" maxlength="70">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <input class="input-item" type="email" name="email" data-aos="fade-left" data-aos-delay="300" placeholder="<?= $languageJSON["contactForm"]["emailaddress"]["value"] ?>" required>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <input class="input-item" type="text" name="phone" data-aos="fade-up" data-aos-delay="400" placeholder="<?= $languageJSON["contactForm"]["phonenumber"]["value"] ?>" minlength="11" maxlength="19" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="input-item" type="text" name="subject" data-aos="fade-up" data-aos-delay="500" placeholder="<?= $languageJSON["contactForm"]["subject"]["value"] ?>">
                            </div>
                            <div class="col-12 mb-3">
                                <textarea class="textarea-item" name="comment" data-aos="fade-up" data-aos-delay="600"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="button" data-aos="fade-up" data-aos-delay="700" data-url="<?= base_url($languageJSON["routes"]["iletisim-formu"]) ?>" class="btn btn-primary btn-hover-dark btnSubmitForm"><?= $languageJSON["contactForm"]["submit"]["value"] ?> <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Contact Form End -->