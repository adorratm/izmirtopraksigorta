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
							<div class="about-slider swiper-container">
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

								<div class="about-slider-prev swiper-button-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
								<div class="about-slider-next swiper-button-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
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
	<!-- Project Tab Section Start -->
	<div class="section-fluid section-padding bg-secondary tab-carousel">
		<div class="container-fluid">
			<div class="row">
				<!-- Section Title Start -->
				<div class="section-title" data-aos="fade-up" data-aos-delay="300">
					<h2 class="title text-white"><?= $languageJSON["homepage"]["services"]["value"] ?></h2>
					<span></span>
				</div>
				<!-- Section Title End -->

				<!-- Tab Start -->
				<div class="col-12 mb-4 text-center mt-7 mb-10 pb-2 d-none" data-aos="fade-up" data-aos-delay="400">

					<ul class="project-tab nav-tab nav mb-n1 d-none">
						<li class="nav-item"><a class="nav-link active d-none" data-bs-toggle="tab" href="#tab-project-all"><?= $languageJSON["homepage"]["services"]["value"] ?></a></li>
					</ul>
				</div>
				<!-- Tab End -->
			</div>
			<div class="row row-cols-1">
				<div class="col">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tab-project-all">
							<div class="project-carousel">
								<div class="swiper-container">
									<div class="swiper-wrapper">
										<?php foreach ($services as $key => $value) : ?>
											<?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
												<!-- Project Start -->
												<div class="swiper-slide">
													<div class="single-project single-project-fullwidth" data-aos="fade-up" data-aos-delay="200">
														<div class="project-image">
															<a class="project-overlay" href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $languageJSON["homepage"]["viewServices"]["value"] ?>">
																<picture>
																	<img data-src="<?= get_picture("services_v", $value->img_url->$lang) ?>" alt="<?= $value->title->$lang ?>" class="img-fluid lazyload">
																</picture>
															</a>
														</div>
														<div class="project-content">
															<h4 class="title"> <a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $value->title->$lang ?></a></h4>
															<ul class="project-tag">
																<li><?= mb_word_wrap($value->content->$lang, 250, "...") ?></li>
															</ul>
															<a class="btn btn-outline-matterhorn btn-hover-primary btn-sm" href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $languageJSON["homepage"]["viewServices"]["value"] ?></a>
														</div>
													</div>
												</div>
												<!-- Project End -->
											<?php endif ?>
										<?php endforeach ?>
									</div>
								</div>
								<div class="swiper-pagination d-none"></div>
								<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
								<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Project Tab Section End -->
<?php endif ?>

<!-- FunFact Section Start -->
<div class="section funfact-bg">
	<div class="container">
		<div class="row row-cols-sm-2 row-cols-lg-4 row-cols-1 mb-n10">
			<!-- FunFact Area Start -->
			<div class="col mb-10">
				<!-- Single FunFact Start -->
				<div class="funfact-wrap" data-aos="fade-up" data-aos-delay="300">
					<div class="funfact-icon">
						<i class="fa fa-file fa-3x"></i>
					</div>
					<span class="odometer" data-count-to="599"></span>
					<h6 class="title">Projects Complete</h6>
				</div>
				<!-- Single FunFact End -->
			</div>
			<div class="col mb-10">
				<!-- Single FunFact Start -->
				<div class="funfact-wrap" data-aos="fade-up" data-aos-delay="400">
					<div class="funfact-icon">
						<i class="fa fa-file fa-3x"></i>
					</div>
					<span class="odometer" data-count-to="252"></span>
					<h6 class="title">Happy Clients</h6>
				</div>
				<!-- Single FunFact End -->
			</div>
			<div class="col mb-10">
				<!-- Single FunFact Start -->
				<div class="funfact-wrap" data-aos="fade-up" data-aos-delay="500">
					<div class="funfact-icon">
						<i class="fa fa-file fa-3x"></i>
					</div>
					<span class="odometer" data-count-to="1252"></span>
					<h6 class="title">Cups of Coffee</h6>
				</div>
				<!-- Single FunFact End -->
			</div>
			<div class="col mb-10">
				<!-- Single FunFact Start -->
				<div class="funfact-wrap" data-aos="fade-up" data-aos-delay="600">
					<div class="funfact-icon">
						<i class="fa fa-file fa-3x"></i>
					</div>
					<span class="odometer" data-count-to="957"></span>
					<h6 class="title">Built House</h6>
				</div>
				<!-- Single FunFact End -->
			</div>
			<!-- FunFact Area End -->
		</div>
	</div>
</div>
<!-- FunFact Section End -->

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

<?php if (!empty($news)) : ?>
	<!-- Blog Section Start -->
	<div class="section section-padding">
		<div class="container">

			<!-- Section Title Start -->
			<div class="col-12 section-title" data-aos="fade-up" data-aos-delay="300">
				<h2 class="title"><?= $languageJSON["homepage"]["news"]["value"] ?></h2>
				<span></span>
			</div>
			<!-- Section Title End -->

			<div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 mb-n6">
				<?php foreach ($news as $key => $value) : ?>
					<?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
						<?php $category = get_news_category_title($value->category_id); ?>
						<?php $category->title = json_decode($category->title, true)[$lang]; ?>
						<?php $category->seo_url = json_decode($category->seo_url, true)[$lang]; ?>
						<div class="col mb-6">
							<!-- Blog Single Post Start -->
							<div class="blog-single-post-wrapper" data-aos="fade-up" data-aos-delay="300">
								<div class="blog-thumb">
									<a href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>" class="blog-overlay">
										<picture>
											<img data-src="<?= get_picture("news_v", $value->img_url->$lang) ?>" class="fit-image lazyload" alt="<?= $value->title->$lang ?>">
										</picture>
									</a>
								</div>
								<div class="blog-content">
									<div class="post-meta">
										<span><a href="<?= base_url($languageJSON["routes"]["haberler"] . "/{$category->seo_url}") ?>" title="<?= $category->title ?>"><?= $category->title ?></a></span>
									</div>
									<h3 class="title"><a href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>"><?= $value->title->$lang ?></a></h3>
									<p><?= mb_word_wrap($value->content->$lang, 250, "...") ?></p>
									<a href="<?= base_url($languageJSON["routes"]["haber"] . "/{$value->seo_url->$lang}") ?>" title="<?= $value->title->$lang ?>" class="btn btn-outline-matterhorn btn-hover-primary btn-sm"><?= $languageJSON["homepage"]["viewNews"]["value"] ?></a>
								</div>
							</div>
							<!-- Blog Single Post End -->
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<!-- Blog Section End -->
<?php endif ?>