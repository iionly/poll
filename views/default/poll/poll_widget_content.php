<?php
elgg_load_library('elgg:poll');

$poll = elgg_extract('entity', $vars);

if($msg = elgg_extract('msg', $vars)) {
	echo '<p>'.$msg.'</p>';
}

if (elgg_is_logged_in()) {
	$user = elgg_get_logged_in_user_entity();
	$can_vote = !$poll->hasVoted($user);

	//if user has voted, show the results
	if (!$can_vote) {
		$results_display = "block";
		$poll_display = "none";
		$show_text = elgg_echo('poll:show_poll');
		$voted_text = elgg_echo("poll:voted");
	} else {
		$allow_close_date = elgg_get_plugin_setting('allow_close_date','poll');

		if ($allow_close_date == 'yes' && !$poll->isOpen()) {
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
	$toggle = elgg_view('output/url', array(
		'text' => $show_text,
		'href' => '',
		'data-guid' => $poll->guid,
		'class' => 'poll-show-link',
	));

	echo "<p class=\"center\">$toggle</p>";
}
