<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fastwp
 */



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
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );

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
