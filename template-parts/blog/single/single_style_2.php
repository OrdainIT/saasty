<?php

global $post;

$blog_column_8 = is_active_sidebar('blog-sidebar') ? 8 : 12;
$blog_column_9 = is_active_sidebar('blog-sidebar') ? 9 : 12;

?>

<div class='postbox-area postbox-left-style pt-120 pb-105'>
    <div class="container">
        <div class="row">

            <?php if (is_active_sidebar('blog-sidebar')): ?>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-right">
                        <div class="it-common-sidebar it-blog-sidebar common_test_sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-xl-<?php echo esc_attr($blog_column_9, 'saasty'); ?> col-lg-<?php echo esc_attr($blog_column_8, 'saasty'); ?>">
                <div class="postbox-details-wrapper">
                    <?php
                    while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/content', get_post_format());

                        if (get_previous_post_link() && get_next_post_link()) : ?>
                            <div class="blog-details-border d-none">
                                <div class="row align-items-center">
                                    <?php if (get_previous_post_link()) : ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="theme-navigation b-next-post text-left mb-30">
                                                <span><?php echo esc_html__('Prev Post', 'saasty'); ?></span>
                                                <h4><?php echo get_previous_post_link('%link ', '%title'); ?></h4>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (get_next_post_link()) : ?>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="theme-navigation b-next-post text-left text-md-right mb-30">
                                                <span><?php echo esc_html__('Next Post', 'saasty'); ?></span>
                                                <h4><?php echo get_next_post_link('%link ', '%title'); ?></h4>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php
                        get_template_part('template-parts/biography');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/blog/blog_slider'); ?>