<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white"><?= strto("lower|upper", $languageJSON["detailPages"]["sectors"]); ?></h3>
                    <ul>
                        <li>
                            <a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a>
                        </li>
                        <li><?= strto("lower|upper", $languageJSON["detailPages"]["sectors"]); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->

<!-- Portfolio Section Start Here -->
<div class="service-section pt-90 pb-90">
    <div class="container">
        <h3 class="title text-center"><?= strto("lower|upper", $languageJSON["detailPages"]["sectors"]); ?></h3>
        <div class="row mb-n10">

            <?php foreach ($sectors as $key => $value) : ?>
                <div class="col-lg-2 col-md-6 mb-10">
                    <div class="single-service-wrapper" data-aos="fade-up" data-aos-delay="100">

                        <div class="lazyload img-fluid w-100">
                                <img data-src="<?= get_picture("sectors_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" class="lazyload img-fluid w-100">
                        </div>
                        <div class="service-content">
                            <h4 class="title"><?= mb_word_wrap(clean($value->title->$lang), 300, "...") ?></h4>
                        </div>

                    </div>
                </div>
            <?php endforeach ?>
            <div class="col-lg-12 col-md-12">
                <?= $links ?>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Section End Here -->