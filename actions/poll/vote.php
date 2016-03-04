<?php
/**
 * Elgg Poll plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 */

// Get input data
$response = get_input('response');
if (!is_array($response)) {
	$response=array($response);
}
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

//  Make sure the response have not more than the maximum votes

if (count($response) > $poll->multiple_choice) {
	register_error(elgg_echo("poll:multiple_choice_hint",array($poll->multiple_choice)));
	forward(REFERER);
}

$user = elgg_get_logged_in_user_entity();

// Check if user has already voted
if ($poll->hasVoted($user)) {
	register_error(elgg_echo('poll:alreadyvoted'));
	forward(REFERER);
}

// add vote as an annotation
foreach($response as $vote){
	$poll->annotate('vote', $vote, $poll->access_id);
}

// Add to river
$poll_vote_in_river = elgg_get_plugin_setting('vote_in_river', 'poll');
if ($poll_vote_in_river != 'no') {
	elgg_create_river_item(array(
		'view' => 'river/object/poll/vote',
		'action_type' => 'vote',
		'subject_guid' => $user->guid,
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
