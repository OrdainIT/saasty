<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */

$saasty_blog_btn = get_theme_mod('saasty_blog_btn', 'Read More');
$saasty_blog_btn_switch = get_theme_mod('saasty_blog_btn_switch', true);
if (is_single()) : ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox-item format-standard'); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="postbox-thumb radius mb-35">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <?php get_template_part('template-parts/blog/blog-meta'); ?>
        <div class="postbox-content-box">
            <h3 class="postbox-title mb-25"><?php the_title(); ?></h3>
            <?php the_content(); ?>
            <?php
            wp_link_pages([
                'before'      => '<div class="page-links">' . esc_html__('Pages:', 'saasty'),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ]);
            ?>
        </div>

        <div class="postbox-meta mb-20">
            <div class="row align-items-center">
                <div class="col-xl-8">
                    <?php $tags = saasty_get_tag(); ?>
                    <?php if (!empty($tags)): ?>
                        <div class="postbox-tag d-flex align-items-center">
                            <h3 class="postbox-tag-title"><?php echo esc_html__('Tag:', 'saasty'); ?></h3>
                            <?php echo saasty_get_tag(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (function_exists('get_share_buttons')) : ?>
                    <div class="col-xl-4">
                        <div class="postbox-share d-flex align-items-center justify-content-xl-end">
                            <h3 class="postbox-tag-title"><?php echo esc_html__('Share:', 'saasty'); ?></h3>
                            <div class="postbox-share-content">

                                <?php
                                $post_url = get_permalink();
                                $post_title = get_the_title();
                                get_share_buttons($post_url, $post_title);
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </article>
<?php else: ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox-thumb-box mb-60 format-search'); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="postbox-main-thumb mb-30">
                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            </div>
        <?php endif; ?>
        <div class="postbox-content-box">
            <?php get_template_part('template-parts/blog/blog-meta'); ?>
            <h4 class="postbox-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
            <?php if ($saasty_blog_btn_switch): ?>
                <a class="it-btn-primary mt-15" href="<?php the_permalink(); ?>"><span><?php echo esc_html($saasty_blog_btn, 'saasty'); ?></span></a>
            <?php endif; ?>
        </div>
    </article>

<?php endif; ?>