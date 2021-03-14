<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white"><?= strto("lower|upper", $news->title->$lang) ?></h3>
                    <ul>
                        <li><a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a></li>
                        <li><a href="<?= base_url($languageJSON["routes"]["haberler"]); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["haberler"]); ?>"><?= strto("lower|upper", $languageJSON["routes"]["haberler"]); ?></a></li>
                        <li><span><?= strto("lower|upper", $news->title->$lang); ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->

<!-- Blog Section Start Here -->
<div class="blog-section pt-90 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 order-lg-1">
                <div class="row mb-n10">
                    <div class="col-12 mb-10">
                        <!-- Single Post Details Start -->
                        <div class="blog-details mb-10">
                            <!-- Image -->
                            <div class="image mb-6" data-aos="fade-up" data-aos-delay="300">
                                <picture>
                                    <img data-src="<?= get_picture("news_v", $news->img_url->$lang) ?>" alt="<?= $news->title->$lang ?>" class="img-fluid w-100 lazyload">
                                </picture>
                            </div>
                            <!-- Single Post Details Content Start -->
                            <div class="content" data-aos="fade-up" data-aos-delay="300">
                                <!-- Title -->
                                <h2 class="title mb-3"><?= $news->title->$lang ?></h2>
                                <!-- Meta -->
                                <div class="meta-list mb-3">
                                    <span class="meta-item date"><?= $languageJSON["detailPages"]["publishDate"] ?> : <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($news->createdAt))) ?></span>
                                    <span class="meta-item comment"><?= $languageJSON["detailPages"]["lastUpdate"] ?> : <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($news->updatedAt))); ?></span>
                                </div>
                                <!-- Description -->
                                <div class="desc"><?= $news->content->$lang ?></div>
                            </div>
                            <!-- Single Post Details Content End -->
                        </div>
                        <!-- Single Post Details End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End Here -->