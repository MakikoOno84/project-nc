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
	
	<section class='section-contact'>
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			if ( function_exists('get_field') ) :
				?>

				<article>
					<h3><?php esc_html_e('メールアドレス','project_nc');?></h3>
					<?php
					if ( get_field( 'email' ) ) : 
						?>
						<p><?php the_field('email'); ?></p>
						<?php
					endif;
					?>
					<h3><?php esc_html_e('電話番号','project_nc');?></h3>
					<?php
					if ( get_field( 'phone' ) ) : 
						?>
						<p><?php the_field('phone'); ?></p>
						<?php
					endif;
				endif;?>
				<h3><?php esc_html_e('住所','project_nc');?></h3>
				<?php						
				if ( get_field( 'address' ) ) : 
					the_field('address');
				endif;
				$location = get_field('googlemap');
				if( $location ): ?>
					<div class="acf-map" data-zoom="16">
						<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
					</div>
				<?php endif; 
					?>
				</article>
	</section>
	
	</div>

	</main><!-- #main -->

<?php
get_footer();
