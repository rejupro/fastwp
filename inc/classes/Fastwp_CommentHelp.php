<?php

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

function Fastwp_CommentHelp($comment, $args, $depth) {
	?>
    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent"  id="comment-<?php echo esc_attr( get_comment_ID() ); ?>">
		<div class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
					<b class="fn"><?php echo get_comment_author() ?></b>
				</div>
				<div class="comment-metadata">
					<span><?php printf(esc_html__('%1$s at %2$s' , 'fastwp'), get_comment_date(),  get_comment_time()) ?></span>											
				</div>
			</footer>
			<div class="comment-content">
				<p><?php echo esc_html(comment_text(), 'fastwp') ; ?></p>
			</div>
			<div class="reply">
				<i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>



	</li>


    <?php
}
