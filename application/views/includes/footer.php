<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

	<!-- Background of PhotoSwipe.
	It's a separate element, as animating opacity is faster than rgba() . -->
	<div class="pswp__bg"></div>

	<!--Slides wrapper with overflow:hidden . -->
	<div class="pswp__scroll-wrap">

		<!--Container that holds slides . PhotoSwipe keeps only 3 slides in DOM to save memory . -->
		<!--don't modify these 3 pswp__item elements, data is added later on. -->
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>

		<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
		<div class="pswp__ui pswp__ui--hidden">

			<div class="pswp__top-bar">

				<!--  Controls are self-explanatory. Order can be changed. -->

				<div class="pswp__counter"></div>

				<button class="pswp__button pswp__button--close" title="Kapat (Esc)"></button>

				<button class="pswp__button pswp__button--fs" title="Tam Ekran"></button>

				<button class="pswp__button pswp__button--zoom" title="Yakınlaştır / Uzaklaştır"></button>

				<!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
				<!-- element will get class pswp__preloader--active when preloader is running -->
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>

			<button class="pswp__button pswp__button--arrow--left" title="Önceki (arrow left)">
			</button>

			<button class="pswp__button pswp__button--arrow--right" title="Sonraki (arrow right)">
			</button>

			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>

		</div>

	</div>
</div>

