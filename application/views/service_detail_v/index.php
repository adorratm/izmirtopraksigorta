<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Section Start -->
<div class="section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-breadcrumb-area">
                    <h1 class="title"><?= strto("lower|upper", $service->title->$lang) ?></h1>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a></li>
                        <li><a href="<?= base_url($languageJSON["routes"]["hizmetlerimiz"]); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["hizmetlerimiz"]); ?>"><?= strto("lower|upper", $languageJSON["routes"]["hizmetlerimiz"]); ?></a></li>
                        <li><span><?= strto("lower|upper", $service->title->$lang); ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Project Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="project-image mb-10">
                    <picture>
                        <img data-src="<?= get_picture("services_v", $service->img_url->$lang) ?>" alt="<?= $service->title->$lang ?>" class="img-fluid w-100 lazyload">
                    </picture>
                </div>
            </div>
        </div>

        <div class="row mb-n9">
            <div class="col-md-5 col-lg-3 mb-8 col-sm-12">
                <div class="project-info">
                    <h4 class="title mb-6"></h4>
                    <ul class="mb-n1">
                        <li><span><?= $languageJSON["detailPages"]["publishDate"] ?> :</span> <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($service->createdAt))) ?></li>
                        <li><span><?= $languageJSON["detailPages"]["lastUpdate"] ?> :</span> <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($service->updatedAt))); ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 col-lg-9 col-sm-12 mb-8">
                <div class="project-desc">
                    <h4 class="title mb-6"><?= $service->title->$lang ?></h4>
                    <?= $service->content->$lang ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project Masonry Section End -->

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