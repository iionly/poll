<?php

elgg_require_js('elgg/poll/poll');

$guid = elgg_extract('guid', $vars);

$poll = get_entity($guid);
if ($poll instanceof Poll) {
	// Set the page owner
	$page_owner = $poll->getContainerEntity();
	elgg_set_page_owner_guid($page_owner->guid);
	$title =  $poll->title;
	$content = elgg_view_entity($poll, array('full_view' => true));

	$allow_poll_reset = elgg_get_plugin_setting('allow_poll_reset', 'poll');
	if (elgg_is_admin_logged_in() || ($allow_poll_reset == 'yes' && $poll->canEdit())) {
		elgg_register_menu_item('title', array(
			'name' => 'poll_reset',
			'href' => elgg_get_site_url() . 'action/poll/reset?guid=' . $guid,
			'text' => elgg_echo('poll:poll_reset'),
			'title' => elgg_echo('poll:poll_reset_description'),
			'confirm' => elgg_echo('poll:poll_reset_confirmation'),
			'link_class' => 'elgg-menu-content elgg-button elgg-button-action'
		));
	}

	//check to see if comments are on
	if ($poll->comments_on != 'Off') {
		$content .= elgg_view_comments($poll);
	}

	elgg_push_breadcrumb(elgg_echo('item:object:poll'), "poll/all");
	if (elgg_instanceof($page_owner,'user')) {
		elgg_push_breadcrumb($page_owner->name, "poll/owner/{$page_owner->username}");
	} else {
		elgg_push_breadcrumb($page_owner->name, "poll/group/{$page_owner->guid}");
    }
    
    elgg_push_breadcrumb($poll->title);
} else {
	// Display the 'post not found' page instead
	$title = elgg_echo("poll:notfound");
	$content = elgg_view("poll/notfound");
	elgg_push_breadcrumb($title);
}

$params = array('title' =>$title, 'content' => $content, 'filter' => '');
$body = elgg_view_layout('content', $params);

// Display page
echo elgg_view_page($title, $body);