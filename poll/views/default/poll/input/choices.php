<?php

// TODO: add ability to reorder poll questions?
$poll = elgg_extract('poll', $vars);
$body = '';
$i = 0;

if ($poll) {
	$choices = poll_get_choices($poll);
	if ($choices) {
		foreach($choices as $choice) {
			$body .= '<div id="choice_container_'.$i.'">';
			$body .= elgg_view('input/text', array(
						'name' => 'choice_text_'.$i,
						'value' => $choice->text,
						'class' => 'poll_input-poll-choice'
			));
			$body .= '<a href="#" alt="'.elgg_echo('poll:delete_choice').'" title="'.elgg_echo('poll:delete_choice').'" id="choice_delete_'.$i.'" onclick="javascript:poll_delete_choice('.$i.'); return false;">';
			$body .= '<img src="'.elgg_get_site_url().'mod/poll/graphics/16-em-cross.png"></a>';
			$body .= '</div>';

			$i += 1;
		}
	}
}

$body .= elgg_view('input/hidden', array(
			'name' => 'number_of_choices',
			'id' => 'number_of_choices',
			'value' => $i,
));

$body .= '<div id="new_choices_area"></div>';

$body .= elgg_view('input/button', array(
			'id' => 'add_choice',
			'value' => elgg_echo('poll:add_choice'),
			'type' => 'button',
			'class' => 'elgg-button elgg-button-action',
));

echo $body;
?>

<script type="text/javascript">
$('#add_choice').click(
	function() {
		var cnum = parseInt($('#number_of_choices').val());
		$('#number_of_choices').val(cnum+1);
		var new_html = '<div id="choice_container_'+cnum+'">';
		new_html += '<input type="text" class="poll_input-poll-choice" name="choice_text_'+cnum+'"> ';
		new_html += '<a href="#" title="<?php echo elgg_echo('poll:delete_choice'); ?>" alt="<?php echo elgg_echo('poll:delete_choice'); ?>" id="choice_delete_'+cnum+'" onclick="javascript:poll_delete_choice('+cnum+'); return false;">';
		new_html += '<img src="<?php echo elgg_get_site_url(); ?>mod/poll/graphics/16-em-cross.png"></a>'
		new_html += '</div>';
		$('#new_choices_area').append(new_html);
	}
);

function poll_delete_choice(cnum) {
	$("#choice_container_"+cnum).remove();
}

</script>
