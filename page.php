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
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

get_header();
?>
<main class="site-main">
	<!-- Page Content -->
	<div class="container-fluid no-left-padding no-right-padding page-content">
		<!-- container -->	
		<div class="container">
			<!-- Row -->
			<div class="row">
				<div class="col-lg-8 content-area">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-4 theme-widget-area">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>			
	</div>	
</main><!-- #main -->
<?php
get_footer();
