/**
 * Poll editing javascript
 */
define(function(require) {
	var $ = require('jquery');
	var elgg = require('elgg');

	// Total number of choices
	var cnum = 0;

	/**
	 * Initialize the poll editing javascript
	 */
	init = function() {
		$('#add-choice').live('click', addChoice);
		$('.delete-choice').live('click', deleteChoice);

		cnum = parseInt($('#number-of-choices').val());
	};

	/**
	 * Add a new empty text field to the form
	 *
 	 * @param {Object} e The click event
	 */
	var addChoice = function(e) {
		// Create a new input element
		var input = '<input type="text" class="poll_input-poll-choice" name="choice_text_' + cnum + '"> ';
		var deleteIcon = '<img src="' + elgg.get_site_url() + 'mod/poll/graphics/16-em-cross.png">';
		var deleteLink = '<a href="#" class="delete-choice" title="' + elgg.echo('poll:delete_choice') + '" data-id="' + cnum + '">' + deleteIcon + '</a>';

		var container = '<div id="choice-container-' + cnum + '">' + input + deleteLink + '</div>';

		$('#new-choices-area').append(container);

		// Increment total number of choices
		cnum++;
		$('#number-of-choices').val(cnum);

		e.preventDefault();
	};

	/**
	 * Remove a poll choice
	 *
 	 * @param {Object} e The click event
	 */
	function deleteChoice(e) {
		var id = $(this).data('id');

		$('#choice-container-' + id).remove();

		e.preventDefault();
	}

	elgg.register_hook_handler('init', 'system', init);
});
