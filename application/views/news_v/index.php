<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Section Start -->
<div class="section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-breadcrumb-area">
                    <h1 class="title"><?= strto("lower|upper", $languageJSON["routes"]["haberler"]); ?></h1>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a>
                        </li>
                        <li><span><?= strto("lower|upper", $languageJSON["routes"]["haberler"]); ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Section Start -->
<div class="section section-padding">
    <div class="container">
        <div class="row mb-n8 row-cols-sm-2 row-cols-lg-3 row-cols-1">
            <?php foreach ($news as $key => $value) : ?>
                <div class="col mb-8">
                    <!-- Single Blog Start -->
                    <div class="blog-single-post-wrapper" data-aos="fade-up" data-aos-delay="100">
                        <div class="blog-thumb">
                            <a href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" class="blog-overlay" title="<?= $value->title->$lang ?>">
                                <picture>
                                    <img data-src="<?= get_picture("news_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" class="lazyload img-fluid w-100">
                                </picture>
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="post-meta">
                                <span><a href="<?= base_url($languageJSON["routes"]["haberler"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $value->title->$lang ?></a></span>
                                <span style="cursor: pointer;" data-toggle="tooltip" title="<?= $languageJSON["detailPages"]["publishDate"] ?>" data-title="<?= $languageJSON["detailPages"]["publishDate"] ?>" data-placement="top"><small><?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($value->createdAt))) ?></small></span>
                                <span style="cursor: pointer;" data-toggle="tooltip" title="<?= $languageJSON["detailPages"]["lastUpdate"] ?>" data-title="<?= $languageJSON["detailPages"]["lastUpdate"] ?>" data-placement="top"><small><?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($value->updatedAt))); ?></small></span>
                            </div>
                            <h3 class="title"><a href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $value->title->$lang ?></a></h3>
                            <?= mb_word_wrap($value->content->$lang, 250, "...") ?>
                            <a class="link" href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $languageJSON["detailPages"]["viewNews"] ?></a>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
            <?php endforeach ?>
        </div>
        <div class="row mb-lg-0">
            <!-- Pagination Start -->
            <div class="col" data-aos="fade-up" data-aos-delay="300">
                <?= $links ?>
            </div>
            <!-- Pagination End -->
        </div>
    </div>
</div>
<!-- Blog Section End -->

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