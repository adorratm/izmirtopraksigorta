<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if (!empty($slides)) : ?>
	<!-- Hero/Intro Slider Start -->
	<div class="section">
		<div class="hero-slider swiper-container">
			<div class="swiper-wrapper">

				<?php foreach ($slides as $key => $value) : ?>
					<?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
						<div class="hero-slide-item swiper-slide">

							<div class="hero-slide-bg">
								<img src="<?= get_picture("slides_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" />
							</div>
							<div class="container">
								<div class="hero-slide-content">
									<span class="sub-title"><?= $settings->company_name ?> - <?= $settings->slogan ?></span>
									<h2 class="title"> <?= $value->title->$lang ?> </h2>
									<p><?= $value->description->$lang ?></p>
									<?php if ($value->allowButton->$lang == "1") : ?>
										<a target="_blank" href="<?= $value->button_url->$lang ?>" title="<?= $value->button_caption->$lang ?>" class="btn btn-hover-secondary btn-primary"><?= $value->button_caption->$lang ?></a>
									<?php endif ?>
								</div>
							</div>
							<div class="slider-overlay"></div>
						</div>
					<?php endif ?>
				<?php endforeach ?>

			</div>

			<div class="swiper-pagination"></div>

			<div class="home-slider-prev swiper-button-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
			<div class="home-slider-next swiper-button-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
		</div>
	</div>
	<!-- Hero/Intro Slider End -->
<?php endif ?>

<div id="storiesSticky2" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 storiesSticky bg-light">
	<?php if (!empty($stories)) : ?>
		<div id="stories" class="stories carousel pt-2 mb-0 pb-0 snapgram pt-1">
		</div>
	<?php endif; ?>
</div>

<!-- About Section Start -->
<div class="section section-padding">
	<div class="container">
		<!-- Section Title Start -->
		<div class="section-title" data-aos="fade-up" data-aos-delay="200">
			<h2 class="title"><?= $languageJSON["homepage"]["about_us"]["value"] ?></h2>
			<span></span>
		</div>
		<!-- Section Title End -->

		<!-- About Image/Content Start -->
		<div class="about-image-content-area">
			<div class="row mb-n6">
				<div class="col-lg-6 align-self-center order-lg-1 order-2 mb-6" data-aos="fade-up" data-aos-delay="300">
					<!-- About Content Start -->
					<div class="about-content-area">
						<h2 class="title"><?= $languageJSON["homepage"]["about_us"]["value"] ?></h2>
						<p class="mb-5 mt-4"><?= $settings->about_us ?></p>
						<a href="<?= $languageJSON["homepage"]["about_us_btn_link"]["value"] ?>" title="<?= $languageJSON["homepage"]["about_us_btn"]["value"] ?>" class="btn btn-hover-secondary btn-primary"><?= $languageJSON["homepage"]["about_us_btn"]["value"] ?></a>
					</div>
					<!-- About Content End -->
				</div>
				<div class="col-lg-6 order-lg-2 order-1 mb-6" data-aos="fade-up" data-aos-delay="400">
					<?php if (!empty($homeGallery) && !empty($homeGalleryItems)) : ?>
						<?php $homeGallery->folder_name = json_decode($homeGallery->folder_name, true) ?>
						<div class="about-image">
							<div class="abt_carousel swiper-container">
								<div class="swiper-wrapper">
									<?php foreach ($homeGalleryItems as $key => $value) : ?>
										<div class="swiper-slide bg-position mb-md-40 mb-sm-40">
											<picture>
												<img data-src="<?= get_picture("galleries_v/{$homeGallery->gallery_type}/{$homeGallery->folder_name[$lang]}", $value->url) ?>" alt="<?= $value->title ?>" class="fit-image lazyload">
											</picture>
										</div>
										<!--abt-img end-->
									<?php endforeach ?>


								</div>
								<!-- Slider pagination -->
								<div class="swiper-pagination"></div>

								<div class="home-slider-prev swiper-button-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
								<div class="home-slider-next swiper-button-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
							</div>
						</div>
						<!--abt_carousel end-->
					<?php endif ?>


				</div>
			</div>
		</div>
		<!-- About Image/Content End -->
	</div>
</div>
<!-- About Section End -->

