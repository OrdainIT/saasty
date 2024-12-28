<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */

// Header Top info
$header_top_switcher = get_theme_mod('header_top_switcher', false);
$header_top_phone_number = get_theme_mod('header_top_phone_number', __('(00)8757845682', 'saasty'));
$header_top_email_id = get_theme_mod('header_top_email_id', __('info@saasty.com', 'saasty'));
$header_top_Address = get_theme_mod('header_top_Address', __('Moon ave, New York, 2020 NY US.', 'saasty'));
$header_top_Address_url = get_theme_mod('header_top_Address_url', __('https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'saasty'));
$header_top_right_menu = get_theme_mod('header_top_right_menu');
$header_top_button2 = get_theme_mod('header_top_button2',  __('Help You', 'saasty'));
$header_top_button2_url = get_theme_mod('header_top_button2_url',  __('#', 'saasty'));
$header_top_ac_button = get_theme_mod('header_top_ac_button',  __('Login', 'saasty'));
$header_top_ac_button_url = get_theme_mod('header_top_ac_button_url',  __('#', 'saasty'));

//social Links
$header_social_switcher = get_theme_mod('header_social_switcher', false);
$header_social_facebook_url = get_theme_mod('header_social_facebook_url', __('#', 'saasty'));
$header_social_linkedin_url = get_theme_mod('header_social_linkedin_url', __('#', 'saasty'));
$header_social_instagram_url = get_theme_mod('header_social_instagram_url', __('#', 'saasty'));
$header_social_twitter_url = get_theme_mod('header_social_twitter_url', __('#', 'saasty'));
$header_top_slider = get_theme_mod('header_top_slider');

//Header Right info 

$header_right_switcher = get_theme_mod('header_right_switcher', false);
$header_right_btn_switcher = get_theme_mod('header_right_btn_switcher', true);
$header_right_btn_text = get_theme_mod('header_right_btn_text', __('Sign Up Now', 'saasty'));
$header_right_btn_url = get_theme_mod('header_right_btn_url', __('#', 'saasty'));



$header_right_remove_container = $header_right_switcher ? 'col-xxl-7 col-xl-7 d-none d-xl-block' : 'col-xxl-9 col-xl-10 d-none d-xl-block text-end';
$header_right__sidebarmenu = $header_right_switcher ? 'd-none  col-xxl-2 col-xl-3 col-6' : 'd-sm-block d-none d-xl-none col-xxl-2 col-xl-3 col-6';

$field_header_bg_color = function_exists('get_field') ? get_field('field_header_bg_color') : '';

?>


<header>
   <!-- header-area-start -->
   <div id="header-sticky" class="it-header-area it-header-border it-header-transparent p-relative it-header-ptb" style="background-color: <?php echo esc_attr($field_header_bg_color, 'saasty'); ?>">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xxl-3 col-xl-2 col-6">
               <div class="it-header-logo">
                  <?php saasty_header_logo(); ?>
               </div>
            </div>
            <div class="<?php echo esc_attr($header_right_remove_container, 'saasty'); ?>">
               <div class="it-header-menu it-dropdown-menu">
                  <nav class="it-menu-content">
                     <?php saasty_header_menu(); ?>
                  </nav>
               </div>
            </div>
            <?php if (!empty($header_right_switcher)): ?>
               <div class="col-xxl-2 col-xl-3 col-6">
                  <div class="it-header-right-action d-flex justify-content-end align-items-center">
                     <?php if (!empty($header_right_btn_switcher)): ?>
                        <a href=" <?php echo esc_url($header_right_btn_url, 'saasty'); ?>" class="it-btn d-none d-lg-block">
                           <?php echo esc_html($header_right_btn_text, 'saasty'); ?>
                        </a>
                     <?php endif; ?>
                     <div class="it-header-bar d-xl-none">
                        <button class="it-menu-bar">
                           <span>
                              <svg width="24" height="20" viewBox="0 0 24 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10 18.3333C10 17.4128 10.7462 16.6667 11.6667 16.6667H21.6667C22.5872 16.6667 23.3333 17.4128 23.3333 18.3333C23.3333 19.2538 22.5872 20 21.6667 20H11.6667C10.7462 20 10 19.2538 10 18.3333ZM0 1.66667C0 0.746183 0.746183 0 1.66667 0H21.6667C22.5872 0 23.3333 0.746183 23.3333 1.66667C23.3333 2.58713 22.5872 3.33333 21.6667 3.33333H1.66667C0.746183 3.33333 0 2.58713 0 1.66667ZM0 10C0 9.07953 0.746183 8.33333 1.66667 8.33333H21.6667C22.5872 8.33333 23.3333 9.07953 23.3333 10C23.3333 10.9205 22.5872 11.6667 21.6667 11.6667H1.66667C0.746183 11.6667 0 10.9205 0 10Z"
                                    fill="currentcolor" />
                              </svg>
                           </span>
                        </button>
                     </div>
                  </div>
               </div>
            <?php endif; ?>
            <div class="<?php echo esc_attr($header_right__sidebarmenu, 'saasty'); ?>">
               <div class="it-header-right-action d-flex justify-content-end align-items-center">
                  <div class="it-header-bar d-xl-none">
                     <button class="it-menu-bar">
                        <span>
                           <svg width="24" height="20" viewBox="0 0 24 20" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M10 18.3333C10 17.4128 10.7462 16.6667 11.6667 16.6667H21.6667C22.5872 16.6667 23.3333 17.4128 23.3333 18.3333C23.3333 19.2538 22.5872 20 21.6667 20H11.6667C10.7462 20 10 19.2538 10 18.3333ZM0 1.66667C0 0.746183 0.746183 0 1.66667 0H21.6667C22.5872 0 23.3333 0.746183 23.3333 1.66667C23.3333 2.58713 22.5872 3.33333 21.6667 3.33333H1.66667C0.746183 3.33333 0 2.58713 0 1.66667ZM0 10C0 9.07953 0.746183 8.33333 1.66667 8.33333H21.6667C22.5872 8.33333 23.3333 9.07953 23.3333 10C23.3333 10.9205 22.5872 11.6667 21.6667 11.6667H1.66667C0.746183 11.6667 0 10.9205 0 10Z"
                                 fill="currentcolor" />
                           </svg>
                        </span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- header-area-end -->

</header>













<?php get_template_part('template-parts/header/header-side-info'); ?>