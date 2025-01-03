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
$saasty_bolg_style = get_theme_mod('saasty_bolg_style', 'blog-style-1');
$saasty_video_url = function_exists('get_field') ? get_field('format_link') : NULL;

if (is_single()):
?>


    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox-item format-video'); ?>>

        <?php if (has_post_thumbnail()): ?>
            <div class="postbox-main-thumb p-relative mb-35">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                <?php if (!empty($saasty_video_url)): ?>
                    <a class="it-about-2-video-btn popup-video" href="<?php echo esc_url($saasty_video_url); ?>">
                        <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.08398 4.66237L0.917318 0.524694L0.917318 8.80005L8.08398 4.66237Z" fill="currentcolor"></path>
                        </svg>
                    </a>
                <?php endif; ?>
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


        <div class="postbox-tag-box grey-bg mb-45">
            <div class="row align-items-center">
                <div class="col-xl-7">
                    <?php $tags = saasty_get_tag(); ?>
                    <?php if (!empty($tags)): ?>
                        <div class="postbox-tag d-flex align-items-center">
                            <h3 class="postbox-tag-title"><?php echo esc_html__('Tag:', 'saasty'); ?></h3>
                            <?php echo saasty_get_tag(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (function_exists('get_share_buttons')) : ?>
                    <div class="col-xl-5">
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
    <?php if ($saasty_bolg_style == 'blog-style-2') {
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('"col-xl-4 col-lg-4 col-md-6 mb-30 format-video'); ?>>
            <div class="it-blog-item p-relative">
                <?php if (has_post_thumbnail()): ?>
                    <div class="postbox-main-thumb p-relative">
                        <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                        <?php if (!empty($saasty_video_url)): ?>
                            <a class="it-about-2-video-btn popup-video" href="<?php echo esc_url($saasty_video_url); ?>">
                                <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.08398 4.66237L0.917318 0.524694L0.917318 8.80005L8.08398 4.66237Z" fill="currentcolor"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="it-blog-categories">
                        <span>
                            <?php
                            $categories = get_the_category(); // Get categories for the current post
                            if (! empty($categories)) {
                                $category_links = array();

                                foreach ($categories as $category) {
                                    // Generate category link
                                    $category_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                }

                                // Join the category links with commas and display
                                echo implode(', ', $category_links);
                            } else {
                                echo 'No Categories';
                            }
                            ?>
                        </span>
                    </div>

                <?php endif; ?>
                <div class="it-blog-content">
                    <div class="it-blog-meta-box mb-20 d-flex align-items-center">
                        <?php


                        $saasty_blog_date = get_theme_mod('saasty_blog_date_switch', true);
                        $saasty_blog_comments = get_theme_mod('saasty_blog_comment_switch', true);

                        ?>
                        <?php if (!empty($saasty_blog_date)): ?>
                            <div class="it-blog-meta">
                                <span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($saasty_blog_comments)): ?>
                            <div class="it-blog-meta">
                                <span>
                                    <i class="fa-regular fa-comments"></i>
                                    <?php
                                    $comments_number = get_comments_number(); // Get the number of comments
                                    if ($comments_number == 1) {
                                        echo '1 Comment';
                                    } elseif ($comments_number > 1) {
                                        echo esc_html($comments_number, 'saasty') . ' Comments';
                                    } else {
                                        echo '0 Comments';
                                    }
                                    ?>
                                </span>
                            </div>
                        <?php endif; ?>

                    </div>
                    <h3 class="it-blog-title mb-20">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="it-blog-link">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo esc_html($saasty_blog_btn, 'saasty'); ?>
                            <i class="fa-light fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>






    <?php

    } else {
    ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class('postbox-thumb-box mb-60 format-video'); ?>>
            <?php if (has_post_thumbnail()): ?>
                <div class="postbox-main-thumb p-relative mb-30">
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                    <?php if (!empty($saasty_video_url)): ?>
                        <a class="it-about-2-video-btn popup-video" href="<?php echo esc_url($saasty_video_url); ?>">
                            <svg width="9" height="9" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.08398 4.66237L0.917318 0.524694L0.917318 8.80005L8.08398 4.66237Z" fill="currentcolor"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
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






    <?php
    }
    ?>


<?php
endif; ?>