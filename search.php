<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
	<div class="container-fluid no-left-padding no-right-padding page-content search-result blog-paralle">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<!-- Content Area -->
				<div class="col-md-8 content-area">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'fastwp' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						// Pagination
			            the_posts_pagination(
			                array(
			                    'mid_size'  => 2,
			                    'prev_text' => esc_html__( '&#10094; Prev', 'fastwp' ),
			                    'next_text' => esc_html__( 'Next &#10095;', 'fastwp' ),
			                )
			            );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
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
