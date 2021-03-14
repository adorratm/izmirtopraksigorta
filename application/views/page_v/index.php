<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $item->title = json_decode($item->title, true)[$lang] ?>
<?php $item->img_url = json_decode($item->img_url, true)[$lang] ?>
<?php $item->content = json_decode($item->content, true)[$lang] ?>

<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white"><?= strto("lower|upper",$item->title) ?></h3>
                    <ul>
                        <li><a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a></li>
                        <li><span><?= strto("lower|upper", $item->title); ?></span></li>
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
                                    <img data-src="<?= get_picture("pages_v", $item->img_url) ?>" alt="<?= $item->title ?>" class="img-fluid lazyload">
                                </picture>
                            </div>
                            <!-- Single Post Details Content Start -->
                            <div class="content" data-aos="fade-up" data-aos-delay="300">
                                <!-- Title -->
                                <h2 class="title mb-3"><?= $item->title ?></h2>
                                <!-- Meta -->
                                <div class="meta-list mb-3">
                                    <span class="meta-item date"><?= $languageJSON["detailPages"]["publishDate"] ?> : <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($item->createdAt))) ?></span>
                                    <span class="meta-item comment"><?= $languageJSON["detailPages"]["lastUpdate"] ?> : <?= iconv("ISO-8859-9", "UTF-8", strftime("%d %B %Y, %A %X", strtotime($item->updatedAt))); ?></span>
                                </div>
                                <!-- Description -->
                                <div class="desc"><?= $item->content ?></div>
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