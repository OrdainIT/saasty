<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package saasty
 */

get_header();


    $blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;
    ?>

    <section class="blog_unit postbox__area fix pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-<?php echo esc_attr( $blog_column ); ?>  col-xl-<?php echo esc_attr( $blog_column ); ?>">
                    <div class="postbox__details-wrapper postbox-details-wrapper">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', get_post_format() );

                            if ( get_previous_post_link() && get_next_post_link() ) : ?>
                                <div class="blog-details-border d-none">
                                    <div class="row align-items-center">
                                        <?php if ( get_previous_post_link() ) : ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="theme-navigation b-next-post text-left mb-30">
                                                    <span><?php echo esc_html__( 'Prev Post', 'saasty' ); ?></span>
                                                    <h4><?php echo get_previous_post_link( '%link ', '%title' ); ?></h4>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ( get_next_post_link() ) : ?>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="theme-navigation b-next-post text-left text-md-right mb-30">
                                                    <span><?php echo esc_html__( 'Next Post', 'saasty' ); ?></span>
                                                    <h4><?php echo get_next_post_link( '%link ', '%title' ); ?></h4>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                            get_template_part( 'template-parts/biography' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div>
                </div>

                <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
                    <div class="col-xl-4 col-lg-4 order-lg-0 order-md-1">
                        <div class="it-common-sidebar it-blog-sidebar common_test_sidebar">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php


get_footer();
