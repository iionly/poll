<?php

$guid = elgg_extract('guid', $vars);

$form_vars = array('id' => 'poll-edit-form');

$poll = get_entity($guid);

if (!$poll instanceof Poll) {
	register_error(elgg_echo('poll:not_found'));
	forward(REFERER);
}

if (!$poll->canEdit()) {
	register_error(elgg_echo('poll:permission_error'));
	forward(REFERER);
}

$container = $poll->getContainerEntity();

elgg_set_page_owner_guid($container->guid);

$title = elgg_echo('poll:editpost', array($poll->title));

$body_vars = array(
	'fd' => \Poll\Model::prepareEditBodyVars($poll),
	'entity' => $poll
);

if ($container instanceof ElggGroup) {
	elgg_push_breadcrumb($container->name, 'poll/group/' . $container->guid);
} else {
	elgg_push_breadcrumb($container->name, 'poll/owner/' . $container->username);
}

elgg_push_breadcrumb(elgg_echo("poll:edit"));

$content = elgg_view_form("poll/edit", $form_vars, $body_vars);

$params = array(
    'title' => $title,
	'content' => $content,
	'filter' => ''
);

$body = elgg_view_layout('content', $params);

// Display page
echo elgg_view_page($title, $body);