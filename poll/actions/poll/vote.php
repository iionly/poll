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
if (elgg_instanceof($poll, 'object', 'poll')) {

	// Make sure the response isn't blank
	if (empty($response)) {
		if (get_input('callback')) {
			$response = elgg_view('poll/poll_widget_content', array('entity' => $poll, 'msg' => elgg_echo("poll:novote")));
			$json = array('success' => false, 'result' => $response);
			echo json_encode($json);
			exit;
		} else {
			register_error(elgg_echo("poll:novote"));
			forward($poll->getUrl());
		}

	// Otherwise, save the poll vote
	} else {

		$user_guid = elgg_get_logged_in_user_guid();

		// check to see if this user has already voted
		$options = array('annotation_name' => 'vote', 'annotation_owner_guid' => $user_guid, 'guid' => $guid);
		if (!elgg_get_annotations($options)) {
			//add vote as an annotation
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
				$response = elgg_view('poll/poll_widget_content', array('entity'=>$poll));
				echo json_encode(array('success' => true, 'result' => $response));
				exit;
			} else {
				// Success message
				system_message(elgg_echo("poll:responded"));
				// Forward to the poll page
				forward($poll->getUrl());
			}
		}
	}
}
