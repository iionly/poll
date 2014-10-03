elgg.provide('elgg.poll');

elgg.poll.init = function() {
	$('.poll-show-link').live('click',elgg.poll.toggleResults);
	$('.poll-vote-button').live('click',function(e) {
		var guid = $(this).attr("rel");

		// submit the vote and display the response when it arrives
		elgg.action('action/poll/vote', {
			data: $('#poll-vote-form-'+guid).serialize(),
			success: function(response) {
				if (response.output) {
					$('#poll-container-'+guid).html(response.output);
				}
			}
		});

		e.preventDefault();
	});
};

elgg.poll.toggleResults = function() {
	var guid = $(this).attr("rel");
	if ($("#poll-vote-form-container-"+guid).is(":visible")) {
		$("#poll-vote-form-container-"+guid).hide();
		$("#poll-post-body-"+guid).show();
		$(this).html("<?php echo elgg_echo('poll:show_poll'); ?>");
	} else {
		$("#poll-vote-form-container-"+guid).show();
		$("#poll-post-body-"+guid).hide();
		$(this).html("<?php echo elgg_echo('poll:show_results'); ?>");
	}
}

elgg.register_hook_handler('init', 'system', elgg.poll.init);
