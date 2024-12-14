<?php

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;
?>


<section class="postbox__area inner-style-1 fix pt-120 pb-120">
    <div class="container">
        <div class="row">
			<div class="col-xl-<?php print esc_attr( $blog_column );?> col-lg-<?php print esc_attr( $blog_column );?>">
				<div class="postbox-details-wrapper">
					<?php
						if ( have_posts() ):
    					if ( is_home() && !is_front_page() ):
    				?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
					</header>
					<?php
						endif;?>
					<?php
						/* Start the Loop */
						while ( have_posts() ): the_post(); ?>
						<?php
							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_format() );?>
						<?php
							endwhile;
						?>
		               		
						<div class="it-pagination mt-10">
							<?php saasty_pagination('<i class="fa-solid fa-arrow-left-long"></i>', '<i class="fa-solid fa-arrow-right-long"></i>', '', ['class' => '']); ?>
						</div>
						<?php
						else:
							get_template_part( 'template-parts/content', 'none' );
						endif;
					?>

				</div>
			</div>

			<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
		        <div class="col-xxl-4 col-xl-4 col-lg-4">
		        	<div class="it-common-sidebar it-blog-sidebar sidebar-right common_test_sidebar">
						<?php get_sidebar();?>
	            	</div>
	            </div>
			<?php endif;?>
        </div>
    </div>
</section>