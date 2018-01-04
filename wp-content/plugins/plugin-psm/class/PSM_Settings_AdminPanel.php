<?php


/**
 * Class PSM_Settings_Admin
 */
class PSM_Settings_AdminPanel{
    private $PSM_Settings_admin_menu;

    /**
     * Initialisation method of the class
     * First of all if this file is not loaded with ABSPATH, we remove access to this class
     * Then, we use the add_action to order wordpress to execute the following function PluginMenu
     */
    public function init()
    {
        defined( 'ABSPATH') or die ( 'Hey, you cant access to this file, you silly human !');
        add_action('admin_menu', array($this, 'PSM_Settings_menu'));
    }

    /**
     * This function create a menu (and submenu) for in wordpress admin
     */
    public function PSM_Settings_menu()
    {
        $this->PSM_Settings_admin_menu = add_menu_page(
            'PSM Settings title',
            'Réglages (PSM)',
            'manage_options',
            __FILE__,
            array($this, 'render_setting_page'),
            plugins_url('/assets/images/psm-logo-32.png',__DIR__)
        );

        //add_submenu_page(__FILE__, 'Custom', 'Custom', 'manage_options', __FILE__.'/custom', array($this, 'render_custom_page'));
        //Create a menu under the settings (réglages) menu
        //add_options_page('My Plugin', 'My Plugin', 'manage_options', __FILE__, array($this, 'render_options_page'));
    }

    /**
     * This function, called by PSM_Settings_admin_menu(), will load a php file with the forms, in order to manage the setting page
     */
    public function render_setting_page(){
        include_once(dirname(__FILE__) . '/../views/PSM_Settings_admin_view.php');
    }
}

$instance = new PSM_Settings_AdminPanel();
$instance->init();




