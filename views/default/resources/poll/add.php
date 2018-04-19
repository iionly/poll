<?php

$guid = elgg_extract('guid', $vars);

$form_vars = array('id' => 'poll-edit-form');


if ($guid) {
	$container = get_entity($guid);
	elgg_push_breadcrumb($container->name, 'poll/group/' . $container->guid);
} else {
	$container = elgg_get_logged_in_user_entity();
	elgg_push_breadcrumb($container->name, 'poll/owner/' . $container->username);
}

elgg_set_page_owner_guid($container->guid);

elgg_push_breadcrumb(elgg_echo('poll:add'));

$title = elgg_echo('poll:addpost');

$body_vars = array(
	'fd' => \Poll\Model::prepareEditBodyVars(),
	'container_guid' => $guid
);

$content = elgg_view_form("poll/edit", $form_vars, $body_vars);

$params = array(
	'title' => $title,
	'content' => $content,
	'filter' => ''
);

$body = elgg_view_layout('content', $params);

// Display page
echo elgg_view_page($title, $body);