<?php
/**
 * Poll voting form
 */

$poll = $vars['entity'];

if($poll->multiple_choice) {
	$input_type = 'input/checkboxes';
} else {
	$input_type = 'input/radio';
}

$response_input = elgg_view($input_type, array(
	'name' => 'response',
	'options' => poll_get_choice_array($poll),
));

$submit_input = elgg_view('input/submit', array(
	'name' => 'submit_vote',
	'value' => elgg_echo('poll:vote'),
	'class' => 'elgg-button-submit poll-vote-button',
	'rel' => $poll->guid,
));

$guid_input = elgg_view('input/hidden', array(
	'name' => 'guid',
	'value' => $poll->guid,
));

$callback_input = elgg_view('input/hidden', array(
	'name' => 'callback',
	'value' => $vars['callback'],
));

echo <<<HTML
	<div>
		$response_input
	</div>
	<div>
		$guid_input
		$submit_input
		$callback_input
	</div>
HTML;
