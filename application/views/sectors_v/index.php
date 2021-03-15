<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Section Start -->
<div class="section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-breadcrumb-area">
                    <h1 class="title"><?= strto("lower|upper", $languageJSON["detailPages"]["sectors"]); ?></h1>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a>
                        </li>
                        <li><span><?= strto("lower|upper", $languageJSON["detailPages"]["sectors"]); ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
<!-- Service Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-12 section-title" data-aos="fade-up" data-aos-delay="300">
                <h2 class="title"><?= strto("lower|upper", $languageJSON["detailPages"]["sectors"]); ?></h2>
                <span></span>
            </div>
            <!-- Section Title End -->
        </div>
        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 mb-n10">

            <?php foreach ($sectors as $key => $value) : ?>
                <?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
                    <div class="col mb-10" data-aos="fade-up" data-aos-delay="400">

                        <!-- Feature Box Wrapper Start -->
                        <div class="feature-box-wrapper feature-box-column">
                            <div class="mb-3">
                                <picture>
                                    <img data-src="<?= get_picture("sectors_v", $value->img_url->$lang) ?>" class="fit-image lazyload" alt="<?= $value->title->$lang ?>" src="<?= get_picture("services_v", $value->img_url->$lang) ?>">
                                </picture>
                            </div>
                            <div class="feature-content">
                                <h4 class="title"><?= $value->title->$lang ?></h4>

                            </div>
                        </div>
                        <!-- Feature Box Wrapper End -->

                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Service Section End -->


<?php if (!empty($brands)) : ?>
    <!-- Brand Logo Section Start -->
    <div class="section bg-secondary brand-logo-bg">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="brand-logo-carousel text-center">
                        <div class="swiper-container">
                            <div class="swiper-wrapper align-items-center">
                                <?php foreach ($brands as $key => $value) : ?>
                                    <?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
                                        <!-- Single Brand Logo Start -->
                                        <div class="swiper-slide">
                                            <div class="brand-logo" data-aos="fade-up" data-aos-delay="300">
                                                <picture>
                                                    <img data-src="<?= get_picture("brands_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" width="150" height="70" class="lazyload">
                                                </picture>
                                            </div>
                                        </div>
                                        <!-- Single Brand Logo End -->
                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Section End -->
<?php endif ?>

<?php if (!empty($testimonials)) : ?>
    <!-- Testimonial Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-12 section-title" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="title"><?= $languageJSON["homepage"]["testimonials"]["value"] ?></h2>
                    <span></span>
                </div>
                <!-- Section Title End -->
            </div>
            <div class="row">
                <div class="col">
                    <div class="testimonial-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($testimonials as $key => $value) : ?>
                                    <?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
                                        <!-- Single Testimonial Start -->
                                        <div class="swiper-slide">
                                            <div class="testimonial" data-aos="fade-up" data-aos-delay="300">
                                                <div class="text">
                                                    <p>"<?= stripslashes($value->content->$lang) ?></p>
                                                </div>
                                                <div class="thumb">
                                                    <picture>
                                                        <img data-src="<?= get_picture("testimonials_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" width="90" height="90" class="rounded-circle lazyload">
                                                    </picture>
                                                    <div class="name">
                                                        <h2 class="title"><?= $value->full_name->$lang ?> </h2>
                                                        <h4 class="sub-title"><?= $value->company->$lang ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Testimonial End -->
                                    <?php endif ?>
                                <?php endforeach ?>

                            </div>

                            <!-- pagination -->
                            <div class="swiper-pagination"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->
<?php endif ?>