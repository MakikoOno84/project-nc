<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package project-nc
 */

get_header();
?>

	<main id="primary" class="site-main">

	
	
	<div class="site-wrapper">
	<?php
			the_title( '<h1 class="entry-title">', '</h1>' );	
	?>
	<section class='section-profile'>
			<?php
			if ( function_exists('get_field') ) :
				if ( get_field('profileimage')) : ?>
					<img src="<?php the_field('profileimage'); ?>" alt="an image of Chieko Nishiyama">
				<?php endif;

				if ( get_field( 'description' ) ) : 
					?><div class='profile-desc'><?php
					the_field('description');
					?></div><?php
				endif;						

			endif;
		?>
	</section>
	
	</div>

	</main><!-- #main -->

<?php
get_footer();
