<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

get_header();
?>
<main class="site-main">
	<div class="container-fluid no-left-padding no-right-padding page-content">
		<!-- Container -->	
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-8">
					<div class="error-block">
						<span>404</span>
						<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fastwp' ); ?></h2>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fastwp' ); ?></p>
						<?php
							get_search_form();
						?>
					</div>
				</div>
			</div>
		</div><!-- Container /- -->
	</div>
</main>

<?php
get_footer();
