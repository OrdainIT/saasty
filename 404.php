<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package saasty
 */

get_header();

$_image_404_setup = get_theme_mod('_image_404_setup', get_template_directory_uri() . '/assets/img/inner-page/error/thumb-1.png');
$saasty_error_link_text = get_theme_mod('saasty_error_link_text', __('Back to Home', 'saasty'));
$saasty_error_desc = get_theme_mod('saasty_error_desc', saasty_kses('<i>Lost in the fields? </i> Let us <br>  help you find your way back.', 'saasty'));
?>

<div class="it-error-area pt-120 pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="it-error-wrap">
               <div class="it-error-thumb text-center mb-50">
                  <img src="<?php echo esc_url($_image_404_setup); ?>" alt="">
               </div>
               <div class="it-error-content d-md-flex align-items-center justify-content-between">
                  <h4 class="it-error-title">
                     <?php echo saasty_kses($saasty_error_desc); ?>
                  </h4>
                  <a class="it-btn-primary" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html($saasty_error_link_text); ?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>





<?php
get_footer();
