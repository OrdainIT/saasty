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

        :root {
            --it-theme-1: <?php echo esc_attr(get_theme_mod('saasty_theme_pcolor', '#1B4CC3')); ?>;
            --it-theme-2: <?php echo esc_attr(get_theme_mod('saasty_theme_scolor', '#FF8A71')); ?>;
            --it-theme-3: <?php echo esc_attr(get_theme_mod('saasty_secoundary_scolor', '#EF5D3C')); ?>;
            --it-theme-3: <?php echo esc_attr(get_theme_mod('saasty_secoundary_scolor1', '#E22D03')); ?>;
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
        $font_color    = isset($body_font_array['color']) ? esc_html($body_font_array['color']) : '#686868';
        $font_size     = isset($body_font_array['font-size']) ? esc_html($body_font_array['font-size']) : '16px';  // Provide default size
        $line_height   = isset($body_font_array['line-height']) ? esc_html($body_font_array['line-height']) : '1.3'; // Provide default line-height


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


// Load Cart Content

// AJAX handler to remove item from cart
add_action('wp_ajax_woocommerce_remove_cart_item', 'remove_cart_item_from_woocommerce');
add_action('wp_ajax_nopriv_woocommerce_remove_cart_item', 'remove_cart_item_from_woocommerce');

function remove_cart_item_from_woocommerce()
{
    // Check if cart item key is set
    if (isset($_POST['cart_item_key'])) {
        $cart_item_key = sanitize_text_field($_POST['cart_item_key']);

        // Remove the item from the cart
        WC()->cart->remove_cart_item($cart_item_key);

        // Send success response
        wp_send_json_success('Item removed from cart');
    } else {
        // Send error response if key is not set
        wp_send_json_error('Cart item key missing.');
    }

    wp_die(); // Always use wp_die() at the end of an AJAX function
}

add_action('wp_ajax_load_cart_contents', 'load_cart_contents');
add_action('wp_ajax_nopriv_load_cart_contents', 'load_cart_contents');

function load_cart_contents()
{
    // Start output buffering
    ob_start();

    // Get cart items
    $cart = WC()->cart->get_cart();

    if ($cart) {
        foreach ($cart as $cart_item_key => $cart_item) {
            $_product = $cart_item['data'];
            $product_name = $_product->get_name();
            $product_price = WC()->cart->get_product_price($_product);
            $product_url = esc_url(get_permalink($cart_item['product_id']));
            $product_img = esc_url(wp_get_attachment_image_src(get_post_thumbnail_id($cart_item['product_id']), 'thumbnail')[0]);
            $product_subtotal = WC()->cart->get_product_subtotal($_product, $cart_item['quantity']);
            $short_title = wp_trim_words($product_name, 3); // Shorten product name

            echo '<div class="cart-content-wrap d-flex align-items-center justify-content-between">';
            echo '<div class="cart-img-info d-flex align-items-center">';
            echo '<div class="cart-thumb"><a href="' . $product_url . '"><img src="' . $product_img . '" alt="' . esc_attr($product_name) . '"></a></div>';
            echo '<div class="cart-content">';
            echo '<h5 class="cart-title"><a href="' . $product_url . '">' . esc_html($short_title) . '</a></h5>';
            echo '<span>' . $product_price . ' <del>' . $product_subtotal . '</del></span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="cart-del-icon"><span><i class="fa-light fa-trash-can" onclick="remove_cart_item(\'' . esc_js($cart_item_key) . '\')"></i></span></div>';
            echo '</div>';
        }

        // Display total
        echo '<div class="cart-total-price d-flex align-items-center justify-content-between">';
        echo '<span>' . esc_html__('Total:', 'saasty') . '</span>';
        echo '<span>' . WC()->cart->get_cart_total() . '</span>';
        echo '</div>';

        // Display buttons
        echo '<div class="cart-btn">';
        echo '<a class="it-btn-theme w-100 d-flex justify-content-center mb-10" href="' . wc_get_cart_url() . '">';
        echo '<span class="btn-wrap"><span class="text-one">' . esc_html__('Shopping Cart', 'saasty') . '</span><span class="text-two">' . esc_html__('Shopping Cart', 'saasty') . '</span></span>';
        echo '</a>';
        echo '<a class="it-btn-theme black-bg d-flex justify-content-center w-100" href="' . wc_get_checkout_url() . '">';
        echo '<span class="btn-wrap"><span class="text-one">' . esc_html__('Checkout', 'saasty') . '</span><span class="text-two">' . esc_html__('Checkout', 'saasty') . '</span></span>';
        echo '</a>';
        echo '</div>';
    } else {
        echo '<p>' . esc_html__('Your cart is empty.', 'saasty') . '</p>';
    }

    // Get the buffered content
    $cart_html = ob_get_clean();

    // Return the HTML as JSON
    wp_send_json(array(
        'safe_html' => $cart_html
    ));

    wp_die();
}



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


// Function to track and update post views
function set_post_view_count($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Function to get the view count
function get_post_view_count($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        return '0 views';
    }
    return $count . ' views';
}

// Remove post views from caching for accurate counts
function exclude_post_views_from_cache($should_cache, $block)
{
    if ($block['post_id']) {
        set_post_view_count($block['post_id']);
    }
    return $should_cache;
}
add_filter('should_cache_request', 'exclude_post_views_from_cache', 10, 2);

// Call this function on single post views to count the views
function track_post_views($post_id)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_view_count($post_id);
}
add_action('wp_head', 'track_post_views');



