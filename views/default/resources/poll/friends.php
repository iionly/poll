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
$friends = $container_entity->getFriends(array('limit' => false));

$options['container_guids'] = array();
foreach ($friends as $friend) {
	$options['container_guids'][] = $friend->getGUID();
}

$params['filter_context'] = 'friends';
$params['title'] = elgg_echo('poll:friends');

//no friends, show no_results
if ($options['container_guids']) {
	$params['content'] = elgg_list_entities($options);
}
else {
	$params['content'] = elgg_format_element('p', [
		'class' => 'elgg-no-results'
	], elgg_echo('poll:none'));
}


elgg_push_breadcrumb(elgg_echo('item:object:poll'), "poll/all");
elgg_push_breadcrumb($container_entity->name, "poll/owner/{$container_entity->username}");
elgg_push_breadcrumb(elgg_echo('friends'));

$poll_site_access = elgg_get_plugin_setting('site_access', 'poll');

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