<?php
namespace Fastwp\Support;

class Theme_Support {
    
    /**
     * Constructor to hook into WordPress actions
     */
    public function __construct() {
        add_action( 'init', [ $this, 'register_block_styles' ] );
        add_action( 'admin_init', [ $this, 'fastwp_add_editor_styles' ] );
        add_action( 'after_setup_theme', [ $this, 'add_block_support' ] );
        add_action( 'after_setup_theme', [ $this, 'add_responsive_embeds_support' ] );
        add_action( 'after_setup_theme', [ $this, 'add_align_wide_support' ] );
    }

    /**
     * Register block styles
     */
    public function register_block_styles() {
        register_block_style(
            'core/paragraph',
            array(
                'name'  => 'custom-style',
                'label' => __( 'Custom Style', 'fastwp' ),
            )
        );
    }

    /**
     * Register block patterns
     */
    public function register_block_patterns() {
        register_block_pattern(
            'fastwp/custom-pattern',
            array(
                'title'       => __( 'Custom Pattern', 'fastwp' ),
                'description' => _x( 'A custom block pattern', 'Block pattern description', 'fastwp' ),
                'content'     => "<!-- wp:paragraph --><p>" . __( 'Your custom content here.', 'fastwp' ) . "</p><!-- /wp:paragraph -->",
            )
        );
    }

    /**
     * Add block support
     */
    public function add_block_support() {
        add_theme_support( 'wp-block-styles' );
    }

    /**
     * Add responsive embeds support
     */
    public function add_responsive_embeds_support() {
        add_theme_support( 'responsive-embeds' );
    }

    /**
     * Add align wide support
     */
    public function add_align_wide_support() {
        add_theme_support( 'align-wide' );
    }

    /**
     * Add editor style support
     */
    function fastwp_add_editor_styles() {
        add_editor_style( 'editor-style.css' ); 
    }
}