<?php

$blog_column_8 = is_active_sidebar('blog-sidebar') ? 8 : 12;
$blog_column_9 = is_active_sidebar('blog-sidebar') ? 9 : 12;
?>



<!-- blog-list area start  -->
<div class="it-blog-list-area blog-list-left-style  it-blog-list-style pt-120 pb-120">
	<div class="container">
		<div class="row">

			<?php if (is_active_sidebar('blog-sidebar')): ?>
				<div class="col-xl-3 col-lg-4">
					<div class="sidebar-right it-common-sidebar it-blog-sidebar sidebar-right common_test_sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="col-xl-<?php print esc_attr($blog_column_9); ?> col-lg-<?php print esc_attr($blog_column_8); ?>">
				<div class="it-blog-list-left">
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
							<?php
							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part('template-parts/content', get_post_format()); ?>
						<?php
						endwhile;
						?>

						<div class="it-pagination mt-60">
							<?php saasty_pagination('<i class="fa-light fa-angle-left"></i>', '<i class="fa-light fa-angle-right"></i>', '', ['class' => '']); ?>

						</div>


					<?php
					else:
						get_template_part('template-parts/content', 'none');
					endif;
					?>


				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog-list area end  -->