<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'fastwp_register_required_plugins');


function fastwp_register_required_plugins() {

    $plugins = array(

        array(
            'name'     => 'Kirki Customizer Framework',
            'slug'     => 'kirki',
            'required' => false,
        ),
    );

    $config = array(
        'id'           => 'fastwp',
        'default_path' => '',
        'menu'         => 'fastwp-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );

    tgmpa($plugins, $config);
}
