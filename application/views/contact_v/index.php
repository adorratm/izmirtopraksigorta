<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white"><?= strto("lower|upper",$languageJSON["contact"]["contact"]["value"]) ?></h3>
                    <ul>
                        <li>
                            <a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a>
                        </li>
                        <li><?= strto("lower|upper", $languageJSON["contact"]["contact"]["value"]); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Contact Information And Title Area Start -->
<div class="contact-info mt-5 pt-90 pb-90">
    <div class="container">
        <div class="row mb-n10">
            <div class="col-md-4 mb-10" data-aos="fade-up" data-aos-delay="100">
                <div class="info">
                    <div class="info-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="info-content">
                        <span class="info-text">
                            <?php if (!empty($settings->address)) : ?>
                                <?= clean($settings->address) ?>
                            <?php endif ?>
                        </span><br>
                        <a href="http://maps.google.com/maps?q=<?= clean($settings->address) ?>" target="_blank" title="<?= $languageJSON["footer"]["map"]["value"] ?>"><i class="fa fa-map"></i> <?= $languageJSON["footer"]["map"]["value"] ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-10" data-aos="fade-up" data-aos-delay="300">
                <div class="info">
                    <div class="info-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <span class="info-text">
                            <?php if (!empty($settings->phone_1)) : ?>
                                <a href="tel:<?= $settings->phone_1 ?>" title="<?= $languageJSON["footer"]["phone_1"]["value"] ?>"><i class="fa fa-phone"></i> <?= $settings->phone_1 ?></a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->phone_2)) : ?>
                                <a href="tel:<?= $settings->phone_2 ?>" title="<?= $languageJSON["footer"]["phone_2"]["value"] ?>"><i class="fa fa-mobile-phone"></i> <?= $settings->phone_2 ?></a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->fax_1)) : ?>
                                <a href="tel:<?= $settings->fax_1 ?>" title="<?= $languageJSON["footer"]["fax_1"]["value"] ?>"><i class="fa fa-fax"></i> <?= $settings->fax_1 ?></a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->fax_2)) : ?>
                                <a href="tel:<?= $settings->fax_2 ?>" title="<?= $languageJSON["footer"]["fax_2"]["value"] ?>"><i class="fa fa-fax"></i> <?= $settings->fax_2 ?></a>
                            <?php endif ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-10" data-aos="fade-up" data-aos-delay="600">
                <div class="info">
                    <div class="info-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="info-content">
                        <span class="info-text">
                            <a href="mailto:<?= $settings->email ?>" title="E-mail"><i class="fa fa-envelope"></i> <?= $settings->email ?></a><br>
                            <?php if (!empty($settings->facebook)) : ?>
                                <a href="<?= $settings->facebook ?>" title="Facebook"><i class="fa fa-facebook"></i> Facebook</a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->twitter)) : ?>
                                <a href="<?= $settings->twitter ?>" title="Twitter"><i class="fa fa-twitter"></i> Twitter</a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->instagram)) : ?>
                                <a href="<?= $settings->instagram ?>" title="Instagram"><i class="fa fa-instagram"></i> Instagram</a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->linkedin)) : ?>
                                <a href="<?= $settings->linkedin ?>" title="Linkedin"><i class="fa fa-linkedin"></i> Linkedin</a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->youtube)) : ?>
                                <a href="<?= $settings->youtube ?>" title="Youtube"><i class="fa fa-youtube"></i> Youtube</a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->medium)) : ?>
                                <a href="<?= $settings->medium ?>" title="Medium"><i class="fa fa-medium"></i> Medium</a><br>
                            <?php endif ?>
                            <?php if (!empty($settings->pinterest)) : ?>
                                <a href="<?= $settings->pinterest ?>" title="Pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                            <?php endif ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Information End -->
<!-- Contact Map Start -->
<div class="contac-map pb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Google Map Area Start-->
                <div class="google-map-area">
                    <?= htmlspecialchars_decode($settings->map) ?>
                </div>
                <!--Google Map Area Start-->
            </div>
        </div>
    </div>
</div>
<!-- Contact Map End -->
<!-- Contact Form Start -->
<div class="contact-form-area bg-light pt-90 pb-90" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <h3 class="title text-center"><?= $languageJSON["contactForm"]["contactForm"]["value"] ?></h3>
        <h4 class="sub-title text-center fs-6"><?= $languageJSON["contactForm"]["contactFormDesc"]["value"] ?></h4>
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="contact-form">
                    <form onsubmit="return false" enctype="multipart/form-data" method="POST" id="contact-form">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input class="input-item" type="text" name="full_name" placeholder="<?= $languageJSON["contactForm"]["namesurname"]["value"] ?>" required minlength="2" maxlength="70">
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <input class="input-item" type="email" name="email" placeholder="<?= $languageJSON["contactForm"]["emailaddress"]["value"] ?>" required>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <input class="input-item" type="text" name="phone" placeholder="<?= $languageJSON["contactForm"]["phonenumber"]["value"] ?>" minlength="11" maxlength="19" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input class="input-item" type="text" name="subject" placeholder="<?= $languageJSON["contactForm"]["subject"]["value"] ?>">
                            </div>
                            <div class="col-12 mb-3">
                                <textarea class="textarea-item" name="comment"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="button" data-url="<?= base_url($languageJSON["routes"]["iletisim-formu"]) ?>" class="btn btn-primary btn-hover-dark btnSubmitForm"><?= $languageJSON["contactForm"]["submit"]["value"] ?> <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Contact Form End -->