<footer class="section footer-section bg-secondary">
	<!-- Footer Top Start -->
	<div class="footer-top">
		<div class="container">
			<div class="row mb-n10">
				<div class="col-12 col-sm-6 col-lg-3 col-xl-3 mb-10">
					<div class="single-footer-widget">
						<div class="footer-logo">
							<a href="<?= base_url() ?>" title="<?= $settings->company_name ?>">
								<picture>
									<img data-src="<?= get_picture("settings_v", $settings->logo) ?>" alt="<?= $settings->company_name ?>" class="img-fluid lazyload">
								</picture>
							</a>
						</div>
						<?php if (!empty($settings->address)) : ?>
							<p class="desc-content pt-1"><?= clean($settings->address) ?></p>
						<?php endif ?>
						<!-- Contact Address Start -->
						<ul class="widget-address">
							<li>
								<a href="tel:<?= $settings->phone_1 ?>" title="<?= $languageJSON["footer"]["phone_1"]["value"] ?>"><i class='fa fa-phone'></i> <?= $settings->phone_1 ?></a>
							</li>
							<li>
								<a href="mailto:<?= $settings->email ?>" title="Email"><i class='fa fa-envelope'></i> <?= $settings->email ?></a>
							</li>
							<?php if (!empty($settings->address)) : ?>
								<li>
									<a href="http://maps.google.com/maps?q=<?= clean($settings->address) ?>" target="_blank" title="<?= $languageJSON["footer"]["map"]["value"] ?>"><i class='fa fa-map'></i> <?= $languageJSON["footer"]["map"]["value"] ?></a>
								</li>
							<?php endif ?>
						</ul>
						<!-- Contact Address End -->
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-3 col-xl-3 mb-10">
					<div class="single-footer-widget">
						<h2 class="widget-title"><?= $languageJSON["footer"]["services"]["value"] ?></h2>
						<ul class="widget-list">
							<?php foreach ($footerServices as $key => $value) : ?>
								<?php if (strtotime($value->sharedAt->$lang) <= strtotime("now")) : ?>
									<li><a href="<?= base_url($languageJSON["routes"]["hizmet"] . "/{$value->url->$lang}") ?>"><?= $value->title->$lang ?></a></li>
								<?php endif ?>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-2 col-xl-3 mb-10">
					<div class="single-footer-widget aos-init aos-animate">
						<h2 class="widget-title"><?= $languageJSON["footer"]["menus"]["value"] ?></h2>
						<?= $footer_menus ?>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-10">
					<div class="single-footer-widget">
						<h2 class="widget-title"><?= $languageJSON["footer"]["newsletter"]["value"] ?></h2>
						<div class="widget-body pt-5">
							<p class="desc-content mb-0"><?= $languageJSON["footer"]["newsletterDesc"]["value"] ?></p>

							<!-- Newsletter Form Start -->
							<div class="newsletter-form-wrap pt-4">
								<form id="mc-form" class="mc-form">
									<input type="email" id="mc-email" class="form-control email-box" placeholder="<?= $languageJSON["footer"]["newsletterPlaceholder"]["value"] ?>" name="EMAIL">
									<button id="mc-submit" class="newsletter-btn" type="submit"><i class="fa fa-envelope"></i></button>
								</form>
								<!-- mailchimp-alerts Start -->
								<div class="mailchimp-alerts text-centre">
									<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
									<div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
									<div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
								</div>
								<!-- mailchimp-alerts end -->
							</div>
							<!-- Newsletter Form End -->

							<!-- Soclial Link Start -->
							<div class="widget-social justify-content-start mt-6">
								<?php if (!empty($settings->facebook)) : ?>
									<a href="<?= $settings->facebook ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->twitter)) : ?>
									<a href="<?= $settings->twitter ?>" title="Twitter"><i class="fa fa-twitter"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->instagram)) : ?>
									<a href="<?= $settings->instagram ?>" title="Instagram"><i class="fa fa-instagram"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->linkedin)) : ?>
									<a href="<?= $settings->linkedin ?>" title="Linkedin"><i class="fa fa-linkedin"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->youtube)) : ?>
									<a href="<?= $settings->youtube ?>" title="Youtube"><i class="fa fa-youtube"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->medium)) : ?>
									<a href="<?= $settings->medium ?>" title="Medium"><i class="fa fa-medium"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->pinterest)) : ?>
									<a href="<?= $settings->pinterest ?>" title="Pinterest"><i class="fa fa-pinterest"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->email)) : ?>
									<a href="mailto:<?= $settings->email ?>" title="Email"><i class="fa fa-envelope"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->phone_1)) : ?>
									<a href="tel:<?= $settings->phone_1 ?>" title="<?= $languageJSON["footer"]["phone_1"]["value"] ?>"><i class="fa fa-phone"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->phone_2)) : ?>
									<a href="tel:<?= $settings->phone_2 ?>" title="<?= $languageJSON["footer"]["phone_2"]["value"] ?>"><i class="fa fa-mobile-phone"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->fax_1)) : ?>
									<a href="tel:<?= $settings->fax_1 ?>" title="<?= $languageJSON["footer"]["fax_1"]["value"] ?>"><i class="fa fa-fax"></i></a>
								<?php endif ?>
								<?php if (!empty($settings->fax_2)) : ?>
									<a href="tel:<?= $settings->fax_2 ?>" title="<?= $languageJSON["footer"]["fax_2"]["value"] ?>"><i class="fa fa-fax"></i></a>
								<?php endif ?>
							</div>
							<!-- Social Link End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Top End -->

	<!-- Footer Bottom Start -->
	<div class="container">
		<div class="row align-items-center footer-bottom">
			<div class="col-8 col-sm-8 col-md-9 col-lg-10 col-xl-10 text-center my-auto">
				<div class="copyright-content my-auto">
					<p class="my-auto">© <?= date("Y") ?> <a href="<?= base_url() ?>" title="<?= $settings->company_name ?>"><?= $settings->company_name ?></a>. <?= $languageJSON["footer"]["allRightsReserved"]["value"] ?></p>
				</div>
			</div>
			<div class="col-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 my-auto">
				<a href="https://mutfakyapim.com" title="Mutfak Yapım Dijital Reklam Ajansı" class="my-auto">
					<picture><img data-src="https://mutfakyapim.com/images/mutfak/logo.png" style="filter:drop-shadow(1px 1px 1px black);" class="img-fluid lazyload" alt="Mutfak Yapım Dijital Reklam Ajansı"></picture>
				</a>
			</div>
		</div>
	</div>
	<!-- Footer Bottom End -->
