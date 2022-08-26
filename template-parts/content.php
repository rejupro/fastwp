<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

?>

<?php 
	if(is_single()) :
?>

<article class="type-post" id="postid-<?php echo get_the_ID(); ?>">
	<div class="entry-cover">
		<?php
			the_post_thumbnail();
		?>
	</div>
	<div class="entry-content">
		<div class="entry-header">	
			

			<?php
			$fastwp_categories = get_the_category();
			$fastwp_output = '';
			if ( ! empty( $fastwp_categories ) ) {
			foreach( $fastwp_categories as $category ) {
			    $fastwp_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
			}
			
			}
			?>
			<span class="post-category"><?php echo trim( $fastwp_output); ?></span>
			<h3 class="entry-title"><?php the_title(); ?></h3>
			<div class="post-meta">
				<span class="byline">by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>
				<span class="post-date"><?php echo get_the_date();?></span>
			</div>
		</div>								
		
		<?php the_content(); ?>


		<?php
			$fastwp_post_tags = get_the_tags();
			if($fastwp_post_tags) :
		?>
		<div class="entry-footer">
			<div class="tags">

				<?php
					
					foreach($fastwp_post_tags as $single_tag) :
				?>

				<a href="<?php echo get_tag_link( $single_tag->term_id ) ?>" title="<?php echo $single_tag->name ; ?>"># <?php echo $single_tag->name ; ?></a>

				<?php endforeach;?>

			</div>
		</div>
		<?php endif; ?>
	</div>
</article>
<!-- About Author -->
<?php if(get_theme_mod('author_switch')) : ?>
<div class="about-author-box">
	<div class="author">
		<i><img src="<?php echo get_avatar_url(get_the_author_meta( 'ID' ), ['size' => '64']);  ?>" alt="avatar"></i>
		<h4><?php the_author(); ?></h4>
		<p><?php echo the_author_meta('description') ?></p>
	</div>
</div>  
<?php endif; ?>
<!-- About Author /- -->

<?php
	$fastwp_post_id = get_the_ID();
	$fastwp_related = get_posts( 
	    array( 
	        'category__in' => wp_get_post_categories( $fastwp_post_id ), 
	        'post__not_in' => array( $fastwp_post_id ) 
	    ) 
	);
	if($fastwp_related && get_theme_mod('related_post')) :
?>
	
<!-- Related Post -->
<div class="related-post">
	<h3>You May Also Like</h3>

	<div class="related-post-block">

		<?php 
			 
		    foreach( $fastwp_related as $post ) { 
		    	setup_postdata($post); ?>
		        <div class="related-post-box">
					<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>
		    <?php
		    wp_reset_postdata();
			}

		?>

	</div>
</div>
<?php endif; ?>
<!-- Related Post /- -->

<?php else: ?>

<div class="blog-paralle">
	<div class="type-post <?php if(!has_post_thumbnail()) : echo "no_thumbnail"; endif;  ?>">
		<div class="entry-cover">
			<?php
				$data = wp_get_archives( array( 'type' => get_the_date()) );
			?>
			<div class="post-meta">
				<span class="byline">by <?php the_author(); ?></span>
				<span class="post-date"><?php echo get_the_date();?></span>
			</div>
			<a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a>
		</div>
		<div class="entry-content">
			<div class="entry-header">	
				<?php
				$fastwp_category = get_the_category();
				$fastwp_caturl = esc_url(get_category_link($fastwp_category['0']->term_id));
				?>
				<span class="post-category"><a href="<?php echo $fastwp_caturl ; ?>" title="Technology"><?php echo $fastwp_category['0']->name ?></a></span>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>	
			<?php if(!has_post_thumbnail()) : ?>
				<div class="post-authordet">
					<ul>
				        <li><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?> </a>
				        </li>
				        <li><i class="fa fa-comment"></i><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
				        <li><i class="fa fa-calendar"></i> <span> on <?php echo get_the_date();?> </span></li>
				      </ul>
				</div>
			<?php endif; ?>							
			<p><?php echo wp_trim_words(get_the_content(), 15, '...');?></p>
			<a href="<?php the_permalink(); ?>" title="Read More">Read More</a>
		</div>
	</div>
</div>

<?php endif ?>
