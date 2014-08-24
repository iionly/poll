<?php
/**
 * Elgg poll plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
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

	//populate array
	foreach($responses as $response) {
		//get count per response
		$response_count = poll_get_response_count($response, $user_responses);

		//calculate %
		if ($response_count != 0) {
			$response_percentage = round(100 / ($user_responses_count / $response_count));
		} else {
			$response_percentage = 0;
		}

//html
?>
<div id="poll_progress_indicator">
	<label><?php echo $response . " (" . $response_count . ")"; ?> </label><br>
	<div id="poll_progressBarContainer" align="left">
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
	forward("poll/all");
}
