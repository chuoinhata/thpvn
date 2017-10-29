<?php
/**
 * 
 * author NVTri
 * since  1.0.0
 */

namespace THP\Frontend;

class Shortcode{

	public function __construct()
	{
		add_shortcode( 'thp_social', array($this, 'socialData') );
		add_shortcode( 'thp_contact', array($this, 'contactData') );
		add_shortcode( 'thp_slider', array($this, 'sliderData') );
		add_shortcode( 'thp_category_feature', array($this, 'categoryFeatureData') );
		add_shortcode( 'thp_skype', array($this, 'skypeData') );
		add_shortcode( 'thp_zalo', array($this, 'zaloData') );
		add_shortcode( 'thp_whatsapp', array($this, 'whatsappData') );
		add_shortcode( 'thp_phone', array($this, 'phoneData') );
		add_shortcode( 'thp_email', array($this, 'emailData') );
		add_shortcode('CF7_get_product_name', array($this, 'cf7_get_product_name'));
		add_shortcode('CF7_get_product_link', array($this, 'cf7_get_product_link'));
	}


	function cf7_get_product_name(){
		$result = get_the_title();
		return $result;
	}

	function cf7_get_product_link() {
		$result = get_the_permalink();
		return $result;
	}



	// [thp_social type="facebook" link="facebook.com"]
	function socialData( $atts ) {
		ob_start();
		$att = shortcode_atts( array(
			'type' => '',
			'link' => '',
			), $atts );

		if ($att['type'] == null || $att['link'] == null) {
			echo __('Wrong structure [thp_social type="facebook" link="facebook.com"]', 'thpvn');
		}
		else {
			echo '<a href="'. $att['link'] .'" class="thp-social-item" target="_blank"><i class="fa fa-'. $att['type'] .'" aria-hidden="true"></i></a>';
		}
		return ob_get_clean();
	}

	// [thp_contact icon="address" text="abc"]
	function contactData( $atts ) {
		ob_start();
		$att = shortcode_atts( array(
			'icon' => '',
			'text' => '',
			), $atts );

		if ($att['icon'] == null || $att['text'] == null) {
			echo __('Wrong structure [thp_contact icon="address" text="abc"]', 'thpvn');
		}
		else {
			echo '<div class="item-contact item-contact-'. $att['icon'] .'">';
			if ($att['icon'] == 'phone') {
				echo '<i class="icon-contact fa fa-'. $att['icon'] .'" aria-hidden="true"></i><span class="text-theme">'.__( 'Contact Us', 'thpvn' ).':</span><br><a href="tell:'. $att['text'] .'" target="_blank">'.$att['text'].'</a>';
			}
			else if ($att['icon'] == 'email') {
				echo '<i class="icon-contact fa fa-envelope-o" aria-hidden="true"></i><span class="text-theme">'.__( 'Email', 'thpvn' ).':</span> <a href="mailto:'. $att['text'] .'" target="_blank">'.$att['text'].'</a>';
			}
			else if ($att['icon'] == 'address') {
				echo '<i class="icon-contact fa fa-map-marker" aria-hidden="true"></i>'. $att['text'];
			}
			else {
				echo '<i class="icon-contact fa fa-'. $att['icon'] .'" aria-hidden="true"></i>'. $att['text'];
			}
			echo '</div>';
		}
		return ob_get_clean();
	}

