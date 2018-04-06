<?php

/**
 *
 * This file registers all of this plugin's 
 * specific Theme Settings, accessible from
 * Genesis > Site Contact Info.
 *
 * @package      WPS_Starter_Genesis_Child
 * @author       Travis Smith <travis@wpsmith.net>
 * @copyright    Copyright (c) 2012, Travis Smith
 * @license      <a href="http://opensource.org/licenses/gpl-2.0.php" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://opensource.org']);" rel="nofollow">http://opensource.org/licenses/gpl-2.0.php</a> GNU Public License
 * @since        1.0
 * @alter        1.1.2012
 *
 */
 
 
/**
 * Registers a new admin page, providing content and corresponding menu item
 * for the Child Theme Settings page.
 *
 * @package      WPS_Starter_Genesis_Child
 * @subpackage   Admin
 *
 * @since 1.0.0
 */
class UVASOMNAVBAR_Settings extends Genesis_Admin_Boxes {
	/**
	 * Create an admin menu item and settings page.
	 * 
	 * @since 1.0.0
	 */
	function __construct() {
		
		// Specify a unique page ID. 
		$page_id = 'uvasomnavbar';
		
		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => 'Top Bar Settings ',
				'menu_title'  => 'Top Bar Settings',
				'capability' => 'manage_options',
			)
		);
		
		// Set up page options. These are optional, so only uncomment if you want to change the defaults
		$page_ops = array(
		//	'screen_icon'       => array( 'custom' => WPS_ADMIN_IMAGES . '/staff_32x32.png' ),
			'screen_icon'       => 'options-general',
		//	'save_button_text'  => 'Save Settings',
		//	'reset_button_text' => 'Reset Settings',
		//	'save_notice_text'  => 'Settings saved.',
		//	'reset_notice_text' => 'Settings reset.',
		);		
		
		// Give it a unique settings field. 
		// You'll access them from genesis_get_option( 'option_name', CHILD_SETTINGS_FIELD );
		$settings_field = 'UVASOMNAVBAR_SETTINGS_FIELD';
		
		// Set the default values
		$default_settings = array(
			'site_cat' => 'home',
			'site_org' => 'som',
		);
		
		// Create the Admin Page
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		// Initialize the Sanitization Filter
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );
			
	}

	/** 
	 * Set up Sanitization Filters
	 *
	 * See /lib/classes/sanitization.php for all available filters.
	 *
	 * @since 1.0.0
	 */	
	function sanitization_filters() {
		genesis_add_option_filter( 'no_html', $this->settings_field, array(
			'site_cat',
			'site_org'
		) );
	}
	
	/**
	 * Register metaboxes on Child Theme Settings page
	 *
	 * @since 1.0.0
	 *
	 * @see Child_Theme_Settings::contact_information() Callback for contact information
	 */
	function metaboxes() {
		
		add_meta_box('navbar-settings', 'Site Settings', array( $this, 'navbar_meta_box' ), $this->pagehook, 'main', 'high');
		
	}
	
	/**
	 * Register contextual help on Child Theme Settings page
	 *
	 * @since 1.0.0
	 *
	 */
	function help( ) {	
		global $my_admin_page;
		$screen = get_current_screen();
		
		if ( $screen->id != $this->pagehook )
			return;
		
		$tab1_help = 
			'<h3>' . __( 'Organization' , '' ) . '</h3>' .
			'<p>' . __( 'Select which part of the UVA Health System this site is affiliated with.' , '' ) . '</p>';
		
		$tab2_help = 
			'<h3>' . __( 'Site Category' , '' ) . '</h3>' .
			'<p>' . __( 'There are four categories in the top bar for the School of Medicine. Pick which category this site should fall under. The selected category will be highlighted in the navigation bar. "UVA SOM Home" is reserved for the home, root site of the School of Medicine.' , '' ) . '</p>';
		
		$tab3_help = 
			'<h3>' . __( 'Include SOM Navigation Bar Checkbox' , '' ) . '</h3>' .
			'<p>' . __( 'In some cases, as with certain online publications, it is not necessary to include the full School of Medicine website navigation bar. In that case, leave this box unchecked. In most cases, this box should be checked to include the full School of Medicine navigation. If left unchecked, only the uppermost Health System navigation bar will load.' , '' ) . '</p>' .
		
		$screen->add_help_tab( 
			array(
				'id'	=> $this->pagehook . '-organization',
				'title'	=> __( 'Organization' , '' ),
				'content'	=> $tab1_help,
			) );
		$screen->add_help_tab( 
			array(
				'id'	=> $this->pagehook . '-category',
				'title'	=> __( 'Site Category' , '' ),
				'content'	=> $tab2_help,
			) );
		
		
		// Add Genesis Sidebar
		$screen->set_help_sidebar(
                '<p><strong>' . __( 'For more information:', '' ) . '</strong></p>'.
                '<p><a href="' . __( 'http://www.studiopress.com/support', '' ) . '" target="_blank" title="' . __( 'Support Forums', '' ) . '">' . __( 'Support Forums', '' ) . '</a></p>'.
                '<p><a href="' . __( 'http://www.studiopress.com/tutorials', '' ) . '" target="_blank" title="' . __( 'Genesis Tutorials', '' ) . '">' . __( 'Genesis Tutorials', '' ) . '</a></p>'.
                '<p><a href="' . __( 'http://dev.studiopress.com/', '' ) . '" target="_blank" title="' . __( 'Genesis Developer Docs', '' ) . '">' . __( 'Genesis Developer Docs', '' ) . '</a></p>'
        );
	}
	
	/**
	 * Callback for Contact Information metabox
	 *
	 * @since 1.0.0
	 *
	 * @see Child_Theme_Settings::metaboxes()
	 */
	function navbar_meta_box() {
		
/*set default ranges for quantities of articles in */
	$site_cats = array(
				'home' => 'UVA SOM Home',
				'education' => 'Education',
				'research' => 'Research',
				'departments' => 'Departments',
				'community' => 'Community'
				);
				
	$site_orgs = array(
				'som' => 'School of Medicine',
				'upg' => 'Physicians Group',
				'dual' => 'SOM and Physicians Group',
				'none' => 'None/Multiple Affiliations'
				);
//Display the form
?>

	<p><strong>Organization:</strong><br />
		<select name="<?php echo UVASOMNAVBAR_SETTINGS_FIELD; ?>[site_org]">
			<?php foreach ( $site_orgs as $type => $label ) : ?>
			<option value="<?php echo $type; ?>" <?php selected($type, $this->get_field_value( 'site_org')); ?>><?php _e($label, 'genesis'); ?></option>	
			<?php endforeach; ?>
		</select>
	</p>
    <p><strong>Site Category:</strong><br />
		<select name="<?php echo UVASOMNAVBAR_SETTINGS_FIELD; ?>[site_cat]">
			<?php foreach ( $site_cats as $type => $label ) : ?>
			<option value="<?php echo $type; ?>" <?php selected($type, $this->get_field_value( 'site_cat')); ?>><?php _e($label, 'genesis'); ?></option>	
			<?php endforeach; ?>
		</select>
	</p>
    
<?php
	}
}
add_action( 'genesis_admin_menu', 'uvasomnavbar_settings_menu' );
/**
 * Instantiate the class to create the menu.
 *
 * @since 1.8.0
 */
function uvasomnavbar_settings_menu() {

	new UVASOMNAVBAR_Settings;

}
