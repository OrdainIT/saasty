<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package saasty
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function saasty_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }
    if (function_exists('tutor')) {
        $user_name = sanitize_text_field(get_query_var('tutor_student_username'));
        $get_user = tutor_utils()->get_user_by_login($user_name);
    }

    if (!empty($get_user)) {
        $classes[] = 'profile-breadcrumb';
    }

    // Get the RTL option value from the Customizer
    $saasty_rtl = get_option('saasty_rtl', 'off');

    // Check if RTL is enabled
    if ($saasty_rtl === 'on') {
        // Add the 'saasty_rtl' class to the body classes
        $classes[] = 'saasty_rtl';
    }

    return $classes;

    return $classes;
}
add_filter('body_class', 'saasty_body_classes');






// Dynamic CSS Function

function saasty_theme_colors()
{
?>
    <style type="text/css">
        .it-shop-widget-checkbox ul li label::before {
            content: url('<?php echo esc_url(get_template_directory_uri(), 'saasty'); ?>/assets/img/inner/check.svg');
        }

        blockquote.wp-block-quote::before {
            content: "";
            background-image: url('http://localhost/saasty/wp-content/themes/saasty/assets/img/shape/quote.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: absolute;
            top: 8%;
            right: 5%;
            width: 160px;
            height: 160px;
            z-index: -1;
            opacity: .5;
        }

        :root {
            --it-theme-1: <?php echo esc_attr(get_theme_mod('saasty_theme_pcolor', '#1B4CC3')); ?>;
            --it-theme-2: <?php echo esc_attr(get_theme_mod('saasty_theme_scolor', '#FF8A71')); ?>;
            --it-theme-3: <?php echo esc_attr(get_theme_mod('saasty_secoundary_scolor', '#085442')); ?>;
            --it-theme-4: <?php echo esc_attr(get_theme_mod('saasty_secoundary_scolor1', '#1fe290')); ?>;
            --it-theme-5: <?php echo esc_attr(get_theme_mod('saasty_secoundary_scolor2', '#3b37f4')); ?>;
            --it-theme-6: <?php echo esc_attr(get_theme_mod('saasty_secoundary_scolor3', '#746fff')); ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'saasty_theme_colors');


function saasty_dynamic_font()
{
    $body_font_array = get_theme_mod('saasty_typography_setting');
    $saasty_typography_h1 = get_theme_mod('saasty_typography_h1');
    $saasty_typography_h2 = get_theme_mod('saasty_typography_h2');
    $saasty_typography_h3 = get_theme_mod('saasty_typography_h3');
    $saasty_typography_h4 = get_theme_mod('saasty_typography_h4');
    $saasty_typography_h5 = get_theme_mod('saasty_typography_h5');
    $saasty_typography_h6 = get_theme_mod('saasty_typography_h6');


    if (! empty($body_font_array)) {
        // Ensure that these keys exist, else provide default values
        $font_family   = isset($body_font_array['font-family']) ? esc_html($body_font_array['font-family']) : 'Plus Jakarta Sans';
        $font_weight   = isset($body_font_array['variant']) && $body_font_array['variant'] === 'regular' ? '400' : esc_html($body_font_array['variant']);
        $font_color    = isset($body_font_array['color']) ? esc_html($body_font_array['color']) : '#5F6168';
        $font_size     = isset($body_font_array['font-size']) ? esc_html($body_font_array['font-size']) : '16px';  // Provide default size
        $line_height   = isset($body_font_array['line-height']) ? esc_html($body_font_array['line-height']) : '1.2'; // Provide default line-height


        $body_font_css = sprintf(
            "body {
                font-family: '%s',Sans-serif; 
                font-weight: %s; 
                color: %s;
                font-size: %s;
                line-height: %s;
            }",
            $font_family,
            $font_weight,
            $font_color,
            $font_size,
            $line_height
        );

        // Output the CSS
        echo '<style>' . $body_font_css . '</style>';
    }

    if (! empty($saasty_typography_h1)) {

        // Ensure that these keys exist, else provide default values
        $font_family   = isset($saasty_typography_h1['font-family']) ? esc_html($saasty_typography_h1['font-family']) : 'Barlow Condensed';
        $font_weight   = isset($saasty_typography_h1['variant']) ? ($saasty_typography_h1['variant'] === 'regular' ? '400' : esc_html($saasty_typography_h1['variant'])) : '400'; // Default to '400' if 'variant' is not set
        $font_color    = isset($saasty_typography_h1['color']) ? esc_html($saasty_typography_h1['color']) : '#000511';
        $font_size     = isset($saasty_typography_h1['font-size']) ? esc_html($saasty_typography_h1['font-size']) : '40px';  // Provide default size
        $line_height   = isset($saasty_typography_h1['line-height']) ? esc_html($saasty_typography_h1['line-height']) : '1.2'; // Provide default line-height

        $H1_font_css = sprintf(
            "h1 {
                font-family: '%s', sans-serif; 
                font-weight: %s; 
                color: %s;
                font-size: %s;
                line-height: %s;
            }",
            $font_family,
            $font_weight,
            $font_color,
            $font_size,
            $line_height
        );

        // Output the CSS
        echo '<style>' . $H1_font_css . '</style>';
    }

    if (! empty($saasty_typography_h2)) {
        // Ensure that these keys exist, else provide default values
        $font_family   = isset($saasty_typography_h2['font-family']) ? esc_html($saasty_typography_h2['font-family']) : 'Barlow Condensed';
        $font_weight   = isset($saasty_typography_h2['variant']) && $saasty_typography_h2['variant'] === 'regular' ? '400' : esc_html($saasty_typography_h2['variant']);
        $font_color    = isset($saasty_typography_h2['color']) ? esc_html($saasty_typography_h2['color']) : '#000511';
        $font_size     = isset($saasty_typography_h2['font-size']) ? esc_html($saasty_typography_h2['font-size']) : '32px';  // Provide default size
        $line_height   = isset($saasty_typography_h2['line-height']) ? esc_html($saasty_typography_h2['line-height']) : '1.2'; // Provide default line-height

        $H2_font_css = sprintf(
            "h2 {
                font-family: '%s', sans-serif; 
                font-weight: %s; 
                color: %s;
                font-size: %s;
                line-height: %s;
            }",
            $font_family,
            $font_weight,
            $font_color,
            $font_size,
            $line_height
        );

        // Output the CSS
        echo '<style>' . $H2_font_css . '</style>';
    }

    if (! empty($saasty_typography_h3)) {
        // Ensure that these keys exist, else provide default values
        $font_family   = isset($saasty_typography_h3['font-family']) ? esc_html($saasty_typography_h3['font-family']) : 'Barlow Condensed';
        $font_weight   = isset($saasty_typography_h3['variant']) && $saasty_typography_h3['variant'] === 'regular' ? '400' : esc_html($saasty_typography_h3['variant']);
        $font_color    = isset($saasty_typography_h3['color']) ? esc_html($saasty_typography_h3['color']) : '#000511';
        $font_size     = isset($saasty_typography_h3['font-size']) ? esc_html($saasty_typography_h3['font-size']) : '28px';  // Provide default size
        $line_height   = isset($saasty_typography_h3['line-height']) ? esc_html($saasty_typography_h3['line-height']) : '1.2'; // Provide default line-height

        $H3_font_css = sprintf(
            "h3 {
                font-family: '%s', sans-serif; 
                font-weight: %s; 
                color: %s;
                font-size: %s;
                line-height: %s;
            }",
            $font_family,
            $font_weight,
            $font_color,
            $font_size,
            $line_height
        );

        // Output the CSS
        echo '<style>' . $H3_font_css . '</style>';
    }

    if (! empty($saasty_typography_h4)) {
        // Ensure that these keys exist, else provide default values
        $font_family   = isset($saasty_typography_h4['font-family']) ? esc_html($saasty_typography_h4['font-family']) : 'Barlow Condensed';
        $font_weight   = isset($saasty_typography_h4['variant']) && $saasty_typography_h4['variant'] === 'regular' ? '400' : esc_html($saasty_typography_h4['variant']);
        $font_color    = isset($saasty_typography_h4['color']) ? esc_html($saasty_typography_h4['color']) : '#000511';
        $font_size     = isset($saasty_typography_h4['font-size']) ? esc_html($saasty_typography_h4['font-size']) : '24px';  // Provide default size
        $line_height   = isset($saasty_typography_h4['line-height']) ? esc_html($saasty_typography_h4['line-height']) : '1.2'; // Provide default line-height

        $H4_font_css = sprintf(
            "h4 {
                font-family: '%s', sans-serif; 
                font-weight: %s; 
                color: %s;
                font-size: %s;
                line-height: %s;
            }",
            $font_family,
            $font_weight,
            $font_color,
            $font_size,
            $line_height
        );

        // Output the CSS
        echo '<style>' . $H4_font_css . '</style>';
    }

    if (! empty($saasty_typography_h5)) {
        // Ensure that these keys exist, else provide default values
        $font_family   = isset($saasty_typography_h5['font-family']) ? esc_html($saasty_typography_h5['font-family']) : 'Barlow Condensed';
        $font_weight   = isset($saasty_typography_h5['variant']) && $saasty_typography_h5['variant'] === 'regular' ? '400' : esc_html($saasty_typography_h5['variant']);
        $font_color    = isset($saasty_typography_h5['color']) ? esc_html($saasty_typography_h5['color']) : '#000511';
        $font_size     = isset($saasty_typography_h5['font-size']) ? esc_html($saasty_typography_h5['font-size']) : '23px';  // Provide default size
        $line_height   = isset($saasty_typography_h5['line-height']) ? esc_html($saasty_typography_h5['line-height']) : '1.2'; // Provide default line-height

        $H5_font_css = sprintf(
            "h5 {
                font-family: '%s', sans-serif; 
                font-weight: %s; 
                color: %s;
                font-size: %s;
                line-height: %s;
            }",
            $font_family,
            $font_weight,
            $font_color,
            $font_size,
            $line_height
        );

        // Output the CSS
        echo '<style>' . $H5_font_css . '</style>';
    }

    if (! empty($saasty_typography_h6)) {
        // Ensure that these keys exist, else provide default values
        $font_family   = isset($saasty_typography_h6['font-family']) ? esc_html($saasty_typography_h6['font-family']) : 'Barlow Condensed';
        $font_weight   = isset($saasty_typography_h6['variant']) && $saasty_typography_h6['variant'] === 'regular' ? '400' : esc_html($saasty_typography_h6['variant']);
        $font_color    = isset($saasty_typography_h6['color']) ? esc_html($saasty_typography_h6['color']) : '#000511';
        $font_size     = isset($saasty_typography_h6['font-size']) ? esc_html($saasty_typography_h6['font-size']) : '16px';  // Provide default size
        $line_height   = isset($saasty_typography_h6['line-height']) ? esc_html($saasty_typography_h6['line-height']) : '1.2'; // Provide default line-height

        $H6_font_css = sprintf(
            "h6 {
                font-family: '%s', sans-serif; 
                font-weight: %s; 
                color: %s;
                font-size: %s;
                line-height: %s;
            }",
            $font_family,
            $font_weight,
            $font_color,
            $font_size,
            $line_height
        );

        // Output the CSS
        echo '<style>' . $H6_font_css . '</style>';
    }
}
add_action('wp_head', 'saasty_dynamic_font');




