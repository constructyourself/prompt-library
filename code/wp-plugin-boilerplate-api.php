<?php
/*
Plugin Name: Boilerplate WordPress Plugin
Plugin URI: https://example.com/plugin
Description: A boilerplate WordPress plugin that exposes internal data as an API.
Version: 1.0.0
Author: Your Name
Author URI: https://example.com
License: GPLv2 or later
*/

// Define the namespace for the plugin.
namespace BoilerplatePlugin;

// Define the plugin class.
class Plugin {

    /**
     * The plugin constructor.
     */
    public function __construct() {
        // Register the plugin's hooks.
        add_action( 'plugins_loaded', array( $this, 'init' ) );
        add_action( 'rest_api_init', array( $this, 'register_api_endpoints' ) );
    }

    /**
     * Initialize the plugin.
     */
    public function init() {
        // Load the plugin's text domain.
        load_plugin_textdomain( 'boilerplate-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
     * Register the plugin's API endpoints.
     */
    public function register_api_endpoints() {
        // Register the endpoint for retrieving internal data.
        register_rest_route( 'boilerplate-plugin/v1', '/data', array(
            'methods' => 'GET',
            'callback' => array( $this, 'get_data' ),
        ) );
    }

    /**
     * Retrieve the plugin's internal data.
     *
     * @return array The plugin's internal data.
     */
    public function get_data() {
        // Replace this with the actual data you want to expose.
        return array(
            'message' => 'Hello, world!',
        );
    }
}

// Instantiate the plugin class.
new Plugin();
