<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  data-offset="200" data-spy="scroll" data-target=".ownavigation">
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'fastwp'); ?></a>
		<!-- Loader -->
		<div id="site-loader" class="load-complete">
			<div class="loader">
				<div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
			</div>
		</div><!-- Loader /- -->
			
		<!-- Header Section -->
		<header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s1">
		
			<!-- SidePanel -->
			<div id="slidepanel-1" class="slidepanel">
				<!-- Top Header -->
				<div class="container-fluid no-right-padding no-left-padding top-header">
					<!-- Container -->
					<div class="container">	
						<div class="row">
							<div class="col-lg-4 col-6">
								<ul class="top-social">
									<?php

										$fastwp_icons = get_theme_mod('header_icons');
										if($fastwp_icons) : foreach($fastwp_icons as $icon) :

									?>
									<li><a href="<?php echo esc_url($icon['link_url']); ?>" title="<?php echo $icon['icon_title']; ?>" target="<?php echo $icon['link_target']; ?>"><i class="<?php echo esc_attr($icon['link_text']); ?>"></i></a></li>

									<?php endforeach; endif; ?>

								</ul>
							</div>
							<div class="col-lg-4 logo-block">
								<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo get_bloginfo('name');?>">
									<?php
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
										if(!empty($custom_logo_id)){
											?>
												<img src="<?php echo $image['0']?>">
											<?php
										}else{
											echo esc_html(get_bloginfo('name'), 'fastwp');
										}
									?>
								</a>
							</div>
							<div class="col-lg-4 col-6">
								<ul class="top-right user-info">
									<li><a href="#search-box" data-toggle="collapse" class="search collapsed" title="Search"><i class="fa fa-search sr-ic-open"></i><i class="fa fa-close sr-ic-close"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- Container /- -->
				</div><!-- Top Header /- -->				
			</div><!-- SidePanel /- -->
			
			<!-- Search Box -->
			<div class="search-box collapse" id="search-box">
				<div class="container">
				<form method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
					<div class="input-group">
						<input type="text" class="form-control" name="s" placeholder="Search..." required>
						<span class="input-group-btn">
							<button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
							<a href="#search-box" data-toggle="collapse" class="search collapsed" title="Search"><i class="fa fa-close sr-ic-close"></i></a>
						</span>
					</div>
				</form>
				</div>
			</div><!-- Search Box /- -->

			<!-- Menu Block -->
			<div class="container-fluid no-left-padding no-right-padding menu-block">
				<!-- Container -->
				<div class="container">				
					<nav class="navbar ownavigation navbar-expand-lg" id="site-navigation">
						<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo get_bloginfo('name');?>">
							<?php
								$fastwp_custom_logo_id = get_theme_mod( 'custom_logo' );
								$fastwp_image = wp_get_attachment_image_src( $fastwp_custom_logo_id , 'full' );
								if(!empty($fastwp_custom_logo_id)){
									?>
										<img src="<?php echo esc_url($fastwp_image['0']);?>" width="100px">
									<?php
								}else{
									echo get_bloginfo('name');
								}
							?>
						</a>
						<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fa fa-bars"></i>
						</button>
						<div class="collapse navbar-collapse" id="navbar1">
							<!-- Menu Functionnality -->
							<?php
								$fastwp_theme_location = 'primary_menu';
								if ( has_nav_menu($fastwp_theme_location) ) {
								wp_nav_menu(  array(
								    'menu_class'        => "navbar-nav",
								    'menu_id'           => "",
								    'container'         => "<div>", 
								    'container_class'   => "",
								    'container_id'      => "",
								    'theme_location'    => "primary_menu", 
							    	'walker'            => new Fastwp_Nav_Walker,
								) );
							} else {

									if(is_user_logged_in()) :
	                                ?>
	                                	<ul class="navbar-nav">
	                                		<li><a class="nav-link" title="Contact" href="<?php echo admin_url('nav-menus.php') ;?>">Add Menu</a></li>
	                                	</ul>	
	                                <?php endif ;
	                            }
							?>
						</div>
					</nav>
				</div><!-- Container /- -->
			</div><!-- Menu Block /- -->
			
		</header><!-- Header Section /- -->
		<div class="clearfix"></div>
	</div>
	<div class="main-container" id="primary">	
