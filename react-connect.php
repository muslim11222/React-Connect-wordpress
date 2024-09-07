<?php 


/**
 * Plugin name: react Connections
 * Description: This is react connection plugin
 * Url: http://react.org/plugins/react
 * 
 */
class rc_react_connect{
     public function __construct(){
          add_action('init', array($this, 'init'));
     }

     public function init(){
          add_action('admin_menu', array($this, 'admin_menu'));
          add_action('admin_enqueue_scripts', array($this, 'wp_enqueue_script'));
     }


     public function admin_menu() {
          add_menu_page(
               'Menu Settings',
               ' Menu Settings',
               'manage_options',
               'menu_settings',
               array($this, 'menu_settings'),
               'deshicons-admin-generic',
          );
     }

     public function menu_settings() {
          echo '<div id="wpbody"><div id="wpbody-content"><div id="react-admin-page"><h1> admin page </h1></div></div></div';
     }




     public function wp_enqueue_script($hook){
          if ( 'toplevel_page_menu_settings' != $hook ) {
               return;
          }
          $assets_file = include( plugin_dir_path(__FILE__) . 'build/index.asset.php');

          wp_enqueue_script('react_scripts', plugin_dir_url(__FILE__) . 'build/index.js', $assets_file['dependencies'], $assets_file['version'],true);
     }
}
new rc_react_connect();
