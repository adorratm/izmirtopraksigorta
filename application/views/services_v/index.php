<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative mb-text-p" style="background-image:url('<?= base_url("public/images/funfact/1.webp") ?>');background-repeat:no-repeat;background-position:center center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title text-white"><?= strto("lower|upper", $languageJSON["routes"]["hizmetlerimiz"]); ?></h3>
                    <ul>
                        <li>
                            <a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a>
                        </li>
                        <li><?= strto("lower|upper", $languageJSON["routes"]["hizmetlerimiz"]); ?></li>
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
        <h3 class="title text-center"><?= strto("lower|upper", $languageJSON["routes"]["hizmetlerimiz"]); ?></h3>
        <div class="row mt-n6">
            <?php foreach ($services as $key => $value) : ?>
                <div class="col-lg-6 col-sm-12 mt-30">
						<!-- Single Blog Post Start -->
						<div class="single-blog-post-wrap aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
							<div class="blog-thumbnail">
								<a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="test">
									<picture>
										<img data-src="<?= get_picture("services_v", $value->img_url->$lang) ?>" class="fit-image lazyload" alt="test" src="<?= get_picture("services_v", $value->img_url->$lang) ?>">
										<i class="btn-plus text-center justify-content-center align-middle fa fa-plus fa-3x"></i>
									</picture>
								</a>
							</div>
							<div class="blog-post-details pt-3">
								<h3 class="title">
									<a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $value->title->$lang ?></a>
								</h3>
								<p class="desc-content mb-2 mb-md-2"><?= stripslashes(clean(nl2br(mb_word_wrap(stripslashes(clean(nl2br($value->content->$lang))), 300, "...")))) ?></p>
								<a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $value->title->$lang ?>" class="btn btn-hover-primary read-more">
									<?= $languageJSON["detailPages"]["viewService"] ?> +
								</a>
							</div>
						</div>
						<!-- Single Blog Post End -->
                </div>
            <?php endforeach ?>
            <div class="col-lg-12 col-md-12">
                <?= $links ?>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Section End Here -->