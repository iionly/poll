<?php
elgg_load_library('elgg:poll');

$poll = elgg_extract('entity', $vars);

if($msg = elgg_extract('msg', $vars)) {
	echo '<p>'.$msg.'</p>';
}

if (elgg_is_logged_in()) {
	$user_guid = elgg_get_logged_in_user_guid();
	$can_vote = !poll_check_for_previous_vote($poll, $user_guid);

	//if user has voted, show the results
	if (!$can_vote) {
		$results_display = "block";
		$poll_display = "none";
		$show_text = elgg_echo('poll:show_poll');
		$voted_text = elgg_echo("poll:voted");
	} else {

		$allow_close_date = elgg_get_plugin_setting('allow_close_date','poll');

		// check if poll has a closing date and if that's the case check if voting is still allowed
		$today = date("Y/m/d");
		$end_of_day_close_date = $poll->close_date + 86400; // input/date saves beginning of day and we want to include closing date day in poll
		$deadline = date("Y", $end_of_day_close_date).'/'.date("m", $end_of_day_close_date).'/'.date("d", $end_of_day_close_date);
		if (($allow_close_date == 'yes') && (isset($poll->close_date)) && (strtotime($deadline)-strtotime($today)) <= 0) {
			$results_display = "block";
			$poll_display = "none";
			$show_text = elgg_echo('poll:show_poll');
			$date_day = date('j', $poll->close_date);
			$date_month = date('m', $poll->close_date);
			$date_year = date('Y', $poll->close_date);
			$friendly_time = $date_day . '. ' . elgg_echo("poll:month:$date_month") . ' ' . $date_year;
			$voted_text = elgg_echo("poll:voting_ended", array($friendly_time));
			$can_vote = false;
		} else {
			$results_display = "none";
			$poll_display = "block";
			$show_text = elgg_echo('poll:show_results');
		}
	}
} else {
	$results_display = "block";
	$poll_display = "none";
	$show_text = elgg_echo('poll:show_poll');
	$voted_text = elgg_echo('poll:login');
	$can_vote = false;
}
?>

<div id="poll-post-body-<?php echo $poll->guid; ?>" class="poll_post_body" style="display:<?php echo $results_display ?>;">
	<?php if (!$can_vote) {echo '<p>'.$voted_text.'</p>';}?>
	<?php echo elgg_view('poll/results_for_widget', array('entity' => $poll)); ?>
</div>

<?php echo elgg_view_form('poll/vote', array('id' => 'poll-vote-form-'.$poll->guid), array('entity' => $poll, 'callback' => 1, 'form_display' => $poll_display));

if ($can_vote) {
?>

	<!-- show display toggle -->
	<p align="center"><a href="javascript:void(0);" rel="<?php echo $poll->guid; ?>" class="poll-show-link"><?php echo $show_text; ?></a></p>
<?php
}
