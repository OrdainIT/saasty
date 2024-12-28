<?php

/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */
$footer__bottom_right_text = get_theme_mod('footer__bottom_right_text');
$saasty_footer_social_switcher = get_theme_mod('saasty_footer_social_switcher', false);
$saasty_footer_facebook_url = get_theme_mod('saasty_footer_facebook_url', esc_html__('#', 'saasty'));
$saasty_footer_instagram_url = get_theme_mod('saasty_footer_instagram_url', esc_html__('#', 'saasty'));
$saasty_footer_twitter_url = get_theme_mod('saasty_footer_twitter_url', esc_html__('#', 'saasty'));
$saasty_footer_youtube_url = get_theme_mod('saasty_footer_youtube_url', esc_html__('#', 'saasty'));


$select_footer_bg_image_acf = function_exists('get_field') ? get_field('select_footer_bg_image') : '';
$saasty_footer_1_bg_image = get_theme_mod('saasty_footer_1_bg_image', '');

// Check conditions in the desired priority order
if (!empty($select_footer_bg_image_acf)) {
   $footer_bg_image = $select_footer_bg_image_acf; // ACF image has the highest priority
} elseif (!empty($saasty_footer_1_bg_image)) {
   $footer_bg_image = $saasty_footer_1_bg_image; // Customizer image is second
} else {
   $footer_bg_image = get_template_directory_uri() . '/assets/img/shape/footer-bg-1-1.png'; // Default image
}


$saasty_footer_copywrite_wrap = $saasty_footer_social_switcher ? 'col-lg-6 col-md-7' : 'col-12 text-center';

$field_footer_padding_top = function_exists('get_field') ? get_field('field_footer_padding') : '';
$footer_margin_top = function_exists('get_field') ? get_field('footer_margin_top') : '';

?>





<footer>
   <!-- footer-area-start -->
   <div class="dt-footer-bg pg-footer-wrap section-bg z-index-1" data-background="<?php echo esc_url($footer_bg_image, 'saasty'); ?>" style="margin-top: <?php echo esc_attr($footer_margin_top, 'saasty'); ?>; padding-top: <?php echo esc_attr($field_footer_padding_top, 'saasty'); ?>;">
      <?php if (is_active_sidebar('footer-2-1') or is_active_sidebar('footer-2-2') or is_active_sidebar('footer-2-3') or is_active_sidebar('footer-2-4')): ?>
         <div class="it-footer-area mb-65">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-50 wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".3s">
                     <?php dynamic_sidebar('footer-2-1'); ?>


                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-50 wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".5s">
                     <?php dynamic_sidebar('footer-2-2'); ?>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-50 wow itfadeUp" data-wow-duration=".7s"
                     data-wow-delay=".5s">
                     <?php dynamic_sidebar('footer-2-3'); ?>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 mb-50 wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".9s">
                     <?php dynamic_sidebar('footer-2-4'); ?>

                  </div>
               </div>
            </div>
         </div>
      <?php endif; ?>
      <div class="it-copyright-area pg-copyright-wrap">
         <div class="container">
            <div class="row align-items-center">
               <div class="<?php echo esc_attr($saasty_footer_copywrite_wrap, 'saasty'); ?>">
                  <div class="it-copyright-left text-center text-md-start wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".3s">
                     <p class="mb-0"><?php saasty_copyright_text(); ?></p>
                  </div>
               </div>
               <?php if (!empty($saasty_footer_social_switcher)): ?>
                  <div class="col-lg-6 col-md-5">
                     <div class="it-copyright-right text-center text-md-end wow itfadeUp" data-wow-duration=".9s"
                        data-wow-delay=".3s">
                        <div class="it-copyright-social">
                           <span><?php echo esc_html($footer__bottom_right_text, 'saasty'); ?></span>
                           <?php if (!empty($saasty_footer_facebook_url)): ?>
                              <a href="<?php echo esc_url($saasty_footer_facebook_url, 'saasty'); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                           <?php endif; ?>
                           <?php if (!empty($saasty_footer_twitter_url)): ?>
                              <a href="<?php echo esc_url($saasty_footer_twitter_url, 'saasty'); ?>"><i class="fa-brands fa-twitter"></i></a>
                           <?php endif; ?>
                           <?php if (!empty($saasty_footer_instagram_url)): ?>
                              <a href="<?php echo esc_url($saasty_footer_instagram_url, 'saasty'); ?>"><i class="fa-brands fa-instagram"></i></a>
                           <?php endif; ?>
                           <?php if (!empty($saasty_footer_youtube_url)): ?>
                              <a href="<?php echo esc_url($saasty_footer_youtube_url, 'saasty'); ?>"><i class="fa-brands fa-youtube"></i></a>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>

   </div>
   <!-- footer-area-end -->
</footer>