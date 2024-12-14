<?php

/**
 * Breadcrumbs for saasty theme.
 *
 * @package     saasty
 * @author      Ordainit
 * @copyright   Copyright (c) 2024, Ordainit
 * @link        https://ordainit.com
 * @since       saasty 1.0.0
 */

function saasty_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    // Breadcrumb title logic
    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'saasty'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'saasty'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_the_title(); // Get the product title dynamically
    } elseif (is_single() && 'courses' == get_post_type()) {
        $title = esc_html__('Course Details', 'saasty');
    } elseif (is_post_type_archive('courses')) {
        $title = esc_html__('Courses', 'saasty');
    } elseif (is_post_type_archive('tour-package')) {
        $title = esc_html__('Tour', 'saasty');
    } elseif (is_post_type_archive('events')) {
        $title = esc_html__('Events', 'saasty');
    } elseif (function_exists('is_product_category') && is_product_category()) {
        $title = single_term_title('', false); // Get the product category name
    } elseif (function_exists('is_product_tag') && is_product_tag()) {
        $title = single_term_title('', false); // Get the product tag name
    } elseif (is_search()) {
        $title = esc_html__('Search Results for: ', 'saasty') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'saasty');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        if (is_shop()) {
            $title = get_theme_mod('breadcrumb_shop', __('Shop', 'saasty'));
        }
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }

    // Get post/page/shop ID for breadcrumb custom field checks
    $_id = get_the_ID();
    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") && is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    // Check if breadcrumb is hidden using custom fields
    $is_breadcrumb = function_exists('get_field') ? get_field('hide_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null; // Show breadcrumb if it's a search
    }

    // Only show breadcrumb if not hidden
    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {
        // Get background image
        $bg_img_from_page = function_exists('get_field') ? get_field('breadcrumb_bg', $_id) : '';
        $hide_bg_img = function_exists('get_field') ? get_field('hide_bg_image', $_id) : '';

        // Theme options
        $bg_img = get_theme_mod('breadcrumb_image');
        $breadcrumb_switcher = get_theme_mod('breadcrumb_switcher', true);

        // Check to hide or show background image
        if ($hide_bg_img && empty($_GET['s'])) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        }


        // Output breadcrumb HTML if the switcher is on
        if (!empty($breadcrumb_switcher)) { ?>

            <div class="it-breadcrumb-area it-breadcrumb-bg" data-background="<?php echo esc_url($bg_img); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="it-breadcrumb-content">
                                <div class="it-breadcrumb-title-box">
                                    <h3 class="it-breadcrumb-title"><?php echo esc_html($title); ?></h3>
                                </div>
                                <div class="it-breadcrumb-list-wrap text-center">
                                    <div class="it-breadcrumb-list-content">
                                        <span><a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html__('Home', 'saasty'); ?></a></span>
                                        <span class="dvdr"><?php echo esc_html__('//', 'saasty'); ?></span>
                                        <span><?php echo esc_html($title); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php }
    }
}

add_action('saasty_before_main_content', 'saasty_breadcrumb_func');
