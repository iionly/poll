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
$close_date = (int)get_input('close_date');
$open_poll = (int)get_input('open_poll');
$tags = get_input('tags');
$access_id = get_input('access_id');
$container_guid = get_input('container_guid');
$guid = get_input('guid');

// Convert string of tags into a preformatted array
$tagarray = string_to_tag_array($tags);

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

$user = elgg_get_logged_in_user_entity();

if ($guid) {
	// editing an existing poll
	$poll = get_entity($guid);
	if (elgg_instanceof($poll, 'object', 'poll') && $poll->canEdit()) {
		$container_guid = $poll->container_guid;
		// Make sure the question / responses aren't blank
		if (empty($question) || ($count == 0)) {
			register_error(elgg_echo("poll:blank"));
			forward("poll/edit/".$guid);
			exit;
		// Otherwise, save the poll
		} else {
			$poll->access_id = $access_id;

			if(!empty($description)) {
				$poll->description = $description;
			} else {
				if (!empty($poll->description)) {
					$poll->deleteMetadata('description');
				}
			}

			$poll->question = $question;
			$poll->title = $question;

			if (!$poll->save()) {
				register_error(elgg_echo("poll:error"));
				if ($container_guid) {
					forward("poll/add/".$container_guid);
				} else {
					forward("poll/add");
				}
				exit;
			}

			elgg_clear_sticky_form('poll');

			poll_delete_choices($poll);
			poll_add_choices($poll, $new_choices);
			poll_manage_front_page($poll, $front_page);

			if (is_array($tagarray)) {
				$poll->tags = $tagarray;
			}

			if ($close_date) {
				$poll->close_date = $close_date;
			} else {
				if (!empty($poll->close_date)) {
					$poll->deleteMetadata('close_date');
				}
			}

			$poll->open_poll = (!$open_poll) ? 0 : 1;

			// Success message
			system_message(elgg_echo("poll:edited"));
		}
	}
} else {
	if (!$container_guid) {
		$poll_site_access = elgg_get_plugin_setting('site_access', 'poll');
		$allowed = (elgg_is_logged_in() && ($poll_site_access != 'admins')) || elgg_is_admin_logged_in();
		if (!$allowed) {
			register_error(elgg_echo('poll:can_not_create'));
			elgg_clear_sticky_form('poll');
			forward('poll/all');
			exit;
		}
	}
	// Make sure the question / responses aren't blank
	if (empty($question) || ($count == 0)) {
		register_error(elgg_echo("poll:blank"));
		if ($container_guid) {
			forward("poll/add/".$container_guid);
		} else {
			forward("poll/add");
		}
	} else {
		// Otherwise, save the poll
	
		// Initialise a new ElggObject
		$poll = new ElggObject();

		// Tell the system it's a poll
		$poll->subtype = "poll";

		// Set its owner to the current user
		$poll->owner_guid = $user->guid;
		$poll->container_guid = $container_guid;

		$poll->access_id = $access_id;

		$poll->question = $question;
		$poll->title = $question;

		if(!empty($description)) {
			$poll->description = $description;
		}

		if ($close_date) {
			$poll->close_date = $close_date;
		}

		$poll->open_poll = (!$open_poll) ? 0 : 1;

		if (!$poll->save()) {
			register_error(elgg_echo("poll:error"));
			if ($container_guid) {
				forward("poll/add/".$container_guid);
			} else {
				forward("poll/add");
			}
			exit;
		}

		elgg_clear_sticky_form('poll');

		poll_add_choices($poll, $new_choices);
		poll_manage_front_page($poll, $front_page);
	
		if (is_array($tagarray)) {
			$poll->tags = $tagarray;
		}

		$poll_create_in_river = elgg_get_plugin_setting('create_in_river', 'poll');
		if ($poll_create_in_river != 'no') {
			elgg_create_river_item(array(
				'view' => 'river/object/poll/create',
				'action_type' => 'create',
				'subject_guid' => elgg_get_logged_in_user_guid(),
				'object_guid' => $poll->guid,
			));
		}

		// Success message
		system_message(elgg_echo("poll:added"));
	}
}

// Forward to the poll page
forward($poll->getURL());
exit;
