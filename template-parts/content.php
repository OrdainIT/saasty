<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */
global $post;


$saasty_blog_btn = get_theme_mod('saasty_blog_btn', 'Read More');
$saasty_blog_btn_switch = get_theme_mod('saasty_blog_btn_switch', true);
$saasty_bolg_style = get_theme_mod('saasty_bolg_style', 'blog-style-1');
if (is_single()) : ?>




    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox-item format-standard'); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="postbox-thumb text-center mb-40">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <?php get_template_part('template-parts/blog/blog-meta'); ?>
        <div class="postbox-content-box">
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

        <div class="postbox-tag-box  mb-55">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6 col-md-6">
                    <?php $tags = saasty_get_tag(); ?>
                    <?php if (!empty($tags)): ?>
                        <div class="postbox-tag d-flex align-items-center">
                            <h3 class="postbox-tag-title"><?php echo esc_html__('Tag:', 'saasty'); ?></h3>
                            <?php echo saasty_get_tag(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (function_exists('get_share_buttons')) : ?>
                    <div class="col-xl-5 col-lg-6 col-md-6">
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

        <div class="postbox-more-wrap">
            <div class="row align-items-center">
                <div class="col-6">
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post) :
                    ?>
                        <div class="postbox-more-left d-flex align-items-center justify-content-start">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <div class="postbox-more-thumb mr-20">
                                    <?php
                                    if (has_post_thumbnail($prev_post->ID)) {
                                        echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', ['alt' => get_the_title($prev_post->ID)]);
                                    }
                                    ?>
                                    <span class="postbox-more-thumb-icon"><i class="fa-light fa-arrow-left-long"></i></span>
                                </div>
                            </a>
                            <div class="postbox-more-content">
                                <a href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo esc_html__('Previous Post', 'saasty'); ?></a>
                                <span>
                                    <?php
                                    $prev_title_words = explode(' ', get_the_title($prev_post->ID));
                                    echo esc_html(implode(' ', array_slice($prev_title_words, 0, 2)));
                                    ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-6">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post) :
                    ?>
                        <div class="postbox-more-right d-flex align-items-center justify-content-end">
                            <div class="text-sm-end text-start">
                                <div class="postbox-more-content">
                                    <a href="<?php echo get_permalink($next_post->ID); ?>"><?php echo esc_html__('Next Post', 'saasty'); ?></a>
                                    <span>
                                        <?php
                                        $next_title_words = explode(' ', get_the_title($next_post->ID));
                                        echo esc_html(implode(' ', array_slice($next_title_words, 0, 2)));
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <div class="postbox-more-thumb ml-20">
                                    <?php
                                    if (has_post_thumbnail($next_post->ID)) {
                                        echo get_the_post_thumbnail($next_post->ID, 'thumbnail', ['alt' => get_the_title($next_post->ID)]);
                                    }
                                    ?>
                                    <span class="postbox-more-thumb-icon"><i class="fa-light fa-arrow-right-long"></i></span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


    </article>

<?php else: ?>
    <?php if ($saasty_bolg_style == 'blog-style-2') {
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('"col-xl-4 col-lg-4 col-md-6 mb-30 format-standard'); ?>>
            <div class="it-blog-item p-relative">
                <?php if (has_post_thumbnail()): ?>
                    <div class="it-blog-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        </a>
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


        <article id="post-<?php the_ID(); ?>" <?php post_class('it-blog-item zoom white-bg mb-55 format-standard'); ?>>
            <?php if (has_post_thumbnail()): ?>
                <div class="it-blog-thumb img-zoom">
                    <a href="<?php the_permalink(); ?>">
                        <img class="w-100" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    </a>
                </div>
            <?php endif; ?>
            <div class="it-blog-content">
                <?php get_template_part('template-parts/blog/blog-meta'); ?>

                <h4 class="it-blog-title mb-20"><a class="border-line-theme title-hover" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                <a class="it-blog-link border-line-theme title-hover" href="<?php the_permalink(); ?>">
                    <?php echo esc_html($saasty_blog_btn, 'saasty'); ?>
                    <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="currentcolor" />
                    </svg>
                </a>
            </div>
        </article>






    <?php
    } ?>


<?php endif; ?>