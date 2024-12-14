<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package saasty
 */

$saasty_blog_btn = get_theme_mod( 'saasty_blog_btn', 'Read More' );
$saasty_blog_btn_switch = get_theme_mod( 'saasty_blog_btn_switch', true );

?>

<?php if ( !empty( $saasty_blog_btn_switch ) ): ?>
<a class="it-btn-green mt-15" href="<?php the_permalink();?>"><span><?php print esc_html( $saasty_blog_btn );?></span></a>
<?php endif;?>