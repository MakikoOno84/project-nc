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

		<?php
		get_template_part( 'template-parts/banner', 'image' );

		// while ( have_posts() ) :
		// 	the_post();

		// 	get_template_part( 'template-parts/content', 'page' );

		// endwhile; // End of the loop.
		?>
		
		<div class="site-wrapper">
		<!-- Section: Calender -->
		<!-- <section class='section-calender'>
			<iframe src="https://calendar.google.com/calendar/embed?src=dbb99195194619f90a6d669ec8e7fa287dd60759934eaabe0f7259d5029c33dd%40group.calendar.google.com&ctz=Asia%2FTokyo" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</section> -->
		
		<!-- Section: 注目コンテンツ -->
		<section class='section-featured'>
			<h2><?php esc_html_e('注目コンテンツ','project_nc');?></h2>
			<div class='featured-wrapper'>
					<?php
			if ( function_exists('get_field') ) :
				// featured file
				?><div class="pdf-wrapper"><?php
					for ( $i=1 ; $i <= 2 ; $i++) :
						if ($i < 10):
							$num = '0'.$i;
						else:
							$num = $i;
						endif;
						$pdf = get_field('pdf'.$num);

						if( $pdf ):
							// Extract variables.
							$file = $pdf['file'];
							$url = $pdf['file']['url'];
							$title = $pdf['file']['title'];
							$caption = $pdf['file']['caption'];
							$size = 'full'; // (thumbnail, medium, large, full or custom size)

							?>
							<div class="pdf-item">
									<div class="pdf-image">
										<?php
										for ($j=1 ; $j <= 2 ; $j++) :
											if ($j < 10):
												$jnum = '0'.$j;
											else:
												$jnum = $j;
											endif;
											$img = $pdf['img'.$jnum];

											if ( $img ) : ?>
												
													<div>
													<?php echo wp_get_attachment_image( $img, $size ); ?>
													</div>
													
												<?php
											endif;
										endfor;
										?>
									</div>
									<a href="<?php echo esc_attr($url); ?>" title="<?php echo esc_attr($title); ?>" class="pdf-text">
										<h3><?php echo esc_html($caption); ?></h3>
										<p><?php esc_html_e('ダウンロード','project_nc'); ?></p>
									</a>
							</div>
							

						<?php endif;
					endfor;
				?></div><?php
				// featured image
				for ( $i=1 ; $i <= 2 ; $i++) :
					if ($i < 10):
						$num = '0'.$i;
					else:
						$num = $i;
					endif;
					if ( get_field('featuredbannerimage'.$num)) :
						?>
						<div class="fbanner-wrapper">
						<?php
						$image = get_field('featuredbannerimage'.$num);
						$size = 'large'; // (thumbnail, medium, large, full or custom size)
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
						</div>
						<?php
					endif;
				endfor;
			endif;
			?>

				
			</div>
		</section>
		<!-- Section: Middle Banner -->
		<?php 
		get_template_part( 'template-parts/content', 'sns' );
		?>
		<!-- Section: お知らせ -->
		<section class='section-news'>
			<h2><?php esc_html_e('最新のお知らせ','project_nc');?></h2>
			<div class='news-wrapper'>
				<ul>
				<?php
				$arg = array(
					'post_type' => 'post',
					'posts_per_page' => 3	//default 10
				);
				$blog_query = new WP_Query($arg);

				if ($blog_query -> have_posts()) {
					while ($blog_query -> have_posts()) {
						$blog_query -> the_post();
						// output
						$publishedData = get_the_date();
						?>
						<li class='news-item'>
							<a href="<?php the_permalink(); ?>" class='remove_link_style link-text'>
								<div class='news-title'>
									<div class='news-title-h3'>
									<h3><?php the_title(); ?></h3>
									<?php get_template_part('images/click');?>
									</div>
									<span><?php esc_html_e('投稿日','project_nc');?></span>
									<div class='publised-date'><?php echo $publishedData; ?></div>
								</div>
								<?php
								the_post_thumbnail(
									'portrait-blog'
								);
								?>
							</a>
						</li>
						<?php
					}
					wp_reset_postdata();
				}
				?>
				</ul>
				<a href="<?php echo esc_url(get_permalink(110)); ?>" class='remove_link_style link-text'><?php esc_html_e('お知らせ一覧','project_nc');?></a>
		</div>
		</section>
		<!-- Section: どんな人？ -->
		<section class='section-whois'>
			<?php
				if ( function_exists('get_field') ) :
					if ( get_field('who')) : ?>
						<h2><?php the_field( 'who' ); ?></h2>
					<?php endif;
					if ( get_field( 'whoisimage') ) :
						?>
						<img src="<?php the_field('whoisimage')?>" alt="an image of Nishiyama Chieko">
						<?php
					endif;
					for ( $i=1 ; $i <= 10 ; $i++) :
						
						if ($i < 10):
							$num = '0'.$i;
						else:
							$num = $i;
						endif;

						if ( get_field( 'sheis'.$num.'title' ) ) : ?>
							<article class='whois-item'>
							<h3><?php the_field( 'sheis'.$num.'title' ); ?></h3>
							<?php						
							if ( get_field( 'sheis'.$num ) ) :
								the_field( 'sheis'.$num );
							endif;
							
							?></article><?php
						endif;						
					endfor;

				endif;
			?>
		</section>

		<!-- Section: サポーター -->
		<section class='section-supporters'>
		<?php
				if ( function_exists('get_field') ) :
					if ( get_field('supporters')) : ?>
						<h2><?php the_field( 'supporters' ); ?></h2>
					<?php endif;

					for ( $i=1 ; $i <= 100 ; $i++) :
						
						if ($i < 10):
							$num = '0'.$i;
						else:
							$num = $i;
						endif;

						if ( get_field( 'supporter'.$num.'-name' ) ) : ?>
							<article class='supporter-item'>
							<p><?php the_field( 'supporter'.$num.'-name' ); ?></p>
							<?php						
							if ( get_field( 'supporter'.$num.'-desc' ) ) : ?>
								<p><?php the_field( 'supporter'.$num.'-desc' );?></p>
							<?php endif;
							
							?></article><?php
						endif;						
					endfor;

				endif;
			?>
			
		</section>

		</div>
	</main><!-- #main -->

<?php
get_footer();

?>