</footer>

<!-- Scroll Top Start -->
<a href="javascript:void(0)" class="scroll-top" id="scroll-top">
	<i class="arrow-top fa fa-long-arrow-up"></i>
	<i class="arrow-bottom fa fa-long-arrow-up"></i>
</a>
<!-- Scroll Top End -->



<!--FOOTER END-->
<div class="telefon">
	<a style="background-color:#f00000" href="tel:<?= $settings->phone_1 ?>" title="<?= $languageJSON["footer"]["phone_1"]["value"] ?>" alt="<?= $languageJSON["footer"]["phone_1"]["value"] ?>"><i class="fa fa-phone"></i></a>
</div>
<div class="whatsapp">
	<a href="https://api.whatsapp.com/send?phone=<?= $settings->phone_2 ?>&amp;text=<?= $settings->company_name ?>." target="_blank" title="WhatsApp" alt="WhatsApp"><i class="fa fa-whatsapp"></i></a>
</div>
<!--layout end-->
<!-- SCRIPTS -->
<script src="<?= base_url("public/js/vendor.min.js") ?>"></script>
<!-- Bootstrap Bundle -->
<script async src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.0/lazysizes.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/plugins/minMaxTimePlugin.min.js"></script>
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/plugins/momentPlugin.min.js"></script>
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/plugins/rangePlugin.min.js"></script>
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/plugins/scrollPlugin.min.js"></script>
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/plugins/confirmDate/confirmDate.min.js"></script>
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/plugins/labelPlugin/labelPlugin.min.js"></script>
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/plugins/weekSelect/weekSelect.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/l10n/<?= $lang == "en" ? "default" : $lang ?>.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- iziToast -->
<script async defer src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<!-- iziModal -->
<script async defer src="<?= base_url("public/js/iziModal.min.js") ?>"></script>
<!-- PhotoSwipe -->
<script async defer src="<?= base_url("public/photoswipe/photoswipe.min.js") ?>"></script>
<script async defer src="<?= base_url("public/photoswipe/photoswipe-ui-default.min.js") ?>"></script>
<script src="<?= base_url("public/js/zuck.css.min.js"); ?>"></script>
<script src="<?= base_url("public/js/zuck.min.js"); ?>"></script>
<script src="<?= base_url("public/js/plugins.min.js"); ?>"></script>
<script src="<?= base_url("public/js/main.js") ?>"></script>
<script src="<?= base_url("public/js/app.js") ?>"></script>
<!-- SCRIPTS -->
<script>
	<?php if (!empty($stories)) : ?>
		if ($("#stories").length > 0) {
			let currentSkin = getCurrentSkin();
			$(".stories").each(function(index) {
				let elem = $(this).attr("id");
				let stories = new Zuck(elem, {
					backNative: true,
					previousTap: true,
					skin: currentSkin['name'],
					autoFullScreen: currentSkin['params']['autoFullScreen'],
					avatars: currentSkin['params']['avatars'],
					paginationArrows: currentSkin['params']['paginationArrows'],
					list: currentSkin['params']['list'],
					cubeEffect: currentSkin['params']['cubeEffect'],
					localStorage: true,
					stories: [
						<?php foreach ($stories as $story_key => $story_value) :
							$story_value->img_url = json_decode($story_value->img_url, true);
							$story_value->folder_name = json_decode($story_value->folder_name, true);
							$story_value->updatedAt = json_decode($story_value->updatedAt, true);
							$story_value->title = json_decode($story_value->title, true);
						?>
							<?php if ($story_value->isActive) : ?>(Zuck.buildTimelineItem(
									"<?= $story_value->title[$lang] ?>",
									"<?= get_picture("stories_v/" . ($story_value->folder_name[$lang]), $story_value->img_url[$lang]) ?>",
									"<?= $story_value->title[$lang] ?>",
									"<?= (empty($story_value->url[$lang]) ? "javascript:void(0)" : $story_value->url[$lang]) ?>",
									<?= (empty($story_value->url[$lang]) ? strtotime($story_value->createdAt) : strtotime($story_value->updatedAt)) ?>,
									[
										<?php if (!empty($story_items)) : ?>
											<?php foreach ($story_items as $story_item_key => $story_item_value) : ?>
												<?php if ($story_item_value->isActive && $story_item_value->story_id == $story_value->id) : ?>["<?= $story_item_value->id ?>",
														"<?= $story_item_value->type ?>",
														<?= $story_item_value->length ?>,
														"<?= ($story_item_value->type == "photo" ? base_url("panel/uploads/stories_v/{$story_value->folder_name[$lang]}/{$story_item_value->src}") : base_url("panel/uploads/stories_v/{$story_value->folder_name[$lang]}/{$story_item_value->src}"))  ?>",
														"<?= ($story_item_value->type == "photo" ? base_url("panel/uploads/stories_v/{$story_value->folder_name[$lang]}/{$story_item_value->src}") : base_url("panel/uploads/stories_v/{$story_value->folder_name[$lang]}/{$story_item_value->src}"))  ?>",
														'<?= $story_item_value->url_text ?>',
														'<?= $story_item_value->url ?>',
														false,
														timestamp()
													],
												<?php endif; ?>
											<?php endforeach; ?>
										<?php endif; ?>
									]
								)),
							<?php endif; ?>
						<?php endforeach; ?>
					],
					language: {
						unmute: '<?= $languageJSON["story"]["unmute"]["value"] ?>',
						keyboardTip: '<?= $languageJSON["story"]["keyboardTip"]["value"] ?>',
						visitLink: '<?= $languageJSON["story"]["visitLink"]["value"] ?>',
						time: {
							ago: '<?= $languageJSON["story"]["ago"]["value"] ?>',
							hour: '<?= $languageJSON["story"]["hour"]["value"] ?>',
							hours: '<?= $languageJSON["story"]["hours"]["value"] ?>',
							minute: '<?= $languageJSON["story"]["minute"]["value"] ?>',
							minutes: '<?= $languageJSON["story"]["minutes"]["value"] ?>',
							fromnow: '<?= $languageJSON["story"]["fromnow"]["value"] ?>',
							seconds: '<?= $languageJSON["story"]["seconds"]["value"] ?>',
							yesterday: '<?= $languageJSON["story"]["yesterday"]["value"] ?>',
							tomorrow: '<?= $languageJSON["story"]["tomorrow"]["value"] ?>',
							days: '<?= $languageJSON["story"]["days"]["value"] ?>'
						}
					}
				});
			});

		}
	<?php endif; ?>
	$(window).on("load", function() {
		$(".date-pick").flatpickr({
			enableTime: true,
			enableSeconds: true,
			dateFormat: "Y-m-d H:i:s",
			time_24hr: true,
			disableMobile: true,
			inline: false,
			minDate: "today",
			locale: "<?= $lang == "en" ? "default" : $lang ?>",
			onChange: function(selectedDates, dateStr, instance) {
				let full_date = new Date(selectedDates);
				let date = full_date.getDate();
				let month = full_date.toLocaleDateString("<?= $lang == "en" ? "default" : $lang . "-" . strto("lower|upper", $lang) ?>", {
					month: "long"
				});
				let year = full_date.getFullYear();
				$(instance.element).parents('.check-form').find('.val-date').html(date);
				$(instance.element).parents('.check-form').find('.month').html(month);
				$(instance.element).parents('.check-form').find('.year').html(year);
			},
		});
	});
</script>
<?php $this->load->view("includes/alert") ?>
</body>

</html>