// Custom Add to Cart Button Function
add_filter('woocommerce_loop_add_to_cart_link', 'custom_add_to_cart_and_view_cart_button', 10, 2);
function custom_add_to_cart_and_view_cart_button($button, $product)
{
    // Get product details
    $product_id = $product->get_id();
    $product_url = esc_url($product->add_to_cart_url());
    $button_text = esc_html($product->add_to_cart_text());
    $view_cart_url = wc_get_cart_url(); // Get the view cart URL


    // Customize the button HTML for Add to Cart and View Cart
    $custom_button = '
   
     <a href="' . $product_url . '" 
        data-product_id="' . $product_id . '" 
        data-quantity="1"
        class="it-btn orange-bg add_to_cart_button ajax_add_to_cart product_type_' . $product->get_type() . '">
            <span class="btn-wrap">
                ' . $button_text . '
            </span>
    </a>';

    return $custom_button;
}



// Custom Discount Function

add_action('woocommerce_before_shop_loop_item_title', 'custom_show_discount_badge', 10);
function custom_show_discount_badge()
{
    global $product;

    // Ensure it's a simple product or variable product
    if ($product->is_type('simple') || $product->is_type('variable')) {
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();

        if ($regular_price && $sale_price && $sale_price < $regular_price) {
            // Calculate the percentage discount
            $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);

            // Output the discount badge HTML
            echo '<div class="it-shop-badge theme">
                    <span>-' . $discount_percentage . '%</span>
                  </div>';
        }
    }
}

// Woocommerce Price Template Filter Hook

add_filter('woocommerce_get_price_html', 'custom_product_price_markup', 100, 2);
function custom_product_price_markup($price, $product)
{
    // Get the regular price and sale price
    $regular_price = $product->get_regular_price();
    $sale_price = $product->get_sale_price();

    // Check if the product is on sale
    if ($product->is_on_sale() && !empty($sale_price)) {
        // Format the prices
        $price = '<span class="it-shop-ammount">' . wc_price($sale_price) . ' <del>' . wc_price($regular_price) . '</del></span>';
    } else {
        // If not on sale, show the regular price
        $price = '<span class="it-shop-ammount">' . wc_price($regular_price) . '</span>';
    }

    return $price;
}

// Custom Input Markup For Woocommerce

// Remove the default Add to Cart button for variable products
function remove_default_variable_add_to_cart_button()
{
    global $product;
    if ($product && $product->is_type('variable')) {
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    }
}
add_action('woocommerce_before_single_product', 'remove_default_variable_add_to_cart_button');

// Add custom quantity input and Add to Cart button for variable products
function od_quantity_input_field_and_button1()
{
    global $product;

    if ($product && $product->is_type('variable')) {
    ?>
        <div class="it-product-details-action-item-wrapper d-flex align-items-center">
            <div class="it-product-details-quantity">
                <div class="it-shop-details__quantity mb-15">
                    <div class="cart-minus"><i class="fal fa-minus"></i></div>
                    <input type="number" id="custom-quantity-input" value="1" min="1">
                    <div class="cart-plus"><i class="fal fa-plus"></i></div>
                    <input type="hidden" name="quantity" id="hidden-quantity-input" value="1">
                </div>
            </div>
            <div class="it-shop-details__btn ml-30 mb-15 w-100">
                <a class="it-btn orange-2-btn d-flex justify-content-center" href="#" id="add-to-cart-btn" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
                    <?php echo esc_html__('Add To Cart', 'saasty'); ?>
                </a>
            </div>
        </div>
    <?php
    }
}
add_action('woocommerce_single_product_summary', 'od_quantity_input_field_and_button1', 30);

