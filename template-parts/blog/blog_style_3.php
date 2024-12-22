<?php


$saasty_blog_btn = get_theme_mod('saasty_blog_btn', 'Read More');
$saasty_blog_btn_switch = get_theme_mod('saasty_blog_btn_switch', true);
$saasty_bolg_colum_style = get_theme_mod('saasty_bolg_colum_style', true);

?>


<div class="it-blog-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()):
                if (is_home() && !is_front_page()):
            ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php
                endif; ?>
                <?php
                /* Start the Loop */
                while (have_posts()): the_post(); ?>
                    <?php if ($saasty_bolg_colum_style === '2'): ?>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="it-blog-item zoom white-bg mb-30">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="it-blog-thumb img-zoom">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="w-100" src="<?php get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="it-blog-content">
                                    <?php get_template_part('template-parts/blog/blog-meta'); ?>
                                    <h4 class="it-blog-title mb-20"><a class="border-line-theme title-hover" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <p><?php echo wp_trim_words(get_the_content(), 13, '...'); ?></p>
                                    <?php if (!empty($saasty_blog_btn_switch)): ?>
                                        <a class="it-blog-link border-line-theme title-hover" href="<?php the_permalink(); ?>">
                                            <?php echo esc_html($saasty_blog_btn, 'saasty'); ?>
                                            <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>


                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="it-blog-item zoom white-bg mb-30">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="it-blog-thumb img-zoom">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="w-100" src="<?php get_the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="it-blog-content">
                                    <?php get_template_part('template-parts/blog/blog-meta'); ?>
                                    <h4 class="it-blog-title mb-20"><a class="border-line-theme title-hover" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h4>
                                    <p><?php echo wp_trim_words(get_the_content(), 13, '...'); ?></p>

                                    <?php if (!empty($saasty_blog_btn_switch)): ?>
                                        <a class="it-blog-link border-line-theme title-hover" href="<?php the_permalink(); ?>">
                                            <?php echo esc_html($saasty_blog_btn, 'saasty'); ?>
                                            <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="currentcolor"></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php
                endwhile;
                ?>

                <div class="col-12">
                    <div class="it-pagination text-center mt-30">
                        <?php saasty_pagination('<i class="fa-light fa-angle-left"></i>', '<i class="fa-light fa-angle-right"></i>', '', ['class' => '']); ?>

                    </div>
                </div>

            <?php
            else:
                get_template_part('template-parts/content', 'none');
            endif;
            ?>

        </div>
    </div>
</div>