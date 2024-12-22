<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package saasty
 */



// saasty_search_form
//Popup Search bar Functions

function saasty_search_form()
{
    $header_right_search_logo = get_theme_mod('header_right_search_logo');
?>

    <!-- search popup start -->
    <div class="search__popup">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="search__wrapper">
                        <div class="search__top d-flex justify-content-between align-items-center">
                            <div class="search__logo">
                                <?php if (!empty($header_right_search_logo)): ?>
                                    <a href="<?php echo esc_url(home_url()); ?>">
                                        <img src="<?php echo esc_url($header_right_search_logo); ?>" alt="<?php echo esc_attr__('logo', 'saasty'); ?>">
                                    </a>
                                <?php else: ?>
                                    <?php saasty_header_logo(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="search__close">
                                <button type="button" class="search__close-btn search-close-btn">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="search__form">
                            <form method="get" action="<?php print esc_url(home_url('/')) ?>">
                                <div class="search__input">
                                    <input class="search-input-field" type="text" name="s" placeholder="<?php echo esc_attr__('Type here to search...', 'saasty'); ?>" value="<?php print esc_attr(get_search_query()); ?>">
                                    <span class="search-focus-border"></span>
                                    <button type="submit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search popup end -->


<?php

}
add_action('search_form_show', 'saasty_search_form');


/** 
 *
 * saasty header
 */

function saasty_check_header()
{
    $saasty_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
    $saasty_default_header_style = get_theme_mod('saasty_header_style', 'header-style-11');

    if ($saasty_header_style == 'header-style-11' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-1');
    } elseif ($saasty_header_style == 'header-style-22' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-2');
    } elseif ($saasty_header_style == 'header-style-33' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-3');
    } elseif ($saasty_header_style == 'header-style-44' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-4');
    } elseif ($saasty_header_style == 'header-style-55' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-5');
    } elseif ($saasty_header_style == 'header-style-66' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-6');
    } elseif ($saasty_header_style == 'header-style-77' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-7');
    } elseif ($saasty_header_style == 'header-style-88' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-8');
    } elseif ($saasty_header_style == 'header-style-99' && empty($_GET['s'])) {
        get_template_part('template-parts/header/header-9');
    } else {

        /** default header style **/
        if ($saasty_default_header_style == 'header-style-22') {
            get_template_part('template-parts/header/header-2');
        } elseif ($saasty_default_header_style == 'header-style-33') {
            get_template_part('template-parts/header/header-3');
        } elseif ($saasty_default_header_style == 'header-style-44') {
            get_template_part('template-parts/header/header-4');
        } elseif ($saasty_default_header_style == 'header-style-55') {
            get_template_part('template-parts/header/header-5');
        } elseif ($saasty_default_header_style == 'header-style-66') {
            get_template_part('template-parts/header/header-6');
        } elseif ($saasty_default_header_style == 'header-style-77') {
            get_template_part('template-parts/header/header-7');
        } elseif ($saasty_default_header_style == 'header-style-88') {
            get_template_part('template-parts/header/header-8');
        } elseif ($saasty_default_header_style == 'header-style-99') {
            get_template_part('template-parts/header/header-9');
        } else {
            get_template_part('template-parts/header/header-1');
        }
    }
}
add_action('saasty_header_style', 'saasty_check_header', 10);




function add_header_four_body_class($classes)
{
    // Check if the current header version is 'header-four'
    // This check can be based on how you determine which header is active
    // For example, if you use a theme option or customizer setting:
    $saasty_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
    $saasty_default_header_style = get_theme_mod('saasty_header_style', 'header-style-11');; // Adjust this to match your implementation

    if ($saasty_default_header_style === 'header-style-44') {
        $classes[] = 'header_four_active'; // Add your custom class
    }

    return $classes;
}
add_filter('body_class', 'add_header_four_body_class');












// header logo
function saasty_header_logo()
{ ?>
    <?php
    $saasty_logo_on = function_exists('get_field') ? get_field('header_logo_page') : NULL;
    $saasty_logo = get_template_directory_uri() . '/assets/img/logo/logo-1.png';

    $saasty_site_logo = get_theme_mod('header_logo', $saasty_logo);
    ?>

    <?php if (!empty($saasty_logo_on)) : ?>
        <a href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($saasty_logo_on['url']); ?>" alt="<?php print esc_attr__('logo', 'saasty'); ?>" />
        </a>
    <?php else : ?>
        <a href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($saasty_site_logo); ?>" alt="<?php print esc_attr__('logo', 'saasty'); ?>" />
        </a>
    <?php endif; ?>
<?php
}

// header logo
function saasty_header_sticky_logo()
{ ?>
    <?php
    $saasty_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
    $saasty_secondary_logo = get_theme_mod('seconday_logo', $saasty_logo_black);
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($saasty_secondary_logo); ?>" alt="<?php print esc_attr__('logo', 'saasty'); ?>" />
    </a>
<?php
}

function saasty_mobile_logo()
{
    // side info
    $saasty_mobile_logo_hide = get_theme_mod('saasty_mobile_logo_hide', false);

    $saasty_site_logo = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo/logo.png');

?>

    <?php if (!empty($saasty_mobile_logo_hide)): ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($saasty_site_logo); ?>" alt="<?php print esc_attr__('logo', 'saasty'); ?>" />
            </a>
        </div>
    <?php endif; ?>



<?php }

/**
 * [saasty_header_social_profiles description]
 * @return [type] [description]
 */
function saasty_header_social_profiles()
{
    $saasty_topbar_fb_url = get_theme_mod('saasty_topbar_fb_url', __('#', 'saasty'));
    $saasty_topbar_twitter_url = get_theme_mod('saasty_topbar_twitter_url', __('#', 'saasty'));
    $saasty_topbar_instagram_url = get_theme_mod('saasty_topbar_instagram_url', __('#', 'saasty'));
    $saasty_topbar_linkedin_url = get_theme_mod('saasty_topbar_linkedin_url', __('#', 'saasty'));
    $saasty_topbar_youtube_url = get_theme_mod('saasty_topbar_youtube_url', __('#', 'saasty'));
?>
    <ul>
        <?php if (!empty($saasty_topbar_fb_url)): ?>
            <li><a href="<?php print esc_url($saasty_topbar_fb_url); ?>"><span><i class="fab fa-facebook-f"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($saasty_topbar_twitter_url)): ?>
            <li><a href="<?php print esc_url($saasty_topbar_twitter_url); ?>"><span><i class="fab fa-twitter"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($saasty_topbar_instagram_url)): ?>
            <li><a href="<?php print esc_url($saasty_topbar_instagram_url); ?>"><span><i class="fab fa-instagram"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($saasty_topbar_linkedin_url)): ?>
            <li><a href="<?php print esc_url($saasty_topbar_linkedin_url); ?>"><span><i class="fab fa-linkedin"></i></span></a></li>
        <?php endif; ?>

        <?php if (!empty($saasty_topbar_youtube_url)): ?>
            <li><a href="<?php print esc_url($saasty_topbar_youtube_url); ?>"><span><i class="fab fa-youtube"></i></span></a></li>
        <?php endif; ?>
    </ul>