function od_quantity_input_field_and_button()
{
    global $product;
    ?>
    <div class="it-product-details-action-item-wrapper d-flex align-items-center">

        <div class="it-product-details-quantity">
            <div class="it-shop-details__quantity mb-15">
                <div class="cart-minus"><i class="fal fa-minus"></i></div>
                <input type="number" id="custom-quantity-input" value="1" min="1">
                <div class="cart-plus"><i class="fal fa-plus"></i></div>
                <input type="hidden" name="quantity" id="hidden-quantity-input" value="1">
            </div>
        </div>
        <div class="it-shop-details__btn ml-30 mb-15 w-100">
            <a class="it-btn orange-2-btn  d-flex justify-content-center" href="#" id="add-to-cart-btn" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
                <?php echo esc_html__('Add To Cart', 'saasty'); ?>
            </a>
        </div>
    </div>
<?php
}

add_action('woocommerce_before_add_to_cart_button', 'od_quantity_input_field_and_button', 20);







add_action('wp_ajax_woocommerce_add_to_cart', 'custom_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_add_to_cart', 'custom_ajax_add_to_cart');

function custom_ajax_add_to_cart()
{
    if (! isset($_POST['product_id']) || ! isset($_POST['quantity'])) {
        wp_send_json_error(array('error_message' => 'Invalid request.'));
    }

    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    $cart = WC()->cart;
    $cart->add_to_cart($product_id, $quantity);

    wp_send_json_success();
}




// Remove Default Cart totals

function remove_default_cart_totals()
{
    remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10);
}
add_action('wp_loaded', 'remove_default_cart_totals');


// Proceed to cart page

function od_cart_totals_html()
{
?>
    <div class="cart-page-total cart_totals ">
        <h2><?php echo esc_html__('Cart totals', 'saasty'); ?></h2>
        <ul class="mb-20">
            <li><?php echo esc_html__('Subtotal', 'saasty'); ?> <span><?php echo WC()->cart->get_cart_subtotal(); ?></span></li>
            <li><?php echo esc_html__('Total', 'saasty'); ?> <span><?php echo WC()->cart->get_total(); ?></span></li>
        </ul>
        <a class="it-btn orange-bg" href="<?php echo wc_get_checkout_url(); ?>">
            <?php echo esc_html__('Proceed to checkout', 'saasty'); ?>
        </a>
    </div>
<?php
}

add_action('od_cart_totals_section', 'od_cart_totals_html');


// Remove the default place order button
add_action('woocommerce_checkout_before_order_review', 'remove_default_place_order_button');
function remove_default_place_order_button()
{
    remove_action('woocommerce_review_order_after_submit', 'woocommerce_order_button', 20);
}

// Add custom place order button markup
add_action('woocommerce_review_order_after_submit', 'od_custom_place_order_button', 20);
function od_custom_place_order_button()
{
?>
    <div class="order-button-payment mt-20">
        <button class="it-btn orange-bg d-flex justify-content-center align-items-center" type="submit" id="place_order">
            <?php esc_html_e('Place order', 'saasty'); ?>
        </button>
    </div>

<?php
}


add_action('wp_ajax_od_filter_products', 'od_filter_products');
add_action('wp_ajax_nopriv_od_filter_products', 'od_filter_products');

// Default Shortcode Generate Functions for Woocomerce



function od_filter_products()
{
    $on_sale = isset($_POST['on_sale']) ? intval($_POST['on_sale']) : 0;
    $in_stock = isset($_POST['in_stock']) ? intval($_POST['in_stock']) : 0;

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => array(),
    );

    if ($on_sale) {
        $args['meta_query'][] = array(
            'key' => '_sale_price',
            'value' => 0,
            'compare' => '>',
            'type' => 'NUMERIC'
        );
    }

    if ($in_stock) {
        $args['meta_query'][] = array(
            'key' => '_stock_status',
            'value' => 'instock'
        );
    }

    $query = new WP_Query($args);

    $response = array(
        'success' => false,
        'html' => '',
    );

    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
        $response['html'] = ob_get_clean();
        $response['success'] = true;
    } else {
        $response['html'] = esc_html__('No products found.', 'saasty');
    }

    wp_reset_postdata();
    wp_send_json($response); // Send the JSON response
}






add_filter('widget_text', 'do_shortcode');


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
