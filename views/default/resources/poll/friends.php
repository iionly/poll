<?php

$page_owner = elgg_get_page_owner_entity();
if (!$page_owner instanceof ElggUser) {
	forward(REFERER);
}

// breadcrumb
elgg_push_collection_breadcrumbs('object', Poll::SUBTYPE, $page_owner, true);

elgg_register_title_button('poll', 'add', 'object', Poll::SUBTYPE);

echo poll_get_page_list('friends', $page_owner->guid);
