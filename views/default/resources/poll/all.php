<?php

elgg_register_rss_link();

$user = elgg_get_logged_in_user_entity();
$params = array();
$options = array(
	'type' => 'object',
	'subtype' => 'poll',
	'full_view' => false,
    'limit' => 15,
    'no_results' => elgg_echo('poll:none')
);

$poll_site_access = elgg_get_plugin_setting('site_access', 'poll');

if ((elgg_is_logged_in() && ($poll_site_access != 'admins')) || elgg_is_admin_logged_in()) {
	elgg_register_menu_item('title', array(
		'name' => 'add',
		'href' => "poll/add",
		'text' => elgg_echo('poll:add'),
		'link_class' => 'elgg-button elgg-button-action'
	));
}

elgg_push_breadcrumb(elgg_echo('item:object:poll'), "poll/all");

$body = elgg_view_layout("content", [
    'filter_context' => 'all',
    'title' => elgg_echo('item:object:poll'),
	'sidebar' => elgg_view('poll/sidebar'),
	'content' => elgg_list_entities($options)
]);

echo elgg_view_page($params['title'],$body);