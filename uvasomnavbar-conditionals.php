<?php
function uvasomnavbar_is_uvasom_homepage() {
	$type = genesis_get_option('site_cat','UVASOMNAVBAR_SETTINGS_FIELD');
	if( $type == 'home' ) {
		return TRUE;
	} else {
		return FALSE;	
	}
}

function uvasomnavbar_is_uvasom_education() {
	$type = genesis_get_option('site_cat','UVASOMNAVBAR_SETTINGS_FIELD');
	if( $type == 'education' ) {
		return TRUE;
	} else {
		return FALSE;	
	}
}

function uvasomnavbar_is_uvasom_research() {
	$type = genesis_get_option('site_cat','UVASOMNAVBAR_SETTINGS_FIELD');
	if( $type == 'research' ) {
		return TRUE;
	} else {
		return FALSE;	
	}
}

function uvasomnavbar_is_uvasom_departments() {
	$type = genesis_get_option('site_cat','UVASOMNAVBAR_SETTINGS_FIELD');
	if( $type == 'departments' ) {
		return TRUE;
	} else {
		return FALSE;	
	}
}

function uvasomnavbar_is_uvasom_community() {
	$type = genesis_get_option('site_cat','UVASOMNAVBAR_SETTINGS_FIELD');
	if( $type == 'community' ) {
		return TRUE;
	} else {
		return FALSE;	
	}
}

?>