	// [thp_slider]
	function sliderData() { 
		ob_start();
		
		$args = array( 
			'post_type' => 'product',
			'meta_key' => 'choose_slider',
			'meta_value' => 1,
			'suppress_filters' => 0);

		$listSlider = get_posts( $args );

		if ($listSlider) {
			?>
			<section class="slider-wrapper use-slick">
				<?php foreach ( $listSlider as $slider ) : setup_postdata( $slider ); ?>
					<?php
					$categoryProduct = get_the_terms($slider->ID, 'product_cat');
					$_product = wc_get_product( $slider->ID );
					//var_dump($categoryProduct);
					?>
					<article class="item-slider">
						<a href="<?php echo get_the_permalink($slider->ID)?>">
							<?php echo (get_field('slider_image', $slider->ID)) ? wp_get_attachment_image(get_field('slider_image', $slider->ID),'size-image-slider') : '<img src="//via.placeholder.com/1170x470">' ;?>
							<div class="content-slicer">
								<?php echo ($categoryProduct[0]->name) ? '<h2 class="category-product">'. $categoryProduct[0]->name .'</h2>' : ''; ?>
								<div class="content-slider-inner">
									<h3 class="name-product"><?php echo get_the_title($slider->ID); ?></h3>
									<?php echo (get_field('excerpt_description', $slider->ID)) ? '<div class="description-product">'. get_field('excerpt_description', $slider->ID) .'</div>' : ''; ?>
									<div class="price-product">
										<?php echo ($_product->price) ? '<h2 class="price">'. wc_price($_product->price) .'</h2>' : '' ; ?>
										<?php echo ($_product->regular_price) ? '<h4 class="reduce-price">'. wc_price($_product->regular_price) .'</h4>' : '' ; ?>

									</div>
								</div>
							</div>
						</a>
					</article>
				<?php endforeach; ?>
			</section>
			<?php
		}
		else {
			echo __('Slider null','thpvn');
		}
		wp_reset_postdata();
		return ob_get_clean();
	}

	//[thp_category_feature]
	function categoryFeatureData( $atts ) { 
		ob_start();
		$att = shortcode_atts( array(
			'id' => ''
			), 
		$atts );
		?>

		<?php

		$args = array(
			'include' 		 => explode(";",$att['id']),
			'taxonomy'     => 'product_cat',
			'show_count'   => 3,
			'pad_counts'   => 0,
			'hierarchical' => 0,
			'title_li'     => '',
			'hide_empty'   => 0
			);

		$allCategories = get_categories( $args );

		//var_dump($allCategories);

		if ($allCategories) {
			?>
			<section class="category-wrapper">
				<div class="row">
					<?php foreach ($allCategories as $cat) { 
						if ($cat) { 
							$thumbnailId = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
							$imageCategory = wp_get_attachment_image_src($thumbnailId,'size-image-category-feature');

							if ( $imageCategory && $imageCategory[1] == 370 && $imageCategory[2] == 250 ) { 
								$image = $imageCategory[0];
							}
							else {
								$image = "//via.placeholder.com/370x250";
							}
							?>
							<section class="item-category col-sm-6 col-md-6 col-lg-4">
								<a class="item-category-inner" href="<?php echo get_term_link($cat->slug, 'product_cat');?>">
									<img src="<?php echo $image;?>">
									<h2 class="name-category"><?php echo $cat->name; ?></h2>
								</a>
							</section>
							<?php 
						} 
					} ?>
				</div>
			</section>
			<?php
		}
		else {
			_e('Wrong structure [thp_category_feature id="32;33"]', 'thpvn');
		}
		return ob_get_clean();
	}

	//[thp_skype]
	function skypeData( $atts ) { 
		ob_start();
		$att = shortcode_atts( array(
			'skype' => '',
			'type' => '',
			), 
		$atts );
		if ($att['skype']) {
			$idString = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
			if ($att['type'] == "font") {
				?>
				<div class="info-contact-font skype">
					<div class="info-contact" style="display: none;">
						<div id="SkypeButton_Call_<?php echo $idString.'a';?>_1">
							<script type="text/javascript">
								Skype.ui({
									"name": "chat",
									"element": "SkypeButton_Call_<?php echo $idString.'a';?>_1",
									"participants": ["<?php echo $att['skype'];?>"],
									"imageSize": 24
								});
							</script>
						</div>
					</div>
					<a href="javascript://" onclick="SkypeWebControl.SDK.Chat.startChat({ConversationType: 'person', ConversationId: '<?php echo $att['skype'];?>'});">
						<span class="icon skype"><i class="fa fa-skype" aria-hidden="true"></i></span>
						<span class="text"><?php echo $att['skype'];?></span>
					</a>
				</div>
				<?php
			}
			else {
				?>
				<div class="info-contact">
					<div id="SkypeButton_Call_<?php echo $idString;?>_1">
						<script type="text/javascript">
							Skype.ui({
								"name": "chat",
								"element": "SkypeButton_Call_<?php echo $idString;?>_1",
								"participants": ["<?php echo $att['skype'];?>"],
								"imageSize": 24
							});
						</script>
					</div>
				</div>
				<?php
			}
		}
		else {
			_e('Wrong structure [thp_skype skype="account_skype"]', 'thpvn');
		}
		return ob_get_clean();
	}

