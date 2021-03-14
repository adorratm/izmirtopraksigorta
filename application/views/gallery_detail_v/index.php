<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white"><?= strto("lower|upper", $gallery->title->$lang) ?></h3>
                    <ul>
                        <li><a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a></li>
                        <li><a href="<?= base_url($languageJSON["routes"]["galeriler"]); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["galeriler"]); ?>"><?= strto("lower|upper", $languageJSON["routes"]["galeriler"]); ?></a></li>
                        <li><span><?= strto("lower|upper", $gallery->title->$lang); ?></span></li>
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
                    <div class="row gallery-slider" itemscope>
                        <?php foreach ($gallery_items as $key => $value) : ?>
                            <figure class="col-lg-4 col-md-6" itemprop="associatedMedia" itemscope>
                                <?php if ($gallery->gallery_type == "files") : ?>
                                    <a href="<?= get_picture("galleries_v/$gallery->gallery_type/$gallery->folder_name->$lang", $value->url) ?>" alt="<?= $value->title ?>" download><i class="fa fa-download fa-2x"></i></a>
                                <?php elseif ($gallery->gallery_type == "videos") : ?>
                                    <video id="my-video<?= $key ?>" controls preload="auto" width="100%">
                                        <source src="<?= get_picture("galleries_v/$gallery->gallery_type/$gallery->folder_name->$lang", $value->url) ?>" />
                                    </video>
                                <?php elseif ($gallery->gallery_type == "video_urls") : ?>
                                    <iframe src="<?= $value->url ?>" allowfullscreen allowtransparency></iframe>
                                <?php else : ?>
                                    <a href="<?= get_picture("galleries_v/{$gallery->gallery_type}/{$gallery->folder_name->$lang}", $value->url) ?>" title="<?= $languageJSON["detailPages"]["viewItem"] ?>" itemprop="contentUrl" data-size="964x1024">
                                        <picture>
                                            <img class="img-fluid" src="<?= get_picture("galleries_v/{$gallery->gallery_type}/{$gallery->folder_name->$lang}", $value->url) ?>" alt="<?= $value->title ?>" itemprop="thumbnail">
                                        </picture>
                                        <figcaption itemprop="caption description">
                                            <small><?= $value->title ?></small>
                                            <?= $value->description ?>
                                        </figcaption>
                                    </a>
                                <?php endif ?>
                            </figure>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section End Here -->