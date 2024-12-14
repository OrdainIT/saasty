<?php

/**
 * saasty_scripts description
 * @return [type] [description]
 */
function saasty_scripts()
{

    /**
     * all css files
     */




    wp_enqueue_style('saasty-fonts', saasty_fonts_url(), array(), time());
    // Enqueue normal styles
    wp_enqueue_style('bootstrap', saasty_THEME_CSS_DIR . 'bootstrap.min.css', array());

    wp_enqueue_style('animate', saasty_THEME_CSS_DIR . 'animate.css', []);
    wp_enqueue_style('nice-select', saasty_THEME_CSS_DIR . 'nice-select.css', []);
    wp_enqueue_style('swiper-bundle', saasty_THEME_CSS_DIR . 'swiper-bundle.css', []);
    wp_enqueue_style('font-awesome-pro', saasty_THEME_CSS_DIR . 'font-awesome-pro.css', []);
    wp_enqueue_style('magnific-popup', saasty_THEME_CSS_DIR . 'magnific-popup.css', []);
    wp_enqueue_style('spacing', saasty_THEME_CSS_DIR . 'spacing.css', []);
    wp_enqueue_style('theme-core', saasty_THEME_CSS_DIR . 'main.css', [], time());
    wp_enqueue_style('theme-unit', saasty_THEME_CSS_DIR . 'theme-unit.css', [], time());
    wp_enqueue_style('theme-custom', saasty_THEME_CSS_DIR . 'theme-custom.css', []);
    wp_enqueue_style('theme-style', get_stylesheet_uri());





    // all js
    wp_enqueue_script('bootstrap-bundle', saasty_THEME_JS_DIR . 'bootstrap.bundle.min.js', ['jquery'], '', true);
    wp_enqueue_script('ordainit', saasty_THEME_JS_DIR . 'ordain-it.js', ['jquery'], '', true);
    wp_enqueue_script('three', saasty_THEME_JS_DIR . 'three.js', ['jquery'], '', true);
    wp_enqueue_script('hover-img-effect', saasty_THEME_JS_DIR . 'hover-img-effect.js', ['jquery'], '', true);
    wp_enqueue_script('magnific-popup', saasty_THEME_JS_DIR . 'magnific-popup.js', ['jquery'], '', true);
    wp_enqueue_script('purecounter', saasty_THEME_JS_DIR . 'purecounter.js', ['jquery'], '', true);
    wp_enqueue_script('nice-select', saasty_THEME_JS_DIR . 'nice-select.js', ['jquery'], '', true);
    wp_enqueue_script('swiper-bundle', saasty_THEME_JS_DIR . 'swiper-bundle.js', ['jquery'], '', true);
    wp_enqueue_script('isotope-pkgd', saasty_THEME_JS_DIR . 'isotope-pkgd.js', ['imagesloaded'], false, true);
    wp_enqueue_script('slider', saasty_THEME_JS_DIR . 'slider.js', ['jquery'], '', true);
    wp_enqueue_script('cursor', saasty_THEME_JS_DIR . 'cursor.js', ['jquery'], '', true);
    wp_enqueue_script('saasty-main', saasty_THEME_JS_DIR . 'main.js', ['jquery'], time(), true);






    wp_enqueue_script('cart-ajax', get_template_directory_uri() . '/inc/js/cart-ajax.js', array('jquery'), null, true);

    // Localize script to pass the AJAX URL
    wp_localize_script('cart-ajax', 'cart_ajax_obj', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));






    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'saasty_scripts');

function saasty_enqueue_admin_script()
{

    wp_enqueue_style('saasty-admin', saasty_THEME_CSS_DIR . 'admin.css', [], time());
    // Enqueue the admin.js script only in the admin area
    wp_enqueue_script('saasty-admin', saasty_THEME_JS_DIR . 'admin.js', ['jquery'], '', true);
}
add_action('admin_enqueue_scripts', 'saasty_enqueue_admin_script');


/*
Register Fonts
 */
function saasty_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'saasty')) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Outfit:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet';
    }
    return $font_url;
}
