<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="type-post <?php if(!has_post_thumbnail()) : echo "no_thumbnail"; endif; ?>">
		<div class="entry-cover">
			<?php
				$data = wp_get_archives( array( 'type' => get_the_date()) );
			?>
			<div class="post-meta">
				<span class="post-date"><?php echo fastwp_posted_by();?></span>
				<span class="byline"> <?php echo get_the_date(); ?></span>
			</div>
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_post_thumbnail(); ?></a>
		</div>
		<div class="entry-content">
			<div class="entry-header">
				<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</div>

			<?php if(!has_post_thumbnail()) : ?>
				<div class="post-authordet">
					<ul>
				        <li><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?> </a>
				        </li>
				        <li><i class="fa fa-calendar"></i> <span> on <?php echo get_the_date();?> </span></li>
				      </ul>
				</div>
			<?php endif; ?>

			<p><?php echo wp_trim_words(get_the_content(), 15, '...') ?></p>
			<a href="<?php the_permalink(); ?>" title="Read More">Read More</a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->