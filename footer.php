<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

?>
</div>
<!-- Footer Main -->
<footer class="container-fluid no-left-padding no-right-padding footer-main">
	<!-- Container -->
	<div class="container">
		<?php 
			$fastwp_icons = get_theme_mod('footer_icons');
			if ( $fastwp_icons ) : 
		?>
		<ul class="ftr-social">
			<?php
				foreach ( $fastwp_icons as $single ) :
			?>
			<li><a href="<?php echo esc_url($single['link_url']); ?>" title="<?php echo $single['icon_title']; ?>" target="<?php echo $single['link_target'] ; ?>"><i class="<?php echo esc_attr($single['link_text']); ?>"></i><?php echo $single['icon_title']; ?></a></li>
			<?php endforeach ;?>
		</ul>
		<?php  endif; ?>
		<div class="copyright">
			<p>
				<?php
					if ( get_theme_mod('copyright_setting') ) {
						echo esc_textarea(get_theme_mod('copyright_setting'));
					}else {
						echo esc_html( 'Copyright @ 2022 FastWP' );
					}
				?>
			</p>
		</div>
	</div><!-- Container /- -->
</footer><!-- Footer Main /- -->
<?php wp_footer(); ?>

</body>
</html>
