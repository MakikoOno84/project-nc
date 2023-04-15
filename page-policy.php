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
	<section class='section-policy'>
		<?php
			if ( function_exists('get_field') ) :
				?>
				<!-- 政策 -->
				<article>
				<?php
				if ( get_field( 'seisakutitle' ) ) : 
					?>
					<h2><?php the_field('seisakutitle'); ?></h2>
					<?php
				endif;						
				if ( get_field( 'seisakucontent' ) ) : 
					the_field('seisakucontent');
				endif;	
				?>
				</article>
				<?php
			endif;
			
		?>
	</section>
	
	</div>

	</main><!-- #main -->

<?php
get_footer();
