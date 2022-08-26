<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
	<div class="container-fluid no-left-padding no-right-padding page-content blog-single">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<!-- Content Area -->
				<div class="col-md-8 content-area">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'fastwp' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'fastwp' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-4 theme-widget-area">
					<?php
						get_sidebar();
					?>
				</div>
			</div>
		</div>
	</div>
</main>				

<?php
get_footer();

