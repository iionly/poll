<?php
/*
 * Elgg Poll plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 *
 * add/edit action
 */

elgg_load_library('elgg:poll');
// start a new sticky form session in case of failure
elgg_make_sticky_form('poll');

// Get input data
$question = get_input('question');
$description = get_input('description');
$number_of_choices = (int) get_input('number_of_choices', 0);
$front_page = get_input('front_page');
$close_date = get_input('close_date');
$open_poll = (int)get_input('open_poll');
$tags = get_input('tags');
$access_id = get_input('access_id');
$container_guid = get_input('container_guid');
$guid = get_input('guid');

//get response choices
$count = 0;
$new_choices = array();
if ($number_of_choices) {
	for($i=0; $i<$number_of_choices; $i++) {
		$text = get_input('choice_text_'.$i,'');
		if ($text) {
			$new_choices[] = $text;
			$count ++;
		}
	}
}

// Make sure the question and the response options aren't empty
if (empty($question) || ($count == 0)) {
	register_error(elgg_echo("poll:blank"));
	forward(REFERER);
}

$user = elgg_get_logged_in_user_entity();

// Check whether non-admins are allowed to create site-wide polls
$poll_site_access = elgg_get_plugin_setting('site_access', 'poll');
if ($poll_site_access == 'admins' && !$user->isAdmin()) {
	$container = get_entity($container_guid);

	// Regular users are allowed to create polls only inside groups
	if (!$container instanceof ElggGroup) {
		register_error(elgg_echo('poll:can_not_create'));

		elgg_clear_sticky_form('poll');

		forward('poll/all');
	}
}

if ($guid) {
	$new = false;

	// editing an existing poll
	$poll = get_entity($guid);

	if (!$poll instanceof Poll) {
		register_error(elgg_echo('poll:notfound'));
		forward(REFERER);
	}

	if (!$poll->canEdit()) {
		register_error(elgg_echo('poll:permission_error'));
		forward(REFERER);
	}

	// Success message
	$message = elgg_echo("poll:edited");
} else {
	$new = true;

	// Initialise a new Poll
	$poll = new Poll();

	// Set its owner to the current user
	$poll->owner_guid = $user->guid;
	$poll->container_guid = $container_guid;

	// Success message
	$message = elgg_echo("poll:added");
}

$poll->access_id = $access_id;
$poll->question = $question;
$poll->title = $question;
$poll->description = $description;
$poll->open_poll = $open_poll ? 1 : 0;
$poll->close_date = $close_date;
$poll->tags = string_to_tag_array($tags);

if (!$poll->save()) {
	register_error(elgg_echo("poll:error"));
	forward(REFERER);
}

$poll->setChoices($new_choices);

poll_manage_front_page($poll, $front_page);

elgg_clear_sticky_form('poll');

if ($new) {
	$poll_create_in_river = elgg_get_plugin_setting('create_in_river', 'poll');

	if ($poll_create_in_river != 'no') {
		elgg_create_river_item(array(
			'view' => 'river/object/poll/create',
			'action_type' => 'create',
			'subject_guid' => $user->guid,
			'object_guid' => $poll->guid,
		));
	}
}

system_message($message);

// Forward to the poll page
forward($poll->getURL());
