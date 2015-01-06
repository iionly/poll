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

elgg.poll.toggleResults = function(e) {
	var guid = $(this).data('guid');

	if ($("#poll-vote-form-container-"+guid).is(":visible")) {
		$(this).html(elgg.echo('poll:show_poll'));
	} else {
		$(this).html(elgg.echo('poll:show_results'));
	}

	$("#poll-vote-form-container-" + guid).toggle();
	$("#poll-post-body-" + guid).toggle();

	e.preventDefault();
}

elgg.register_hook_handler('init', 'system', elgg.poll.init);