/**
 * Get tags.
 */


function saasty_get_tag()
{
    $html = '';
    if (has_tag()) {
        $html .= '<div class="postbox-tag-content">';
        $html .= get_the_tag_list('', ' ', '');
        $html .= '</div>';
    }
    return $html;
}

function saasty_get_tag2()
{
    $html2 = '';
    if (has_tag()) {
        $html2 .= '<span class="it-blog-2-tag-title">';
        $html2 .= get_the_tag_list('', ' ', '');
        $html2 .= '</span>';
    }
    return $html2;
}





/**
 * Get categories.
 */
function saasty_get_category()
{

    $categories = get_the_category(get_the_ID());
    $x = 0;
    foreach ($categories as $category) {

        if ($x == 2) {
            break;
        }
        $x++;
        print '<a class="news-tag" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
    }
}

/** img alt-text **/
function saasty_img_alt_text($img_er_id = null)
{
    $image_id = $img_er_id;
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', false);
    $image_title = get_the_title($image_id);

    if (!empty($image_id)) {
        if ($image_alt) {
            $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', false);
        } else {
            $alt_text = get_the_title($image_id);
        }
    } else {
        $alt_text = esc_html__('Image Alt Text', 'saasty');
    }

    return $alt_text;
}

// saasty_ofer_sidebar_func
function saasty_offer_sidebar_func()
{
    if (is_active_sidebar('offer-sidebar')) {

        dynamic_sidebar('offer-sidebar');
    }
}
add_action('saasty_offer_sidebar', 'saasty_offer_sidebar_func', 20);

