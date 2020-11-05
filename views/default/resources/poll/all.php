<?php

elgg_register_title_button('poll', 'add', 'object', Poll::SUBTYPE);

elgg_push_collection_breadcrumbs('object', Poll::SUBTYPE);

//echo poll_get_page_list('all');
// build page elements
$title = elgg_echo('item:object:poll');

$contents = elgg_list_entities([
	'type' => 'object',
	'subtype' => Poll::SUBTYPE,
	'no_results' => elgg_echo('poll:none'),
	'preload_owners' => true,
	'preload_containers' => true,
]);

// build page
$page_data = elgg_view_layout('content', [
	'title' => $title,
	'content' => $contents,
	'sidebar' => elgg_view('poll/sidebar')
]);

// draw page
echo elgg_view_page($title, $page_data);
