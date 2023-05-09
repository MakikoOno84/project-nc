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
<section class='content-snsfeed'>

	<div class='sns-wrapper'>
		<div class='sns-links'>
			<h2><?php esc_html_e('最新情報','project_nc');?></h2>
			<p><?php esc_html_e('SNSから西山ちえこの最新情報をチェック！','project_nc');?></p>
			<?php 
			$front_pg_id = 116;
			$arrayOfSNS = array('twitter','line','facebook','instagram');
			foreach ($arrayOfSNS as $sns ) {
				if ( function_exists('get_field') ) :
					if ( get_field($sns,$front_pg_id)) :
					?>
					<a href="
					<?php
						echo the_field( $sns,$front_pg_id );
					?>
					">
					<?php get_template_part('images/'.$sns);?>
					</a>
				<?php
					endif;
				endif;
			}
			?>
		</div>
		<div class='twitter'>
			<a class="twitter-timeline" data-width="400" data-height="500" href="https://twitter.com/nishiyamachi878?ref_src=twsrc%5Etfw">Tweets by nishiyamachi878</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
</section>