<?php
}

function saasty_footer_social_profiles()
{
    $saasty_footer_fb_url = get_theme_mod('saasty_footer_fb_url', __('#', 'saasty'));
    $saasty_footer_twitter_url = get_theme_mod('saasty_footer_twitter_url', __('#', 'saasty'));
    $saasty_footer_instagram_url = get_theme_mod('saasty_footer_instagram_url', __('#', 'saasty'));
    $saasty_footer_linkedin_url = get_theme_mod('saasty_footer_linkedin_url', __('#', 'saasty'));
    $saasty_footer_youtube_url = get_theme_mod('saasty_footer_youtube_url', __('#', 'saasty'));
?>

    <ul>
        <?php if (!empty($saasty_footer_fb_url)): ?>
            <li>
                <a href="<?php print esc_url($saasty_footer_fb_url); ?>">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($saasty_footer_twitter_url)): ?>
            <li>
                <a href="<?php print esc_url($saasty_footer_twitter_url); ?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($saasty_footer_instagram_url)): ?>
            <li>
                <a href="<?php print esc_url($saasty_footer_instagram_url); ?>">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($saasty_footer_linkedin_url)): ?>
            <li>
                <a href="<?php print esc_url($saasty_footer_linkedin_url); ?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($saasty_footer_youtube_url)): ?>
            <li>
                <a href="<?php print esc_url($saasty_footer_youtube_url); ?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * [saasty_header_menu description]
 * @return [type] [description]
 */

function saasty_header_menu()
{
    $saasty_menu = '';

    if (function_exists('get_field') && is_page()) {
        $selected_menu = get_field('select_menu');
    }

    if (! empty($selected_menu) && $selected_menu !== 'Select Menu') {
        $saasty_menu = wp_nav_menu([
            'menu'           => $selected_menu,
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'saasty_Navwalker_Class::fallback',
            'walker'         => new saasty_Navwalker_Class(),
            'echo'           => false, // Capture the output instead of echoing it
        ]);
    } else {
        $saasty_menu = wp_nav_menu([
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'saasty_Navwalker_Class::fallback',
            'walker'         => new saasty_Navwalker_Class(),
            'echo'           => false, // Capture the output instead of echoing it
        ]);
    }

    // Replace the class in the captured menu markup
    $saasty_menu = str_replace("menu-item-has-children", "has-dropdown", $saasty_menu);

    // Output the sanitized menu
    echo wp_kses_post($saasty_menu);
}

