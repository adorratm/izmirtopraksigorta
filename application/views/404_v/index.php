<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white">404 <?=$languageJSON["detailPages"]["404"]?></h3>
                    <ul>
                        <li><a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a></li>
                        <li><span>404 <?=$languageJSON["detailPages"]["404"]?></span></li>
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
                    <div class="col-6 offset-3 mb-10">
                        <!-- Single Post Details Start -->
                        <div class="blog-details mb-10">
                            <!-- Image -->
                            <div class="image mb-6" data-aos="fade-up" data-aos-delay="300">
                                <picture>
                                    <img data-src="<?=base_url("public/images/404.webp")?>" alt="<?=$languageJSON["detailPages"]["404"]?>" class="img-fluid lazyload">
                                </picture>
                            </div>
                            <!-- Single Post Details Content Start -->
                            <div class="content text-center justify-content-center" data-aos="fade-up" data-aos-delay="300">
                                <!-- Title -->
                                <h2 class="title my-3 text-center">404 <?=$languageJSON["detailPages"]["404"]?></h2>
                               
                                <!-- Description -->
                                <div class="desc mb-3 text-center"><?=$languageJSON["detailPages"]["404Desc"]?></div>
								<a href="<?=base_url()?>" title="<?=$languageJSON["detailPages"]["404Home"]?>" class="btn btn-default text-center mx-auto justify-content-center"><?=$languageJSON["detailPages"]["404Home"]?></a>
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