// saasty_service_sidebar
function saasty_service_sidebar_func()
{
    if (is_active_sidebar('services-sidebar')) {

        dynamic_sidebar('services-sidebar');
    }
}
add_action('saasty_service_sidebar', 'saasty_service_sidebar_func', 20);

// saasty_portfolio_sidebar
function saasty_portfolio_sidebar_func()
{
    if (is_active_sidebar('portfolio-sidebar')) {

        dynamic_sidebar('portfolio-sidebar');
    }
}
add_action('saasty_portfolio_sidebar', 'saasty_portfolio_sidebar_func', 20);

// saasty_faq_sidebar
function saasty_faq_sidebar_func()
{
    if (is_active_sidebar('faq-sidebar')) {

        dynamic_sidebar('faq-sidebar');
    }
}
add_action('saasty_faq_sidebar', 'saasty_faq_sidebar_func', 20);



// add Class in Menu Item

function add_class_to_last_four_menu_items($items, $args)
{
    // Convert menu items into an array
    $menu_items = wp_get_nav_menu_items($args->menu);

    // Count total number of menu items
    $total_items = count($menu_items);

    // Loop through the menu items
    foreach ($items as $key => $item) {
        // Add class to the last 4 items
        if ($key >= $total_items - 4) {
            $items[$key]->classes[] = 'last_menu_item';
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'add_class_to_last_four_menu_items', 10, 2);

// get All Contact Form


function od_get_contact_form_7()
{
    $choices = [];
    $forms = get_posts(array(
        'post_type'   => 'wpcf7_contact_form',
        'numberposts' => -1
    ));

    if ($forms) {
        foreach ($forms as $form) {
            $choices[$form->ID] = $form->post_title;
        }
    }

    return $choices;
}


function od_wpcf7_custom_submit_button($form)
{
    // Use regex to match the submit button, excluding the closing '/>'
    $form = preg_replace_callback(
        '/<input([^>]*)type="submit"([^>]*)value="([^"]*)".*?>/',
        function ($matches) {
            // Extract the dynamic button text from the value attribute
            $button_text = $matches[3];

            // Extract classes from the input field (if any)
            preg_match('/class="([^"]*)"/', $matches[0], $class_matches);
            $classes = isset($class_matches[1]) ? $class_matches[1] : '';

            // Add the default "it-btn" class
            $new_classes = trim($classes . ' ');

            // Return the custom button markup with dynamic text, class, and SVG icon
            return '<button type="submit" class="' . esc_attr($new_classes) . '">
                        ' . esc_html($button_text) . '
                        
                    </button>';
        },
        $form
    );

    return $form;
}

add_filter('wpcf7_form_elements', 'od_wpcf7_custom_submit_button');



// post View Count



// add menu class in widget menu
function saasty_class_to_widget_nav_menu_container($args, $instance)
{
    // Check if 'container_class' is already set, if not, set it as an empty string
    if (!isset($args['container_class'])) {
        $args['container_class'] = ''; // Initialize container_class if not set
    }

    // Append your custom class to the existing 'container_class'
    $args['container_class'] .= 'it-footer-widget-menu';

    return $args;
}
add_filter('widget_nav_menu_args', 'saasty_class_to_widget_nav_menu_container', 10, 2);
