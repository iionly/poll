<?php

elgg_register_rss_link();

$container_guid = elgg_extract('guid', $vars);

$user = elgg_get_logged_in_user_entity();
$params = array();
$options = array(
	'type' => 'object',
	'subtype' => 'poll',
	'full_view' => false,
    'limit' => 15,
    'no_results' => elgg_echo('poll:none')
);

$group = get_entity($container_guid);
if (!elgg_instanceof($group, 'group') || !\Poll\Model::isEnabledForGroup($group)) {
	forward();
}
$crumbs_title = $group->name;
$params['title'] = elgg_echo('poll:group_poll:listing:title', [$crumbs_title]);
$params['filter'] = "";

// set breadcrumb
elgg_push_breadcrumb(elgg_echo('item:object:poll'), "poll/all");
elgg_push_breadcrumb($crumbs_title);

elgg_push_context('groups');

elgg_set_page_owner_guid($container_guid);
group_gatekeeper();

$options['container_guid'] = $container_guid;
$params['content'] = elgg_list_entities($options);

if (elgg_get_page_owner_entity()->canWriteToContainer($user->guid)){
    elgg_register_menu_item('title', array(
		'name' => 'add',
		'href' => "poll/add/".$container_guid,
		'text' => elgg_echo('poll:add'),
		'link_class' => 'elgg-button elgg-button-action'
	));
}

$body = elgg_view_layout("content", $params);

echo elgg_view_page($params['title'],$body);