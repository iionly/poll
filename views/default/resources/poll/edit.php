<?php
elgg_gatekeeper();

// verify input
$guid = (int) get_input('guid');
elgg_entity_gatekeeper($guid, 'object', Poll::SUBTYPE);

$poll = get_entity($guid);
if (!$poll->canEdit()) {
	throw new \Elgg\EntityPermissionsException();
}

// breadcrumb
elgg_push_entity_breadcrumbs($poll);

echo poll_get_page_edit('edit', $guid);
