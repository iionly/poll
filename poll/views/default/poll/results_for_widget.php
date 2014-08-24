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

	foreach($responses as $response)
	{
		//get count per response
		$response_count = poll_get_response_count($response, $user_responses);

		//calculate %
		if ($response_count && $user_responses_count) {
			$response_percentage = round(100 / ($user_responses_count / $response_count));
		} else {
			$response_percentage = 0;
		}

//html
?>
<div class="poll_progress_indicator">
	<label><?php echo $response . " (" . $response_count . ")"; ?> </label><br>
	<div class="poll_progressBarContainer" align="left">
		<div class="poll_filled-bar"
			style="width: <?php echo $response_percentage; ?>%">
		</div>
	</div>
</div>
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
