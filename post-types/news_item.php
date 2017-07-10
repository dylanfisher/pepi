<?php

function news_item_init() {
	register_post_type( 'news_item', array(
		'labels'            => array(
			'name'                => __( 'News Items', 'pepi' ),
			'singular_name'       => __( 'News Item', 'pepi' ),
			'all_items'           => __( 'All News Items', 'pepi' ),
			'new_item'            => __( 'New News Item', 'pepi' ),
			'add_new'             => __( 'Add New', 'pepi' ),
			'add_new_item'        => __( 'Add New News Item', 'pepi' ),
			'edit_item'           => __( 'Edit News Item', 'pepi' ),
			'view_item'           => __( 'View News Item', 'pepi' ),
			'search_items'        => __( 'Search News Items', 'pepi' ),
			'not_found'           => __( 'No News Items found', 'pepi' ),
			'not_found_in_trash'  => __( 'No News Items found in trash', 'pepi' ),
			'parent_item_colon'   => __( 'Parent News Item', 'pepi' ),
			'menu_name'           => __( 'News Items', 'pepi' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-admin-post',
		'show_in_rest'      => true,
		'rest_base'         => 'news_item',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'news_item_init' );

function news_item_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['news_item'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('News Item updated. <a target="_blank" href="%s">View News Item</a>', 'pepi'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'pepi'),
		3 => __('Custom field deleted.', 'pepi'),
		4 => __('News Item updated.', 'pepi'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('News Item restored to revision from %s', 'pepi'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('News Item published. <a href="%s">View News Item</a>', 'pepi'), esc_url( $permalink ) ),
		7 => __('News Item saved.', 'pepi'),
		8 => sprintf( __('News Item submitted. <a target="_blank" href="%s">Preview News Item</a>', 'pepi'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('News Item scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview News Item</a>', 'pepi'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('News Item draft updated. <a target="_blank" href="%s">Preview News Item</a>', 'pepi'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'news_item_updated_messages' );
