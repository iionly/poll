<?php
/**
 * Elgg poll plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 */

$poll = $vars['entity'];

$owner = $poll->getOwnerEntity();
$friendlytime = elgg_get_friendly_time($poll->time_created);
$responses = $poll->countAnnotations('vote');

$icon = '<img src="'.elgg_get_site_url().'mod/poll/graphics/poll.png" />';
$info = "<a href=\"{$poll->getURL()}\">{$poll->question}</a><br>";
if ($responses == 1) {
	$noun = elgg_echo('poll:noun_response');
} else {
	$noun = elgg_echo('poll:noun_responses');
}
$info .= "$responses $noun<br>";
$info .= "<p class=\"owner_timestamp\"><a href=\"{$owner->getURL()}\">{$owner->name}</a> {$friendlytime}</p>";
echo elgg_view_image_block($icon, $info);
