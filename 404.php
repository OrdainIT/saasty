<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package saasty
 */

get_header();

$_image_404_setup = get_theme_mod('_image_404_setup', get_template_directory_uri() . '/assets/img/error/error.png');
$saasty_error_link_text = get_theme_mod('saasty_error_link_text', __('Back to Home', 'saasty'));
$saasty_error_desc = get_theme_mod('saasty_error_desc', saasty_kses('Oops! The page you are looking for does not exist. It might have <br> been moved or deleted. Please check and try again.

', 'saasty'));
$saasty_error_title = get_theme_mod('saasty_error_title', saasty_kses('Oops! That page can’t be found.', 'saasty'));
?>

<div class="it-error-area pt-120 pb-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xxl-12 col-xl-7 col-lg-7 col-md-9">
            <div class="it-error-thumb text-center mb-80">
               <img src="<?php echo esc_url($_image_404_setup); ?>" alt="">
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="it-error-content text-center">
               <h5 class="it-section-title mb-25"><?php echo saasty_kses($saasty_error_title, 'saasty'); ?></h5>
               <p class="mb-35"><?php echo saasty_kses($saasty_error_desc, 'saasty'); ?></p>
               <div class="it-fade-anim" data-fade-from="top" data-ease="bounce" data-delay=".5">
                  <a class="it-btn" href="<?php echo esc_url(home_url()); ?>">
                     <?php echo esc_html($saasty_error_link_text); ?>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>





<?php
get_footer();
