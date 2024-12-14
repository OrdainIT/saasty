<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */

$footer_bg_img = get_theme_mod('saasty_footer_bg_image');
$footer__text2 = get_theme_mod('footer__text2');
$saasty_footer_bg_url_from_page = function_exists('get_field') ? get_field('saasty_footer_bg') : '';
$saasty_footer_bg_color_from_page = function_exists('get_field') ? get_field('saasty_footer_bg_color') : '';
$saasty_footer_social_switcher = get_theme_mod('saasty_footer_social_switcher', false);
$saasty_footer_facebook_url = get_theme_mod('saasty_footer_facebook_url', esc_html__('#', 'saasty'));
$saasty_footer_pinterest_url = get_theme_mod('saasty_footer_pinterest_url', esc_html__('#', 'saasty'));
$saasty_footer_linkedin_url = get_theme_mod('saasty_footer_linkedin_url', esc_html__('#', 'saasty'));
$saasty_footer_youtube_url = get_theme_mod('saasty_footer_youtube_url', esc_html__('#', 'saasty'));


$saasty_footer_bg_image = get_theme_mod('saasty_footer_bg_image', '');
if (empty($saasty_footer_bg_image)) {
   $saasty_footer_bg_image = get_template_directory_uri() . '/assets/img/common/footer.png';
}






?>

<footer>
   <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')): ?>
      <!-- footer-area-start -->
      <div class="it-footer-area p-relative pt-120 pb-135 black-bg fix">
         <div class="it-footer-shape-1">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/home-1/footer/left-tree.png" alt="">
         </div>
         <div class="it-footer-shape-2">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/home-1/footer/right-tree.png" alt="">
         </div>
         <div class="container">
            <div class="row">
               <?php if (is_active_sidebar('footer-1')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                     <?php dynamic_sidebar('footer-1'); ?>
                  </div>
               <?php endif; ?>
               <?php if (is_active_sidebar('footer-2')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                     <?php dynamic_sidebar('footer-2'); ?>
                  </div>
               <?php endif; ?>

               <?php if (is_active_sidebar('footer-3')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                     <?php dynamic_sidebar('footer-3'); ?>
                  </div>
               <?php endif; ?>
               <?php if (is_active_sidebar('footer-4')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                     <?php dynamic_sidebar('footer-4'); ?>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>

      <!-- footer-area-end -->

   <?php endif; ?>

   <!-- copyright area start -->
   <div class="it-copyright-area z-index">
      <div class="container">
         <div class="it-copyright-wrap">
            <div class="row align-items-center">
               <div class="col-xl-6 col-lg-6 wow itfadeUp" data-wow-duration=".9s"
                  data-wow-delay=".3s">
                  <div class="it-copyright-text text-center text-lg-start">
                     <p><?php saasty_copyright_text(); ?></p>
                  </div>
               </div>
               <?php if (!empty($footer__text2)): ?>
                  <div class="col-xl-6 col-lg-6 d-none d-lg-block wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".3s">
                     <div class="it-copyright-privacy">
                        <?php echo saasty_kses($footer__text2, 'saasty'); ?>
                     </div>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>

   <!-- copyright area end -->

</footer>