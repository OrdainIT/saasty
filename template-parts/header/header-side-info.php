<?php 

   /**
    * Template part for displaying header side information
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package saasty
   */

    $side_info_title = get_theme_mod( 'side_info_title', __( 'Get In Touch', 'saasty' ) );
    $side_info_social_switcher = get_theme_mod( 'side_info_social_switcher', 'saasty' );
    $side_info_email = get_theme_mod( 'side_info_email', __( 'info@saasty.com', 'saasty' ) );
    $side_info_phone = get_theme_mod( 'side_info_phone', __( '(00)5611227890', 'saasty' ) );
    $side_info_location = get_theme_mod( 'side_info_location', __( '238, Arimantab, Moska - USA.', 'saasty' ) );
    $side_info_location_url = get_theme_mod( 'side_info_location_url', __( 'htits://www.google.com/maps/@37.4801311,22.8928877,3z', 'saasty' ) );
   $header_side_logo = get_theme_mod( 'header_side_logo', 'saasty' );
   $side_info_twitter_url = get_theme_mod( 'side_info_twitter_url', 'saasty' );
   $side_info_instagram_url = get_theme_mod( 'side_info_instagram_url', 'saasty' );
   $side_info_facebook_url = get_theme_mod( 'side_info_facebook_url', 'saasty' );
   $side_info_dribbble_url = get_theme_mod( 'side_info_dribbble_url', 'saasty' );

?>
  <!-- it-offcanvus-area-start -->
   <div class="it-offcanvas-area">
      <div class="itoffcanvas">
         <div class="it-offcanva-bottom-shape d-none d-xxl-block">
         </div>
         <div class="itoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="itoffcanvas__logo">
            <?php if (!empty($header_side_logo)): ?>
               <a href="<?php echo esc_url(home_url()); ?>">
                  <img src="<?php echo esc_url($header_side_logo); ?>" alt="Site Logo">
               </a>
            <?php else: ?>
               <?php saasty_header_logo(); ?>
            <?php endif; ?>
         </div>
         <div class="it-menu-mobile d-xl-none"></div>
         <div class="itoffcanvas__info">
            <h3 class="offcanva-title"><?php echo esc_html($side_info_title, 'saasty');?></h3>
            <?php if(!empty($side_info_email)):?>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-envelope"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span><?php echo esc_html__('Email', 'saasty');?></span>
                  <a href="maito:<?php echo esc_attr($side_info_email, 'saasty');?>"><?php echo esc_html($side_info_email, 'saasty');?></a>
               </div>
            </div>
         <?php endif;?>
         
         <?php if(!empty($side_info_phone)):?>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fal fa-phone-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span><?php echo esc_html__('Phone', 'saasty');?></span>
                  <a href="tel:(00)45611227890"><?php echo esc_html($side_info_phone, 'saasty');?></a>
               </div>
            </div>
         <?php endif;?>
         <?php if(!empty($side_info_location)): ?>
            <div class="it-info-wrapper mb-20 d-flex align-items-center">
               <div class="itoffcanvas__info-icon">
                  <a href="#"><i class="fas fa-map-marker-alt"></i></a>
               </div>
               <div class="itoffcanvas__info-address">
                  <span><?php echo esc_html__('Location', 'saasty');?></span>
                  <a href="<?php echo esc_attr($side_info_location_url);?>" target="_blank"><?php echo esc_html($side_info_location, 'saasty');?></a>
               </div>
            </div>
         <?php endif;?>
         </div>
         <?php if(!empty($side_info_social_switcher)):?>
         <div class="itoffcanvas__social">
            <div class="social-icon">
               <?php if(!empty($side_info_twitter_url)):?>
                  <a href="<?php echo esc_url($side_info_twitter_url, 'saasty');?>"><i class="fab fa-twitter"></i></a>
               <?php endif;?>
                <?php if(!empty($side_info_instagram_url)):?>
                  <a href="<?php echo esc_url($side_info_instagram_url, 'saasty');?>"><i class="fab fa-instagram"></i></a>
               <?php endif;?>
               <?php if(!empty($side_info_facebook_url)):?>
                  <a href="<?php echo esc_url($side_info_facebook_url, 'saasty');?>"><i class="fab fa-facebook-square"></i></a>
               <?php endif;?>
                <?php if(!empty($side_info_dribbble_url)):?>
                  <a href="<?php echo esc_url($side_info_dribbble_url, 'saasty');?>"><i class="fab fa-dribbble"></i></a>
                <?php endif;?>
            </div>
         </div>
         <?php endif;?>
      </div>
   </div>
   <div class="body-overlay"></div>
   <!-- it-offcanvus-area-end -->