	//[thp_zalo]
	function zaloData( $atts ) { 
		ob_start();
		$att = shortcode_atts( array(
			'zalo' => '',
			'type' => '',
			), 
		$atts );
		if ($att['zalo']) {
			if ($att['type'] == "font") {
				?>
				<div class="info-contact-font zalo">
					<a href="http://zalo.me/<?php echo $att['zalo'];?>" target="_blank">
						<span class="icon zalo"><img src="<?php echo get_template_directory_uri();?>/../dist/images/icon-zalo-min.png"></span>
						<span class="text"><?php echo $att['zalo'];?></span>
					</a>
				</div>
				<?php
			}
			else {
				?>
				<div class="info-contact">
					<a href="http://zalo.me/<?php echo $att['zalo'];?>" target="_blank">
						<img src="<?php echo get_template_directory_uri();?>/../dist/images/icon-zalo.png">
					</a>
				</div>
				<?php
			}
		}
		else {
			_e('Wrong structure [thp_zalo zalo="phone_number"]', 'thpvn');
		}
		return ob_get_clean();
	}

	//[thp_whatsapp]
	function whatsappData( $atts ) { 
		ob_start();
		$att = shortcode_atts( array(
			'whatsapp' => '',
			'type' => '',
			), 
		$atts );
		if ($att['whatsapp']) {
			if ($att['type'] == "font") {
				?>
				<div class="info-contact-font whatsapp">
					<a href="https://api.whatsapp.com/send?phone=<?php echo $att['whatsapp'];?>" target="_blank">
						<span class="icon whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
						<span class="text"><?php echo $att['whatsapp'];?></span>
					</a>
				</div>
				<?php
			}
			else {
				?>
				<div class="info-contact">
					<a href="https://api.whatsapp.com/send?phone=<?php echo $att['whatsapp'];?>" target="_blank">
						<img src="<?php echo get_template_directory_uri();?>/../dist/images/icon-whatsapp.png" alt="" />
					</a>
				</div>
				<?php
			}
		}
		else {
			_e('Wrong structure [thp_whatsapp whatsapp="phone_number"]', 'thpvn');
		}
		return ob_get_clean();
	}

	//[thp_phone]
	function phoneData( $atts ) { 
		ob_start();
		$att = shortcode_atts( array(
			'phone' => '',
			'type' => '',
			), 
		$atts );
		if ($att['phone']) {
			if ($att['type'] == "font") {
				?>
				<div class="info-contact-font phone">
					<a href="tel:<?php echo $att['phone'];?>">
						<span class="icon phone"><i class="fa fa-phone" aria-hidden="true"></i></span>
						<span class="text"><?php echo $att['phone'];?></span>
					</a>
				</div>
				<?php
			}
			else {
				?>
				<div class="info-contact">
					<a href="tel:<?php echo $att['phone'];?>">
						<img src="<?php echo get_template_directory_uri();?>/../dist/images/icon-phone.png" alt="" />
						<strong><?php echo $att['phone'];?></strong>
					</a>
				</div>
				<?php
			}
		}
		else {
			_e('Wrong structure [thp_phone phone="phone_number"]', 'thpvn');
		}
		return ob_get_clean();
	}

	//[thp_phone]
	function emailData( $atts ) { 
		ob_start();
		$att = shortcode_atts( array(
			'email' => '',
			'type' => '',
			), 
		$atts );
		if ($att['email']) {
			if ($att['type'] == "font") {
				?>
				<div class="info-contact-font email">
					<a href="mailto:<?php echo $att['email'];?>">
						<span class="icon email"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
						<span class="text"><?php echo $att['email'];?></span>
					</a>
				</div>
				<?php
			}
			else {
				?>
				<div class="info-contact">
					<a href="mailto:<?php echo $att['email'];?>">
						<img src="<?php echo get_template_directory_uri();?>/../dist/images/icon-mail.png" alt="" />
						<strong><?php echo $att['email'];?></strong>
					</a>
				</div>
				<?php
			}
		}
		else {
			_e('Wrong structure [thp_email email="phone_number"]', 'thpvn');
		}
		return ob_get_clean();
	}
}