<?php
/**
 * Group poll view
 *
 * @package Elggpoll_extended
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author John Mellberg <big_lizard_clyde@hotmail.com>
 * @copyright John Mellberg 2009
 *
 */

if (poll_activated_for_group($vars['entity'])) {
?>

<div id="group_pages_widget">
	<h2><?php echo elgg_echo('poll:group_poll'); ?></h2>
	<?php
		$limit = 4;
		if($poll_found = elgg_get_entities(array('type' => 'object', 'subtype' => 'poll', 'limit' => $limit, 'container_guid' => elgg_get_page_owner_guid())) {
			foreach($poll_found as $pollpost){
				echo elgg_view("poll/widget", array('entity' => $pollpost));
			}
		} else {
			echo '<p>' . elgg_echo('group:poll:empty') . '</p>';
		}
	?>
</div>

<?php
}
