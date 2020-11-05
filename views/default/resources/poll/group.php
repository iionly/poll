<?php

$page_owner = elgg_get_page_owner_entity();
if (!$page_owner instanceof ElggGroup) {
	forward(REFERER);
}

// breadcrumb
elgg_push_collection_breadcrumbs('object', Poll::SUBTYPE, $page_owner);

elgg_register_title_button('poll', 'add', 'object', Poll::SUBTYPE);

echo poll_get_page_list('group', $page_owner->guid);
