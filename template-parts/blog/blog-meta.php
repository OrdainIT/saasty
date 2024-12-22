<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */

$categories = get_the_terms($post->ID, 'category');

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