function saasty_hamberger_menu()
{
    // Check if the hamburger menu is registered
    if (has_nav_menu('hamberger-menu')) {
        $saasty_hamberger_menu = wp_nav_menu(array(
            'theme_location' => 'hamberger-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'saasty_Navwalker_Class::fallback',
            'walker'         => new saasty_Navwalker_Class(),
            'echo'           => false,
        ));

        // Replace the class in the captured menu markup
        $saasty_hamberger_menu = str_replace("menu-item-has-children", "has-dropdown", $saasty_hamberger_menu);

        // Output the modified menu
        echo wp_kses_post($saasty_hamberger_menu);
    }
}





/**
 * [saasty_header_menu description]
 * @return [type] [description]
 */
function saasty_mobile_menu()
{

?>
    <?php
    $saasty_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false,
    ]);

    $saasty_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children  ", $saasty_menu);
    echo wp_kses_post($saasty_menu);
    ?>
<?php
}

/**
 * [saasty_search_menu description]
 * @return [type] [description]
 */
function saasty_header_search_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'saasty_Navwalker_Class::fallback',
        'walker'         => new saasty_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [saasty_footer_menu description]
 * @return [type] [description]
 */
function saasty_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'm-0',
        'container'      => '',
        'fallback_cb'    => 'saasty_Navwalker_Class::fallback',
        'walker'         => new saasty_Navwalker_Class,
    ]);
}


/**
 * [saasty_category_menu description]
 * @return [type] [description]
 */
function saasty_category_menu()
{
    wp_nav_menu([
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'saasty_Navwalker_Class::fallback',
        'walker'         => new saasty_Navwalker_Class,
    ]);
}

/**
 *
 * saasty footer
 */
add_action('saasty_footer_style', 'saasty_check_footer', 10);

function saasty_check_footer()
{
    $edunity_footer_styles = function_exists('get_field') ? get_field('footer_style') : NULL;
    $edunity_default_footer_styles = get_theme_mod('saasty_default_footer', 'footer-style-1');

    if ($edunity_footer_styles == 'footer-style-1') {
        get_template_part('template-parts/footer/footer-1');
    } elseif ($edunity_footer_styles == 'footer-style-2') {
        get_template_part('template-parts/footer/footer-2');
    } elseif ($edunity_footer_styles == 'footer-style-3') {
        get_template_part('template-parts/footer/footer-3');
    } elseif ($edunity_footer_styles == 'footer-style-4') {
        get_template_part('template-parts/footer/footer-4');
    } elseif ($edunity_footer_styles == 'footer-style-5') {
        get_template_part('template-parts/footer/footer-5');
    } elseif ($edunity_footer_styles == 'footer-style-6') {
        get_template_part('template-parts/footer/footer-6');
    } elseif ($edunity_footer_styles == 'footer-style-7') {
        get_template_part('template-parts/footer/footer-7');
    } elseif ($edunity_footer_styles == 'footer-style-8') {
        get_template_part('template-parts/footer/footer-8');
    } elseif ($edunity_footer_styles == 'footer-style-9') {
        get_template_part('template-parts/footer/footer-9');
    } else {

        /** default footer style **/
        if ($edunity_default_footer_styles == 'footer-style-2') {
            get_template_part('template-parts/footer/footer-2');
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    }
}




// saasty_copyright_text
function saasty_copyright_text()
{
    print get_theme_mod('footer_copywrite_text', saasty_kses('Copyright © 2024 <span><a href="/">Saasty</a></span>. All Rights Reserved Created by <span><a href="#">Ordianit</a></span>', 'saasty'));
}



/**
 *
 * pagination
 */
if (!function_exists('saasty_pagination')) {

    function _saasty_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function saasty_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _saasty_pagi_callback($pagi);
    }
}


// header top bg color
function saasty_breadcrumb_bg_color()
{
    $color_code = get_theme_mod('saasty_breadcrumb_bg_color', '#222');
    wp_enqueue_style('saasty-custom', saasty_THEME_CSS_DIR . 'saasty-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style('saasty-breadcrumb-bg', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'saasty_breadcrumb_bg_color');

// breadcrumb-spacing top
function saasty_breadcrumb_spacing()
{
    $padding_px = get_theme_mod('saasty_breadcrumb_spacing', '160px');
    wp_enqueue_style('saasty-custom', saasty_THEME_CSS_DIR . 'saasty-custom.css', []);
    if ($padding_px != '') {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style('saasty-breadcrumb-top-spacing', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'saasty_breadcrumb_spacing');



// saasty_kses_intermediate
function saasty_kses_intermediate($string = '')
{
    return wp_kses($string, saasty_get_allowed_html_tags('intermediate'));
}

function saasty_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function saasty_kses($raw)
{

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}
