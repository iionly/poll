<?php

$poll = elgg_extract('entity', $vars);
if ($poll) {
	$guid = $poll->guid;
} else  {
	$guid = 0;
}

$page_owner = elgg_get_page_owner_entity();
if ($page_owner instanceof ElggGroup) {
	$cancel_forward = 'poll/group/' . $page_owner->getGUID() . '/all';
} else {
	$cancel_forward = 'poll/owner/' . $page_owner->username;
}

// poll question
echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('poll:question'),
	'name' => 'question',
	'value' => $poll->question,
]);

// poll description
echo elgg_view_field([
	'#type' => 'longtext',
	'#label' => elgg_echo('poll:description'),
	'name' => 'description',
	'value' => $poll->description,
]);

// poll choices
$poll_choices =  elgg_view('poll/input/choices', array('poll' => $poll));
$label = elgg_format_element('label', [], elgg_echo('poll:responses'));
$note = elgg_format_element('p', ['class' => 'elgg-subtext mts'], elgg_echo('poll:note_responses'));
echo elgg_format_element('div', [], $label . $note . $poll_choices);

$multiple_answer_polls = elgg_get_plugin_setting('multiple_answer_polls','poll');
$max_votes = $poll->max_votes ? $poll->max_votes : 1;
// Don't allow multiple-answer polls if not allowed by poll plugin settings but in case an existing poll is a multiple-answer poll
// (created when the corresponding plugin setting was set to "yes") then keep the current value of max_votes unchanged unless
// the poll choices get modified (in this case reset max_votes to 1)
if ($multiple_answer_polls == 'yes') {
	echo elgg_view_field([
		'#type' => 'text',
		'#label' => elgg_echo('poll:max_votes:label'),
		'name' => 'max_votes',
		'value' => $max_votes,
	]);

	echo elgg_format_element('p', ['class' => 'elgg-text-help'], elgg_echo('poll:max_votes:desc'));
} else {
	if ($max_votes > 1) {
		echo elgg_view('output/longtext', array(
			'value' => elgg_echo('poll:max_votes:not_allowed_hint', array($max_votes)), 
			'class' => 'mts'
		));
	}
	echo elgg_view('input/hidden', array('name' => 'max_votes', 'value' => $max_votes));
}

// close date
echo elgg_view_field([
	'#type' => 'date',
	'#label' => elgg_echo('poll:close_date'),
	'name' => 'close_date',
	'value' => $close_date,
	'timestamp' => true,
	'required' => (bool) (elgg_get_plugin_setting('allow_close_date', 'poll') === 'yes'),
]);

if ($poll->open_poll) {
	$checked = 'checked';
} else {
	$checked = '';
}

echo  elgg_view_field([
	'#type' => 'checkbox',
	'#label' => elgg_echo('poll:open_poll_label'),
	'name' => 'open_poll',
	'value' => 1,
	'checked' => $checked,
	'required' => (bool) (elgg_get_plugin_setting('allow_open_poll', 'poll') === 'yes'),
]);

// tags
echo elgg_view_field([
	'#type' => 'tags',
	'#label' => elgg_echo('tags'),
	'name' => 'tags',
	'value' => $poll->tags,
]);

// access
echo elgg_view_field([
	'#type' => 'access',
	'#label' => elgg_echo('access'),
	'name' => 'access_id',
	'value' => $poll->access_id,
]);

$poll_front_page = elgg_get_plugin_setting('front_page','poll');

if (elgg_is_admin_logged_in() && ($poll_front_page == 'yes')) {
	if ($poll->front_page) {
		$checked = 'checked';
	} else {
		$checked = '';
	}

	echo  elgg_view_field([
		'#type' => 'checkbox',
		'#label' => elgg_echo('poll:front_page_label'),
		'name' => 'front_page',
		'value' => 1,
		'checked' => $checked,
	]);
}

if (isset($poll)) {
	echo elgg_view('input/hidden', array(
		'name' => 'guid', 
		'value' => $guid
	));
} else {
	echo elgg_view('input/hidden', array(
		'name' => 'container_guid', 
		'value' => elgg_get_page_owner_guid()
	));
}

$footer = elgg_view('input/submit', array(
	'name' => 'submit', 
	'class' => 'elgg-button elgg-button-submit', 
	'value' => elgg_echo('save')
));
$footer .= ' '.elgg_view('input/button', array(
	'name' => 'cancel', 
	'id' => 'poll_edit_cancel', 
	'type'=> 'button', 
	'class' => 'elgg-button elgg-button-cancel', 
	'value' => elgg_echo('cancel'), 
	'data-forward' => $cancel_forward
));

elgg_set_form_footer($footer);
