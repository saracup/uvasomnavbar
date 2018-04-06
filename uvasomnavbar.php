<?php
/*
Plugin Name: UVA Health/School of Medicine Nav Bar for Genesis Framework
Plugin URI: http://technology.med.virginia.edu/digitalcommunications
Description: A top navigation bar that loads for WordPress sites based on the Genesis Framework.
Version: 1.0
Author: Cathy Finn-Derecki
Author URI: http://transparentuniversity.com
Copyright 2012  Cathy Finn-Derecki  (email : cad3r@virginia.edu)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*include file to determine site type***/
require_once( trailingslashit( get_template_directory() ) . 'lib/classes/class-genesis-admin.php');
require_once(WP_PLUGIN_DIR.'/uvasomnavbar/uvasomnavbar-conditionals.php' );
/*********add jquery for megamenu toggle **************/
function uvasomnavbar_scripts() {
	wp_enqueue_script( 'uvasom_togglemenuheader',plugins_url().'/uvasomnavbar/js/uvasom_ui_scripts.js',array('jquery'),'',true );
	wp_enqueue_script( 'uvasomnavbar_megamenus_js', plugins_url(). '/uvasomnavbar/js/uvasomnavbar_megamenus.js', array('jquery'), '', true );
	wp_enqueue_script( 'uvasomnavbar_hsmenu_js', plugins_url(). '/uvasomnavbar/js/uvasomnavbar_hsmenu.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'uvasomnavbar_scripts');
/*********load the plugin stylesheets*************/
function uvasomnavbarstylesheet()
{
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/uvasomnavbar/styles/uvasomnavbar.css"  />
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/uvasomnavbar/styles/print.css" media="print"  />
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/uvasomnavbar/styles/ie.css"  />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/uvasomnavbar/styles/ie7.css"  />
<![endif]-->
<!--[if gte IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/uvasomnavbar/styles/ie9.css"  />
<![endif]-->
<?php
}
add_action( 'wp_head', 'uvasomnavbarstylesheet',14 );
/**************add close box to the mega menu div*********/
function uvasom_closebox()
{
?>
<a class="closebox" href="#">close <img class="closebox" src="<?php echo plugins_url();?>/uvasomnavbar/images/closebox_blue.png" /></a>
<?php
}
/**************The navbar for the healthsystem links**********/
function uvahsnavbar(){
	?>
<!--start health System menu-->
<nav class="nav" id="nav-global">
    <ul class="menu global">
    <li><a class="first-child" href="http://uvahealth.com">Patient Services</a></li>
        <li><a href="http://healthsystem.virginia.edu">Medical Center</a></li>
        <li><a href="http://upg.virginia.edu">Physicians Group</a></li>
        <li><a href="http://hsl.virginia.edu/">Claude Moore Library</a></li>
        <li><a href="http://nursing.virginia.edu">School of Nursing</a></li>
        <li><a class="active selected" href="http://med.virginia.edu">School of Medicine</a></li>
        <li><a class="last-child" href="http://virginia.edu">UVA</a></li>
    </ul>
</nav>
<!--end health System menu-->
<?php }

///Determine if this is the UVA SOM Home page which positions the healthsystem navbar differently

/*************Display the navbar**************/
function uvasomnavbar()
{
?>
<!--start topbar -->
<?php
$uvasomtheme = get_stylesheet();
if ($uvasomtheme === 'uvasom_parallax') {$parallax='class="uvasom_parallax"';} else {$parallax='';}
if(($uvasomtheme === 'uvasom_news')||($uvasomtheme === 'uvasom_bims')||($uvasomtheme === 'uvasom_bims_html5')||($uvasomtheme === 'uvasom_clinical')) {
uvahsnavbar();
}
?>
<!--end health System menu-->
<!--start health System mobile button-->
        <!--<div id="menubutton"><a href="#" class="menubutton no-ext-icon"></a></div>-->
<!--end health System mobile button-->


<div id="healthsystem">
<!--start health system inner-->
<?php
if($uvasomtheme === 'uvasom_parallax') {
uvahsnavbar();
}
?>
<div id="healthsystem-inner">
<!--start UVA SOM logo-->
    <div id="somlogo"><h1><a href="https://med.virginia.edu" class="no_icon">University of Virginia School of Medicine</a></h1></div>
<!--end UVA logo-->
<!--start UVA SOM mobile button-->
        <div id="menubutton2"><a href="#" class="menubutton no-ext-icon"></a></div>
<!--end UVA SOM mobile buttons-->

<!--start UVA SOM search -->
<!--start UVA SOM mobile search button-->
        <div id="menubutton3"><a href="#" class="menubutton no-ext-icon"></a></div>
<!--end UVA SOM mobile search button-->
<?php
if(function_exists('uvasom_sitesearch_form')&&($uvasomtheme != 'uvasom_parallax')){
uvasom_sitesearch_form('sitewide');
}
?>
<!--end UVA SOM search -->

<div id="hs-menu-link" <?php echo $parallax;?>>
<a href="#"><span class="uva">UVA </span><span class="larger">Health System</span><span class="mobile">HS</span></a><span id="hs-menu-arrow"></span>

</div>
    <!--end health system inner-->
    </div>
<!--end top bar -->
</div>
<!--start UVA SOM menu-->
        <div id="uvasom-menu">
            <ul id="uvasom-menu-top-bar" class="menu">
              <li id="education" class="education menu-item no-ext-icon"><a href="#" class="no_icon first box education">Education</a></li>
              <li id="research" class="research menu-item no-ext-icon"><a href="#" class="no_icon box research">Research</a></li>
              <li id="departments" class="departments menu-item no-ext-icon"><a href="#" class="no_icon box departments">Departments</a></li>
              <li id="community" class="community menu-item no-ext-icon"><a href="#" class="no_icon last box community">Community</a></li>
            </ul>
        </div>
<!--end UVA SOM menu-->
<!--megamenus -->
<div id="uvasom_megamenu" class="uvasom_sub_menu">
</div>
<!--end megamenus -->
<?php
}
add_action('genesis_before','uvasomnavbar',2);
//********End of School of Medicine Top Navigation ***********//
?>
