<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */
$saasty_bolg_style = get_theme_mod('saasty_bolg_style', 'right-sidebar');
get_header();
if ($saasty_bolg_style == 'left-sidebar') {
    get_template_part('template-parts/blog/blog_style_2');
} elseif ($saasty_bolg_style == 'no-sidebar') {
    get_template_part('template-parts/blog/blog_style_3');
} else {
    get_template_part('template-parts/blog/blog_style_1');
}


get_footer();
