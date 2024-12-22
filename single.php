<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saasty
 */

get_header();
$saasty_bolg_style = get_theme_mod('saasty_bolg_style', 'right-sidebar');

?>






<section class="blog_unit ">
    <?php

    if ($saasty_bolg_style == 'left-sidebar') {
        get_template_part('template-parts/blog/single/single_style_2');
    } else {
        get_template_part('template-parts/blog/single/single_style_1');
    }


    ?>
</section>

<?php


get_footer();
