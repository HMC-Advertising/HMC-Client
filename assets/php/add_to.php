<?php
add_action( 'tgmpa_register', 'glamo_register_required_plugins' );
/**
 * Register required plugins
 * @return void
 * @since  1.0
 */
function glamo_register_required_plugins()
{
    $plugins = array(
        array(
            'name'               => 'Meta Box',
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        // Premium extensions
        array(
            'name'               => 'Meta Box Tabs',
            'slug'               => 'meta-box-tabs',
            'source'             => plugins_url( 'plugins/meta-box-tabs.zip'),
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
        // You can add more plugins here if you want
    );
    $config  = array(
        'domain'           => 'glamo',
        'default_path'     => '',
        'parent_menu_slug' => 'themes.php',
        'parent_url_slug'  => 'themes.php',
        'menu'             => 'install-required-plugins',
        'has_notices'      => true,
        'is_automatic'     => false,
        'message'          => '',
        'strings'          => array(
            'page_title'                      => __( 'Install Required Plugins', 'glamo' ),
            'menu_title'                      => __( 'Install Plugins', 'glamo' ),
            'installing'                      => __( 'Installing Plugin: %s', 'glamo' ),
            'oops'                            => __( 'Something went wrong with the plugin API.', 'glamo' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'glamo' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'glamo' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'glamo' ),
            'nag_type'                        => 'updated',
        )
    );
    tgmpa( $plugins, $config );
}