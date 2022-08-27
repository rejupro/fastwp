<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

get_header();
?>
<main class="site-main">

	<!-- HomePage Slider -->
	<?php do_action('fastwp_slider'); ?>
	
	<!-- Page Content -->
	<div class="container-fluid no-left-padding no-right-padding page-content">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<div class="content-area col-md-8">

						<!-- Post Dynamic -->
						<!-- Start the Loop. -->
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							/*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
					 	endwhile; ?>
					<?php
                    the_posts_pagination(
                        array(
                            'mid_size'  => 2,
                            'prev_text' => esc_html__( '&#10094; Prev', 'fastwp' ),
                            'next_text' => esc_html__( 'Next &#10095;', 'fastwp' ),
                        )
                    ); ?>
					<?php else : ?>
						<div class="content-area col-md-8">
							<p> <?php esc_html_e( 'There have no Post', 'fastwp' ); ?></p>
						</div>
					<?php endif;?>
				</div>
				<div class="col-md-4 theme-widget-area">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div><!-- Container /- -->
	</div><!-- Page Content /- -->
</main>

<?php
get_footer();
