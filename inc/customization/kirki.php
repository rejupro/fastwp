<?php

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

if ( class_exists('Kirki') ) {


	// Add Main Panel
	new \Kirki\Panel(
	'main_panel',
	[
		'priority'    => 40,
		'title'       => esc_html__( 'FastWP Theme Options', 'fastwp' ),
		'description' => esc_html__( 'My Panel Description.', 'fastwp' ),
	]);


	// Header Social Icons Option
	new \Kirki\Section(
	'icon_section',
	[
		'title'       => esc_html__( 'Header Icons', 'fastwp' ),
		'panel'       => 'main_panel',
		'priority'    => 1,
	]);
	new \Kirki\Field\Repeater(
	[
		'settings' => 'header_icons',
		'label'    => esc_html__( 'Header Icons', 'fastwp' ),
		'section'  => 'icon_section',
		'priority' => 10,
		'default'  => [
			[
				'icon_title'   => esc_html__( 'Facebook', 'fastwp' ),
				'link_text'   => esc_html__( 'fa fa-facebook', 'fastwp' ),
				'link_url'    => 'https://facebook.com',
				'link_target' => '_self',
			],
			[
				'icon_title'   => esc_html__( 'Twitter', 'fastwp' ),
				'link_text'   => esc_html__( 'fa fa-twitter', 'fastwp' ),
				'link_url'    => 'https://twitter.com',
				'link_target' => '_blank',
			],

		],
		'fields'   => [
			'icon_title'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Title', 'fastwp' ),
				'default'     => '',
			],
			'link_text'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Name', 'fastwp' ),
				'default'     => '',
			],
			'link_url'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon URL', 'fastwp' ),
				'default'     => '',
			],
			'link_target' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Link Target', 'fastwp' ),
				'default'     => '_self',
				'choices'     => [
					'_blank' => esc_html__( 'New Window', 'fastwp' ),
					'_self'  => esc_html__( 'Same Window', 'fastwp' ),
				],
			],
		],
	]);

	// Homepage Slider Option
	new \Kirki\Section(
	'slider_section',
	[
		'title'       => esc_html__( 'Homepage Slider', 'fastwp' ),
		'panel'       => 'main_panel',
		'priority'    => 2,
	]);

	new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'slider_switch',
		'label'       => esc_html__( 'Slider Enable Disable', 'fastwp' ),
		'section'     => 'slider_section',
		'default'     => 'off',
		'priority'    => 9,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fastwp' ),
			'off' => esc_html__( 'Disable', 'fastwp' ),
		],
		
	]);


	new \Kirki\Field\Repeater(
	[
		'settings' => 'slider_item',
		'label'    => esc_html__( 'Slider Option', 'fastwp' ),
		'section'  => 'slider_section',
		'priority' => 10,
		'active_callback'  => [
			[
				'setting'  => 'slider_switch',
				'operator' => '===',
				'value'    => true,
			],
		],
		'default'  => [
			[
				'slider_cat'   => esc_html__( 'Slider Category', 'fastwp' ),
				'slider_title'   => esc_html__( 'Please Update Slider Title', 'fastwp' ),
				'slider_url'    => '#',
				'slider_img' => ''
			],[
				'slider_cat'   => esc_html__( 'Slider Category', 'fastwp' ),
				'slider_title'   => esc_html__( 'Please Update Slider Title', 'fastwp' ),
				'slider_url'    => '#',
				'slider_img' => '',
			],

		],
		'fields'   => [
			'slider_cat'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Category', 'fastwp' ),
				'default'     => '',
			],
			'slider_title'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Title', 'fastwp' ),
				'default'     => '',
			],
			'slider_url'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Read More Url', 'fastwp' ),
				'default'     => '',
			],
			'slider_img' => [
				'type'        => 'image',
				'label'       => esc_html__( 'Upload Slider Image', 'fastwp' ),
				'description' => 'Add Slider Image (recommandation size 1920px * 600px)'
			],
		],
	]);

	// Blog Single Page Options
	new \Kirki\Section(
	'blogsingle_section',
	[
		'title'       => esc_html__( 'Blog Single', 'fastwp' ),
		'panel'       => 'main_panel',
		'priority'    => 3,
	]);
	new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'author_switch',
		'label'       => esc_html__( 'Author Option', 'fastwp' ),
		'description' => esc_html__( 'Single Page Author Option Enable Disable', 'fastwp'),
		'section'     => 'blogsingle_section',
		'default'     => 'off',
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fastwp' ),
			'off' => esc_html__( 'Disable', 'fastwp' ),
		],
	]);
	new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'related_post',
		'label'       => esc_html__( 'Related Post', 'fastwp' ),
		'description' => esc_html__( 'Single Page Related Post Enable Disable', 'fastwp'),
		'section'     => 'blogsingle_section',
		'default'     => 'off',
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'fastwp' ),
			'off' => esc_html__( 'Disable', 'fastwp' ),
		],
	]);

	// Footer Social Icons Option
	new \Kirki\Section(
	'footericon_section',
	[
		'title'       => esc_html__( 'Footer Icons', 'fastwp' ),
		'panel'       => 'main_panel',
		'priority'    => 10,
	]);
	new \Kirki\Field\Repeater(
	[
		'settings' => 'footer_icons',
		'label'    => esc_html__( 'Footer Icons', 'fastwp' ),
		'section'  => 'footericon_section',
		'priority' => 8,
		'default'  => [
			[
				'icon_title'   => esc_html__( 'Facebook', 'fastwp' ),
				'link_text'   => esc_html__( 'fa fa-facebook', 'fastwp' ),
				'link_url'    => 'https://facebook.com',
				'link_target' => '_self',
			],
			[
				'icon_title'   => esc_html__( 'Twitter', 'fastwp' ),
				'link_text'   => esc_html__( 'fa fa-twitter', 'fastwp' ),
				'link_url'    => 'https://twitter.com',
				'link_target' => '_blank',
			],

		],
		'fields'   => [
			'icon_title'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Title', 'fastwp' ),
				'default'     => '',
			],
			'link_text'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon Name', 'fastwp' ),
				'default'     => '',
			],
			'link_url'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon URL', 'fastwp' ),
				'default'     => '',
			],
			'link_target' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Link Target', 'fastwp' ),
				'default'     => '_self',
				'choices'     => [
					'_blank' => esc_html__( 'New Window', 'fastwp' ),
					'_self'  => esc_html__( 'Same Window', 'fastwp' ),
				],
			],
		],
	]);

	// Footer Copyright Text
	// Footer Social Icons Option
	new \Kirki\Section(
	'footer_copyright',
	[
		'title'       => esc_html__( 'Footer Copyright', 'fastwp' ),
		'panel'       => 'main_panel',
		'priority'    => 11,
	]);
	new \Kirki\Field\Textarea(
	[
		'settings'    => 'copyright_setting',
		'label'       => esc_html__( 'Footer Copyright', 'fastwp' ),
		'section'     => 'footer_copyright',
	]);


}

?>