<?php if (!empty($services)) : ?>
	<!-- Blog Section Start Here -->
	<div class="blog-section pt-90 pb-90 bg-light">
		<div class="container">
			<div class="row">
				<div class="section-title text-center mb-8" data-aos="fade-up" data-aos-delay="100">
					<h3 class="title"><?= $languageJSON["homepage"]["services"]["value"] ?></h3>
				</div>
			</div>
			<div class="row mb-n10">
				<?php $i = 0 ?>
				<?php foreach ($services as $key => $value) : ?>
					<?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
						<div class="col-md-4 mb-10">
							<!-- Single Blog Post Start -->
							<div class="single-blog-post-wrap" data-aos="fade-up" data-aos-delay="<?= ($i == 0 ? "200" : ($i == 1 ? "300" : "400")) ?>">
								<div class="blog-thumbnail">
									<a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $languageJSON["homepage"]["viewServices"]["value"] ?>">
										<picture>
											<img data-src="<?= get_picture("services_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" class="img-fluid lazyload">
											<i class="btn-plus text-center justify-content-center align-middle fa fa-plus fa-3x"></i>
										</picture>
									</a>
								</div>
								<div class="blog-post-details py-3">
									<h3 class="title">
										<a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $value->title->$lang ?></a>
									</h3>
									<p class="desc-content mb-2"><?= mb_word_wrap($value->content->$lang, 250, "...") ?> </p>
									<a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $value->title->$lang ?>" class="btn btn-hover-primary read-more mb-2"><?= $languageJSON["homepage"]["viewServices"]["value"] ?> +</a>
								</div>
							</div>
							<!-- Single Blog Post End -->
						</div>
						<?php if ($i <= 2) : $i++; ?>
						<?php else : $i = 0; ?>
						<?php endif; ?>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<!-- Blog Section End Here -->
<?php endif ?>

<?php if (!empty($news)) : ?>
	<!-- Blog Section Start Here -->
	<div class="blog-section pt-90 pb-90">
		<div class="container">
			<div class="row">
				<div class="section-title text-center mb-8" data-aos="fade-up" data-aos-delay="100">
					<h3 class="title"><?= $languageJSON["homepage"]["news"]["value"] ?></h3>
				</div>
			</div>
			<div class="row mb-n10">
				<?php $i = 0 ?>
				<?php foreach ($news as $key => $value) : ?>
					<?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
						<?php $category = get_news_category_title($value->category_id); ?>
						<?php $category->title = json_decode($category->title, true)[$lang]; ?>
						<?php $category->seo_url = json_decode($category->seo_url, true)[$lang]; ?>
						<div class="col-md-4 mb-10">
							<!-- Single Blog Post Start -->
							<div class="single-blog-post-wrap" data-aos="fade-up" data-aos-delay="<?= ($i == 0 ? "200" : ($i == 1 ? "300" : "400")) ?>">
								<div class="blog-thumbnail">
									<a href="<?= base_url($languageJSON["routes"]["haberler"] . "/{$category->seo_url}") ?>" title="<?= $category->title ?>">
										<picture>
											<img data-src="<?= get_picture("news_v", $value->img_url->$lang) ?>" class="fit-image lazyload" alt="<?= $value->title->$lang ?>">
											<i class="btn-plus text-center justify-content-center align-middle fa fa-plus fa-3x"></i>
										</picture>
									</a>
								</div>
								<div class="blog-post-details pt-5">
									<h3 class="title">
										<a href="<?= base_url($languageJSON["routes"]["haberler"] . "/{$category->seo_url}") ?>" title="<?= $category->title ?>"><?= $value->title->$lang ?></a>
									</h3>
									<div class="post-meta mb-3 mt-3">
										<a href="<?= base_url($languageJSON["routes"]["haberler"] . "/{$category->seo_url}") ?>" title="<?= $category->title ?>"><?= $category->title ?></a>
									</div>
									<p class="desc-content mb-2 mb-md-5"><?= mb_word_wrap($value->content->$lang, 250, "...") ?> </p>
									<a href="<?= base_url($languageJSON["routes"]["haberler"] . "/{$category->seo_url}") ?>" title="<?= $category->title ?>" class="btn btn-hover-primary read-more"><?= $languageJSON["homepage"]["viewNews"]["value"] ?> +</a>
								</div>
							</div>
							<!-- Single Blog Post End -->
						</div>
						<?php if ($i <= 2) : $i++; ?>
						<?php else : $i = 0; ?>
						<?php endif; ?>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<!-- Blog Section End Here -->
<?php endif ?>

<?php if (!empty($testimonials)) : ?>
	<!-- Testimonial Section Start Here -->
	<div class="testimonial-section pt-90 pb-90">
		<div class="container">
			<div class="row pb-3">
				<div class="section-title text-center" data-aos="fade-up" data-aos-delay="200" data-aos-anchor-placement="bottom bottom">
					<h4 class="title"><?= $languageJSON["homepage"]["testimonials"]["value"] ?></h4>
				</div>
			</div>
			<div class="row pt-5">
				<div class="col-12">
					<div class="single-slide-1 swiper-container" data-aos="fade-up" data-aos-delay="300">
						<div class="swiper-wrapper">
							<?php foreach ($testimonials as $key => $value) : ?>
								<?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
									<div class="testimonial swiper-slide">
										<div class="testimonial-author-image">
											<picture>
												<img data-src="<?= get_picture("testimonials_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" width="90" height="90" class="rounded-circle lazyload">
											</picture>
										</div>
										<blockquote>
											<p><?= stripslashes($value->content->$lang) ?></p>
										</blockquote>
										<div class="testimonial-author">
											<span><strong>- <?= $value->full_name->$lang ?> <?= $value->company->$lang ?></strong></span>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?>
						</div>
						<!-- Slider pagination -->
						<div class="swiper-pagination default-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>