<?php

/**
 * saasty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package saasty
 */

if (!function_exists('saasty_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function saasty_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on saasty, use a find and replace
         * to change 'saasty' to the name of your theme in all the template files.
         */
        load_theme_textdomain('saasty', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');


        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'main-menu' => esc_html__('Primary Menu', 'saasty'),
            'footer-menu' => esc_html__('Footer Menu', 'saasty'),
        ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('saasty_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        //Enable custom header
        add_theme_support('custom-header');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ]);

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');
        add_editor_style('');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        remove_theme_support('widgets-block-editor');

        add_image_size('saasty-case-details', 1170, 600, ['center', 'center']);
    }
endif;
add_action('after_setup_theme', 'saasty_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saasty_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('saasty_content_width', 640);
}
add_action('after_setup_theme', 'saasty_content_width', 0);

if (function_exists('register_block_style')) {
    register_block_style(
        'core/quote',
        array(
            'name'         => 'blue-quote',
            'label'        => __('Blue Quote', 'saasty'),
            'is_default'   => true,
            'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
        )
    );
}

function saasty_block_patterns()
{
    // Check if the function exists to ensure compatibility.
    if (function_exists('register_block_pattern')) {
        // Register the block pattern.
        register_block_pattern(
            'my-theme/my-awesome-pattern', // Unique pattern name.
            array(
                'title'       => __('My Awesome Pattern', 'saasty'),
                'description' => _x('A custom block pattern for awesome content.', 'Block pattern description', 'saasty'),
                'content'     => '
                    <!-- wp:paragraph -->
                    <p>' . __('This is an example paragraph block in my custom pattern.', 'saasty') . '</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:image -->
                    <figure class="wp-block-image"><img src="' . esc_url(get_template_directory_uri() . '/images/example.jpg') . '" alt="' . esc_attr__('Example image', 'saasty') . '"/></figure>
                    <!-- /wp:image -->

                    <!-- wp:heading {"level":3} -->
                    <h3>' . __('Example Heading', 'saasty') . '</h3>
                    <!-- /wp:heading -->

                    <!-- wp:list -->
                    <ul><li>' . __('First item', 'saasty') . '</li><li>' . __('Second item', 'saasty') . '</li></ul>
                    <!-- /wp:list -->
                ',
                'categories'  => array('my-category'),
                'keywords'    => array('custom', 'example'),
            )
        );
    }
}
add_action('init', 'saasty_block_patterns');




/**
 * Enqueue scripts and styles.
 */

define('saasty_META_ID', 'saasty-meta');

define('saasty_THEME_DIR', get_template_directory());
define('saasty_THEME_URI', get_template_directory_uri());
define('saasty_THEME_CSS_DIR', saasty_THEME_URI . '/assets/css/');
define('saasty_THEME_JS_DIR', saasty_THEME_URI . '/assets/js/');
define('saasty_THEME_INC', saasty_THEME_DIR . '/inc/');



// wp_body_open
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}
//body class
function saasty_custom_body_class($classes)
{
    $classes[] = 'it-magic-cursor';
    return $classes;
}

add_filter('body_class', 'saasty_custom_body_class');

add_filter('body_class', 'add_class_when_menu_active');
function add_class_when_menu_active($classes)
{

    if (has_nav_menu('main-menu'))
        $classes[] = 'active_menu_class';

    return $classes;
}

/**
 * Implement the Custom Header feature.
 */
require saasty_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require saasty_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require saasty_THEME_INC . 'template-helper.php';

/**
 * initialize saasty customizer class.
 */
if (class_exists('kirki')) {
    include_once saasty_THEME_INC . 'theme-customizer.php';
}


/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require saasty_THEME_INC . 'jetpack.php';
}



/**
 * include saasty functions file
 */
require_once saasty_THEME_INC . 'class-navwalker.php';
require_once saasty_THEME_INC . 'class-tgm-plugin-activation.php';
require_once saasty_THEME_INC . 'add_plugin.php';
require_once saasty_THEME_INC . '/common/theme-breadcrumb.php';
require_once saasty_THEME_INC . '/common/theme-scripts.php';
require_once saasty_THEME_INC . '/common/theme-widgets.php';
require_once saasty_THEME_INC . '/common/acf-metabox.php';
require_once saasty_THEME_INC . '/common/csf-post-meta/event-meta.php';
require_once saasty_THEME_INC . '/common/csf-post-meta/product-meta.php';
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function saasty_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'saasty_pingback_header');

// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function saasty_move_comment_textarea_to_bottom($fields)
{
    $comment_field       = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'saasty_move_comment_textarea_to_bottom');


// saasty_comment 
if (!function_exists('saasty_comment')) {
    function saasty_comment($comment, $args, $depth)
    {
        $GLOBAL['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr($depth);
?>
        <li id="comment-<?php comment_ID(); ?>">
            <div class="postbox-comment-user p-relative d-flex align-items-center">
                <div class="postbox-user-thumb">
                    <?php
                    $avatar_url = get_avatar_url($comment, ['size' => 102]);

                    ?>

                    <img src="<?php echo esc_url($avatar_url); ?>" alt="">

                </div>
                <div class="postbox-user-info">
                    <h4 class="user-title"><?php print get_comment_author_link(); ?></h4>
                    <span><?php comment_time(get_option('date_format')); ?></span>
                    <p><?php comment_text(); ?></p>
                </div>
                <?php
                comment_reply_link(array_merge($args, [
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => 'Reply'  // Custom reply text
                ]));
                ?>
            </div>

        </li>
<?php
    }
}


/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter('the_content', 'saasty_shortcode_extra_content_remove');
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function saasty_shortcode_extra_content_remove($content)
{

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr($content, $array);
}



// saasty_search_filter_form
if (!function_exists('saasty_search_filter_form')) {
    function saasty_search_filter_form($form)
    {

        $form = sprintf(
            ' <div class="sidebar-search-box p-relative">
                    <form  action="%s" method="get">
                        <div class="sidebar-search-input">
                        <input type="text"  value="%s" required name="s" placeholder="%s">
                        </div>
                        <div class="sidebar-search-button">
                            <button type="submit">
                                <i class="fal fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
           ',
            esc_url(home_url('/')),
            esc_attr(get_search_query()),
            esc_html__('Search', 'saasty')
        );

        return $form;
    }
    add_filter('get_search_form', 'saasty_search_filter_form');
}

add_action('admin_enqueue_scripts', 'saasty_admin_custom_scripts');

function saasty_admin_custom_scripts()
{
    wp_enqueue_media();
    wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css', array());
    wp_register_script('saasty-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
    wp_enqueue_script('saasty-admin-custom');
}
