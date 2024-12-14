<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('postbox-thumb-box mb-60 format-quote'); ?>>
    <div class="postbox-content-box">
        <?php the_content(); ?>
    </div>
</article>