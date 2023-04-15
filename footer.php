<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package project-nc
 */

?>

	<footer id="colophon" class="site-footer">
		<div class='footer-wrapper'>
			<nav class='footer-menu'>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header',
						'menu_id'        => 'header-menu',
					)
				);
				?>
			</nav>
			<div class="footer-contact">
				<?php
					if (is_page('14')===false) {
						?>
						<h4><?php esc_html_e('西山ちえこ事務所','project_nc');?></h4>
						<div class="contact-wrapper">
						<?php
						if (function_exists('get_field')) {
							if (get_field('address', 14)) {
								// just outputtinh the data, no html 
								echo '<div>';
								// get location svg icon
								get_template_part('images/location');
								echo '<p>';
								the_field('address', 14);
								echo '</p></div>';
							}
							if (get_field('email', 14)) {
								echo '<div><p>';
								// get location svg icon
								get_template_part('images/email');
								the_field('email', 14);
								echo '</p></div>';
							}
							if (get_field('phone', 14)) {
								echo '<div><p>';
								// get location svg icon
								get_template_part('images/phone');
								the_field('phone', 14);
								echo '</p></div>';
							}
						}?>
						</div> 
						<?php
					}
				?>
			</div><!-- .footer-contact -->
		</div>
		<p class='copyright'>Copyright Chieko Nishiyama 2023 ©</p>
		<p class='author'><?php esc_html_e('Created by ','project_nc');?><a href="https://makiko.dev/"><?php esc_html_e('Makiko Ono','project_nc');?></a></p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
