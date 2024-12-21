<!-- blog-area-start -->
<div class="it-blog-area p-relative z-index-1 pb-120">
    <div class="container">
        <div class="it-blog-title-wrap mb-65">
            <div class="row align-items-end">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <div class="it-blog-title-box">
                        <h3 class="it-section-title"><?php echo esc_html__('Related Post', 'saasty'); ?></h3>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-4">
                    <div class="it-blog-arrow-box text-md-end">
                        <button class="slider-prev">
                            <span>
                                <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.469669 6.53033C0.176777 6.23744 0.176777 5.76256 0.469669 5.46967L5.24264 0.696699C5.53553 0.403806 6.01041 0.403806 6.3033 0.696699C6.59619 0.989593 6.59619 1.46447 6.3033 1.75736L2.06066 6L6.3033 10.2426C6.59619 10.5355 6.59619 11.0104 6.3033 11.3033C6.01041 11.5962 5.53553 11.5962 5.24264 11.3033L0.469669 6.53033ZM21 6.75H1V5.25H21V6.75Z"
                                        fill="currentcolor" />
                                </svg>
                            </span>
                        </button>
                        <button class="slider-next">
                            <span>
                                <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z"
                                        fill="currentcolor" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="it-blog-slider-wrapper">
                    <div class="swiper-container it-blog-active">
                        <div class="swiper-wrapper">

                            <?php
                            // Define the query arguments
                            $args = array(
                                'post_type'      => 'post', // Replace with your post type if different
                                'posts_per_page' => -1,      // Number of posts to display
                                'orderby'        => 'rand', // Order posts randomly
                            );

                            // Fetch the posts
                            $random_posts = new WP_Query($args);

                            if ($random_posts->have_posts()) :
                                while ($random_posts->have_posts()) : $random_posts->the_post();
                            ?>
                                    <div class="swiper-slide">
                                        <div class="it-blog-item zoom white-bg">
                                            <div class="it-blog-thumb img-zoom">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    if (has_post_thumbnail()) {
                                                        the_post_thumbnail('full', ['class' => 'w-100', 'alt' => get_the_title()]);
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="it-blog-content">
                                                <div class="it-blog-meta mb-25">
                                                    <span><?php echo get_the_date(); ?></span>
                                                    <i>
                                                        <?php
                                                        $categories = get_the_category();
                                                        if (! empty($categories)) {
                                                            echo esc_html($categories[0]->name); // Show first category
                                                        }
                                                        ?>
                                                    </i>
                                                </div>
                                                <h4 class="it-blog-title mb-20">
                                                    <a class="border-line-theme title-hover" href="<?php the_permalink(); ?>">
                                                        <?php echo wp_trim_words(get_the_title(), 8, '...'); ?>
                                                    </a>
                                                </h4>
                                                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                                <a class="it-blog-link border-line-theme title-hover" href="<?php the_permalink(); ?>">
                                                    Read More
                                                    <svg width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20.5303 6.53033C20.8232 6.23744 20.8232 5.76256 20.5303 5.46967L15.7574 0.696699C15.4645 0.403806 14.9896 0.403806 14.6967 0.696699C14.4038 0.989593 14.4038 1.46447 14.6967 1.75736L18.9393 6L14.6967 10.2426C14.4038 10.5355 14.4038 11.0104 14.6967 11.3033C14.9896 11.5962 15.4645 11.5962 15.7574 11.3033L20.5303 6.53033ZM0 6.75H20V5.25H0V6.75Z" fill="currentcolor" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata(); // Reset post data
                            endif;
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area-end -->