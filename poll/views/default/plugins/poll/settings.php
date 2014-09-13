<?php
$group_options = array(' '.elgg_echo('poll:settings:group_poll_default')=>'yes_default',
	' '.elgg_echo('poll:settings:group_poll_not_default')=>'yes_not_default',
	' '.elgg_echo('poll:settings:no')=>'no'
);
$yn_options = array(
	' '.elgg_echo('poll:settings:yes') => 'yes',
	' '.elgg_echo('poll:settings:no') => 'no'
);

// check if there are still polls with the former response data structure and offer upgrade if there are any
$old_polls_count = elgg_get_entities_from_metadata(array(
	'type' => 'object',
	'subtype' => 'poll',
	'metadata_name' => 'responses',
	'count' => true
));

$body = '';

if ($old_polls_count > 0) {
	$ts = time ();
	$token = generate_action_token ( $ts );

	$body .= elgg_echo('poll:convert:description', array($old_polls_count))."<br><br>";
	$body .= elgg_view("output/confirmlink", array(
		'href' => elgg_get_site_url() . "action/poll/convert?__elgg_token=$token&__elgg_ts=$ts",
		'text' => elgg_echo('poll:convert'),
		'confirm' => elgg_echo('poll:convert:confirm'),
		'class' => 'elgg-button elgg-button-action'
	));
	$body .= "<br><br>";
}

$poll_send_notification = elgg_get_plugin_setting('send_notification', 'poll');
if (!$poll_send_notification) {
	$poll_send_notification = 'yes';
}
$body .= elgg_echo('poll:settings:send_notification:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[send_notification]', 'value' => $poll_send_notification, 'options' => $yn_options));
$body .= '<br />';


$poll_create_in_river = elgg_get_plugin_setting('create_in_river', 'poll');
if (!$poll_create_in_river) {
	$poll_create_in_river = 'yes';
}
$body .= elgg_echo('poll:settings:create_in_river:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[create_in_river]', 'value' => $poll_create_in_river, 'options' => $yn_options));
$body .= '<br />';


$poll_vote_in_river = elgg_get_plugin_setting('vote_in_river', 'poll');
if (!$poll_vote_in_river) {
	$poll_vote_in_river = 'yes';
}
$body .= elgg_echo('poll:settings:vote_in_river:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[vote_in_river]', 'value' => $poll_vote_in_river, 'options' => $yn_options));
$body .= '<br />';


$poll_group_poll = elgg_get_plugin_setting('group_poll', 'poll');
if (!$poll_group_poll) {
	$poll_group_poll = 'yes_default';
}
$body .= elgg_echo('poll:settings:group:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[group_poll]', 'value' => $poll_group_poll, 'options' => $group_options));
$body .= '<br />';


$poll_group_access_options = array(' '.elgg_echo('poll:settings:group_access:admins') => 'admins',
	' '.elgg_echo('poll:settings:group_access:members') => 'members',
);
$poll_group_access = elgg_get_plugin_setting('group_access', 'poll');
if (!$poll_group_access) {
	$poll_group_access = 'admins';
}
$body .= elgg_echo('poll:settings:group_access:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[group_access]', 'value' => $poll_group_access, 'options' => $poll_group_access_options));
$body .= '<br />';


$poll_site_access_options = array(' '.elgg_echo('poll:settings:site_access:admins') => 'admins',
	' '.elgg_echo('poll:settings:site_access:all') => 'all',
);
$poll_site_access = elgg_get_plugin_setting('site_access', 'poll');
if (!$poll_site_access) {
	$poll_site_access = 'all';
}
$body .= elgg_echo('poll:settings:site_access:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[site_access]', 'value' => $poll_site_access, 'options' => $poll_site_access_options));
$body .= '<br />';


$poll_front_page = elgg_get_plugin_setting('front_page', 'poll');
if (!$poll_front_page) {
	$poll_front_page = 'no';
}
$body .= elgg_echo('poll:settings:front_page:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[front_page]', 'value' => $poll_front_page, 'options' => $yn_options));
$body .= '<br />';


$allow_close_date = elgg_get_plugin_setting('allow_close_date', 'poll');
if (!$allow_close_date) {
	$allow_close_date = 'no';
}
$body .= elgg_echo('poll:settings:allow_close_date:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[allow_close_date]', 'value' => $allow_close_date, 'options' => $yn_options));
$body .= '<br />';


$allow_open_poll = elgg_get_plugin_setting('allow_open_poll', 'poll');
if (!$allow_open_poll) {
	$allow_open_poll = 'no';
}
$body .= elgg_echo('poll:settings:allow_open_poll:title');
$body .= '<br />';
$body .= elgg_view('input/radio', array('name' => 'params[allow_open_poll]', 'value' => $allow_open_poll, 'options' => $yn_options));
$body .= '<br />';


echo $body;
