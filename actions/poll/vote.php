<?php
/**
 * Elgg Poll plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 */

// Get input data
$response = get_input('response');
$guid = get_input('guid');

//get the poll entity
$poll = get_entity($guid);

if (!$poll instanceof Poll) {
	register_error(elgg_echo('poll:notfound'));
	forward(REFERER);
}

// Make sure the response isn't blank
if (empty($response)) {
	register_error(elgg_echo("poll:novote"));
	forward(REFERER);
}

$user_guid = elgg_get_logged_in_user_guid();

// check to see if this user has already voted
$vote = elgg_get_annotations(array(
	'annotation_name' => 'vote',
	'annotation_owner_guid' => $user_guid,
	'guid' => $guid
));

if ($vote) {
	register_error(elgg_echo('poll:alreadyvoted'));
	forward(REFERER);
}

// add vote as an annotation
$poll->annotate('vote', $response, $poll->access_id);

// Add to river
$poll_vote_in_river = elgg_get_plugin_setting('vote_in_river', 'poll');
if ($poll_vote_in_river != 'no') {
	elgg_create_river_item(array(
		'view' => 'river/object/poll/vote',
		'action_type' => 'vote',
		'subject_guid' => $user_guid,
		'object_guid' => $poll->guid,
	));
}

if (get_input('callback')) {
	echo elgg_view('poll/poll_widget_content', array('entity' => $poll));
}

// Success message
system_message(elgg_echo("poll:responded"));

// Forward to the poll page
forward($poll->getUrl());
