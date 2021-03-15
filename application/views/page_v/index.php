<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $item->title = json_decode($item->title, true)[$lang] ?>
<?php $item->img_url = json_decode($item->img_url, true)[$lang] ?>
<?php $item->content = json_decode($item->content, true)[$lang] ?>

<!-- Breadcrumb Section Start -->
<div class="section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-breadcrumb-area">
                    <h1 class="title"><?= strto("lower|upper", $item->title) ?></h1>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a></li>
                        <li><span><?= strto("lower|upper", $item->title); ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- About Section Start -->
<div class="section section-padding">
    <div class="container">
        <!-- About Image/Content Start -->
        <div class="about-image-content-area">
            <div class="row align-items-center mb-n6">
                <div class="col-lg-12 mb-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="about-image">
                        <picture>
                            <img data-src="<?= get_picture("pages_v", $item->img_url) ?>" alt="<?= $item->title ?>" class="img-fluid lazyload">
                        </picture>
                    </div>
                </div>
                <div class="col-lg-12 mb-6" data-aos="fade-up" data-aos-delay="300">
                    <!-- About Content Start -->
                    <div class="about-content-area">
                        <h2 class="title"><?= $item->title ?></h2>
                        <div class="meta-list mb-3">
                            <span class="meta-item date"><?= $languageJSON["detailPages"]["publishDate"] ?> : <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($item->createdAt))) ?></span>
                            <span class="meta-item comment"><?= $languageJSON["detailPages"]["lastUpdate"] ?> : <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($item->updatedAt))); ?></span>
                        </div>
                        <p class="mb-5 mb-md-8 mt-4"><?= $item->content ?></p>
                    </div>
                    <!-- About Content End -->
                </div>

            </div>
        </div>
        <!-- About Image/Content End -->
    </div>
</div>
<!-- About Section End -->

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