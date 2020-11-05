<?php
/**
 * Elgg Group Polls post widget view
 *
 * @package Elggpoll
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author John Mellberg
 * @copyright John Mellberg 2009
 *
 * @uses $vars['entity'] Optionally, the poll post to view
 */

$widget = elgg_extract("entity", $vars);

// get the num of polls the user want to display
$limit = (int) $widget->limit;
// if no number has been set, default to 5
if($limit < 1) {
	$limit = 5;
}

// the page owner
$options = array(
	'type' => 'object',
	'subtype'=>'poll',
	'container_guid' => $widget->getOwnerGUID(),
	'limit' => $limit,
);

if ($polls = elgg_get_entities($options)) {
	foreach($polls as $poll) {
		echo elgg_view("poll/widget", array('entity' => $poll));
	}
} else {
	echo "<p>" . elgg_echo("poll:widget:nonefound") . "</p>";	
}
echo elgg_view('output/url', array(
	'href' => "poll/add/" . $widget->getOwnerGUID(),
	'text' => elgg_echo('poll:addpost'),
	'is_trusted' => true
));
