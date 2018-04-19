<?php

elgg_register_rss_link();

$username = elgg_extract('username', $vars);
$container = get_user_by_username($username);
$container_guid = $container->guid;

$user = elgg_get_logged_in_user_entity();
$params = array();
$options = array(
	'type' => 'object',
	'subtype' => 'poll',
	'full_view' => false,
    'limit' => 15,
    'no_results' => elgg_echo('poll:none')
);


$container_entity = get_user($container_guid);

elgg_push_breadcrumb(elgg_echo('item:object:poll'), "poll/all");
elgg_push_breadcrumb($container_entity->name);

if ($user->guid == $container_guid) {
	$params['title'] = elgg_echo('poll:your');
	$params['filter_context'] = 'mine';
} else {
	$params['title'] = elgg_echo('poll:not_me', [$container_entity->name]);
	$params['filter_context'] = "";
}
$params['sidebar'] = elgg_view('poll/sidebar');

$poll_site_access = elgg_get_plugin_setting('site_access', 'poll');

$options['container_guid'] = $container_guid;
$params['content'] = elgg_list_entities($options);

if ((elgg_is_logged_in() && ($poll_site_access != 'admins')) || elgg_is_admin_logged_in()) {
	elgg_register_menu_item('title', array(
		'name' => 'add',
		'href' => "poll/add",
		'text' => elgg_echo('poll:add'),
		'link_class' => 'elgg-button elgg-button-action'
	));
}

$body = elgg_view_layout("content", $params);

echo elgg_view_page($params['title'],$body);