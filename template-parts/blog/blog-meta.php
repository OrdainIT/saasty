<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */

$categories = get_the_terms($post->ID, 'category');
$saasty_blog_date = get_theme_mod('saasty_blog_date_switch', true);
$saasty_blog_comments = get_theme_mod('saasty_blog_comment_switch', true);
$saasty_blog_author = get_theme_mod('saasty_blog_author_switch', true);

?>

<div class="it-blog-meta mb-25">
    <span><?php echo get_the_date(); ?></span>
    <i>
        <?php
        $categories = get_the_category();
        if (! empty($categories)) {
            echo esc_html($categories[0]->name); // Display the first category name
        }
        ?>
    </i>
</div>