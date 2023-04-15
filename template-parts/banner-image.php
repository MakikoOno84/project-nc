<?php
/**
 * Template part for displaying the banner image.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * * developed by Makiko
 * @package project_nc
 */

?>
	<header class="entry-header banner" id="entry-header">
		<?php the_post_thumbnail(); ?>
		<div class="hero-content">
			<section>
				<?php
				if ( function_exists('get_field') ) :
					if ( get_field('herologo') ) : ?>
						<img src="<?php echo get_field('herologo');?>" class="hero-logo" alt="Nishiyama Chieko. Lgbt logo created by nurochman3278415 (vecteezy.com)">
					<?php endif;
				endif;
				?>
			</section>

			<section class="hero-text"> 
			<?php the_title( '<h1 class="entry-title banner-title screen-reader-text">', '</h1>' );
				if ( function_exists('get_field') ) :
				if ( get_field('herotext') ) : ?>
					<p class='banner-text'><?php echo get_field('herotext') ?></p>
				<?php endif; 
				endif; ?>
			</section>
		</div>
	</header><!-- .entry-header -->
