<?php
/**
 * Elgg Poll plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 */

elgg_load_library('elgg:poll');

// Get input data
$guid = (int) get_input('guid');

// Make sure we actually have permission to edit
$poll = get_entity($guid);
if (elgg_instanceof($poll, 'object', 'poll') && $poll->canEdit()) {

	// Get container
	$container = $poll->getContainerEntity();
	// Delete the poll!
	poll_delete_choices($poll);
	if ($poll->delete()) {
		// Success message
		system_message(elgg_echo("poll:deleted"));
	} else {
		register_error(elgg_echo("poll:notdeleted"));
	}
	// Forward to the main poll page
	if (elgg_instanceof($container, 'group')) {
		forward("poll/group/" . $container->guid);
	} else {
		forward("poll/owner/" . $container->username);
	}
}
