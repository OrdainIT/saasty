<?php

/**
 * Template part for displaying footer layout two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */
$saasty_footer_bg_image = get_theme_mod('saasty_footer_bg_image', '');
if (empty($saasty_footer_bg_image)) {
   $saasty_footer_bg_image = get_template_directory_uri() . '/assets/img/common/footer.png';
}




?>



<footer>
   <?php if (is_active_sidebar('footer-2-1') or is_active_sidebar('footer-2-2') or is_active_sidebar('footer-2-3') or is_active_sidebar('footer-2-4')): ?>
      <!-- footer-area-start -->
      <div class="it-footer-area it-footer-4 p-relative pt-120 pb-135 black-bg fix">
         <div class="it-footer-4-shape-1 d-none d-xxl-block">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/home-4/footer/map.png" alt="">
         </div>
         <div class="it-footer-shape-2">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/home-1/footer/right-tree.png" alt="">
         </div>
         <div class="container">
            <div class="row">
               <?php if (is_active_sidebar('footer-2-1')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6  wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".3s">
                     <?php dynamic_sidebar('footer-2-1'); ?>
                  </div>
               <?php endif; ?>
               <?php if (is_active_sidebar('footer-2-2')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6  wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".5s">
                     <?php dynamic_sidebar('footer-2-2'); ?>

                  </div>
               <?php endif; ?>
               <?php if (is_active_sidebar('footer-2-3')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6  wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".7s">
                     <?php dynamic_sidebar('footer-2-3'); ?>
                  </div>
               <?php endif; ?>
               <?php if (is_active_sidebar('footer-2-4')): ?>
                  <div class="col-xl-3 col-lg-4 col-md-6  wow itfadeUp" data-wow-duration=".9s"
                     data-wow-delay=".9s">

                     <?php dynamic_sidebar('footer-2-4'); ?>

                  </div>

               <?php endif; ?>
            </div>
         </div>
      </div>

      <!-- footer-area-end -->
   <?php endif; ?>

   <!-- copyright area start -->
   <div class="it-copyright-area it-copyright-style-4 z-index">
      <div class="container">
         <div class="it-copyright-wrap">
            <div class="row align-items-center">
               <div class="col-xl-6 col-lg-5  wow itfadeUp" data-wow-duration=".9s"
                  data-wow-delay=".3s">
                  <div class="it-copyright-text text-center text-lg-start">
                     <p><?php saasty_copyright_text(); ?></p>
                  </div>
               </div>
               <div class="col-xl-6 col-lg-7 d-none d-lg-block  wow itfadeUp" data-wow-duration=".9s"
                  data-wow-delay=".3s">
                  <div class="it-copyright-menu d-flex justify-content-lg-end">
                     <?php
                     wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'fallback_cb'    => false, // Prevent automatic menu display
                     ));
                     ?>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- copyright area end -->

</footer>