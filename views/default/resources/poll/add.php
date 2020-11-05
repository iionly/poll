<?php

use Elgg\EntityPermissionsException;

//elgg_gatekeeper();

$page_owner = elgg_get_page_owner_entity();
if (empty($page_owner)) {
	forward(REFERER);
}

//breadcrumb
elgg_push_collection_breadcrumbs('object', Poll::SUBTYPE, $page_owner);

echo poll_get_page_edit('add', $page_owner->guid);
