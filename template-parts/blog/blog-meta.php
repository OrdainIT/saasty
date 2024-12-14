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

<div class="postbox-meta mb-30">
    <?php if (!empty($saasty_blog_date)): ?>
        <span><i class="fa-light fa-calendar-days"></i><?php echo get_the_date(); ?></span>
    <?php endif; ?>
    <?php if (!empty($saasty_blog_author)): ?>
        <span><i class="fal fa-user"></i><?php the_author(); ?></span>
    <?php endif; ?>
</div>