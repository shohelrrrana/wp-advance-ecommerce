<?php

/**
 * get nav menu items by menu location
 *
 * @param $location
 * @param array $args
 *
 * @return array|object
 */
function get_nav_menu_items_by_location ( $location, $args = [] ) {
	$menu_items = [];
	$locations  = get_nav_menu_locations();

	if ( array_key_exists( $location, $locations ) ) {
		$object     = wp_get_nav_menu_object( $locations[ $location ] );
		$menu_items = wp_get_nav_menu_items( $object->name, $args );
	}

	return $menu_items;
}

/**
 * Get child menu items by parent menu id
 *
 * @param $menu_array
 * @param $parent_id
 *
 * @return array|object
 */
function get_child_menu_items ( $menu_array, $parent_id ) {
	$child_menu_items = [];

	if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {
		foreach ( $menu_array as $menu ) {
			if ( intval( $menu->menu_item_parent ) === intval( $parent_id ) ) {
				array_push( $child_menu_items, $menu );
			}
		}
	}

	return $child_menu_items;
}

/**
 * Check current menu
 *
 * @param $menu_item
 *
 * @return boolean
 */
function is_current_menu ( $menu_item ) {
	if ( is_object( $menu_item ) && ! empty( $menu_item ) && ( intval( get_queried_object()->ID ) === intval( $menu_item->object_id ) ) ) {
		return true;
	}

	return false;
}
