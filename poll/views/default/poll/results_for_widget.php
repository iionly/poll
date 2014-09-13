<?php
/**
 * Elgg Poll plugin
 * @package Elggpoll
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @Original author John Mellberg
 * website http://www.syslogicinc.com
 * @Modified By Team Webgalli to work with ElggV1.5
 * www.webgalli.com or www.m4medicine.com
 */

if (isset($vars['entity'])) {

	//set img src
	$img_src = elgg_get_site_url() . "mod/poll/graphics/poll.gif";

	$question = $vars['entity']->question;

	//get the array of possible responses
	$responses = poll_get_choice_array($vars['entity']);

	//get the array of user responses to the poll
	$user_responses = $vars['entity']->getAnnotations(array('annotation_name' => 'vote', 'limit' => false));

	//get the count of responses
	$user_responses_count = $vars['entity']->countAnnotations('vote');

	$allow_open_poll = elgg_get_plugin_setting('allow_open_poll', 'poll');
	if ($allow_open_poll) {
		$open_poll = ($vars['entity']->open_poll == 1);
	} else {
		$open_poll = false;
	}

	//populate array
	$vote_id=0;
	foreach($responses as $response)
	{
		//get count per response
		$response_count = poll_get_response_count($response, $user_responses);

		$voted_users = '';
		// show members if this poll is an open poll or if an admin is logged in (in the latter case open polls must be enabled in plugin settings)
		if (($open_poll || ($allow_open_poll && elgg_is_admin_logged_in()))) {
			$vote_id++;
			$response_annotations = elgg_get_annotations(array(
				'guid' => $vars['entity']->guid,
				'annotation_name' => 'vote',
				'annotation_value' => $response,
			));
			// css hide when admins are watching secret ballot, can manually open users' list later by clicking on label
			$display_style = ($open_poll) ? '1' : 'style="display:none;"';
			$user_guids = array();
			foreach($response_annotations as $ur) {
				$user_guids[] = $ur->owner_guid;
			}
			if (!empty($user_guids)) {
				// form voted users' icons list div
				$voted_users = '<div class="poll_users-voted" '.$display_style.' id="poll_users-vote-'.$vote_id.'">';
				$voted_users .= elgg_list_entities(array(
					'guids' => $user_guids,
					'full_view' => false,
					'pagination' => false,
					'list_type' => 'users',
					'gallery_class' => 'elgg-gallery-users',
					'size' => 'tiny',
				));
				$voted_users .= '</div>';
			}
		}

		//calculate %
		if ($response_count && $user_responses_count) {
			$response_percentage = round(100 / ($user_responses_count / $response_count));
		} else {
			$response_percentage = 0;
		}

//html
?>
<div class="poll_progress_indicator">
	<label title='<?php echo elgg_echo("poll:show_voters"); ?>' class='poll_vote-label' onClick='$("#poll_users-vote-<?php echo $vote_id; ?>").toggle();'><?php echo $response . " (" . $response_count . ")"; ?> </label><br>
	<div class="poll_progressBarContainer" align="left">
		<div class="poll_filled-bar"
			style="width: <?php echo $response_percentage; ?>%">
		</div>
	</div>
</div>
	<?php echo $voted_users; ?>
<br>

<?php
	}
?>

<p>
	<?php echo elgg_echo('poll:totalvotes') . $user_responses_count; ?>
</p>

<?php
} else {
	register_error(elgg_echo("poll:blank"));
	forward("mod/poll/all");
}
