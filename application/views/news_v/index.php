<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white"><?= strto("lower|upper", $languageJSON["routes"]["haberler"]); ?></h3>
                    <ul>
                        <li>
                            <a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a>
                        </li>
                        <li><?= strto("lower|upper", $languageJSON["routes"]["haberler"]); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->

<!-- Portfolio Section Start Here -->
<div class="portfolio-section pt-90">
    <div class="container">
        <h3 class="title text-center"><?= strto("lower|upper", $languageJSON["routes"]["haberler"]); ?></h3>
        <div class="row mt-n6">
            <?php foreach ($news as $key => $value) :?>
                <div class="col-lg-4 col-sm-6 mt-30">
                    <div class="single-portfolio-wrap" data-aos="fade-up" data-aos-delay="300">
                        <figure class="portfolio-thumb hover-style position-relative m-0">
                            <a href="javascript:void(0)" title="<?= $value->title->$lang ?>">
                                <picture>
                                    <img data-src="<?= get_picture("news_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" class="lazyload img-fluid w-100">
                                </picture>
                                <div class="overlay-1"></div>
                            </a>
                            <figcaption class="portfolio-details">
                                <div class="port-info">
                                    <h3 class="title">
                                        <a href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $value->title->$lang ?></a>
                                        
                                    </h3>
                                    <div>
                                        <p><?= stripslashes(clean(nl2br(mb_word_wrap(stripslashes(clean(nl2br($value->content->$lang))), 300, "...")))) ?></p>
                                    </div>
                                    <nav class="nav portfolio-cate">
                                        <a href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $languageJSON["detailPages"]["viewNews"] ?> +</a>
                                    </nav>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-12 col-md-12">
                <?= $links ?>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Section End Here -->