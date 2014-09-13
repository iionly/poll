<?php

return array(

	/**
	 * Menu items and titles
	 */
	'poll' => "Polls",
	'poll:add' => "New Poll",
	'poll:group_poll' => "Group polls",
	'poll:group_poll:listing:title' => "%s's polls",
	'poll:your' => "Your polls",
	'poll:not_me' => "%s's polls",
	'poll:friends' => "Friends' polls",
	'poll:addpost' => "Create a poll",
	'poll:editpost' => "Edit a poll: %s",
	'poll:edit' => "Edit a poll",
	'item:object:poll' => 'Polls',
	'item:object:poll_choice' => "Poll choices",
	'poll:question' => "Poll question",
	'poll:description' => "Description (optional)",
	'poll:responses' => "Vote choices",
	'poll:show_results' => "Show results",
	'poll:show_poll' => "Show poll",
	'poll:add_choice' => "Add vote choice",
	'poll:delete_choice' => "Delete this choice",
	'poll:close_date' => "Poll closing date (optional)",
	'poll:voting_ended' => "Voting for this poll ended on %s.",
	'poll:poll_closing_date' => "(Poll closing date: %s)",

	'poll:convert:description' => 'ATTENTION: there were %s existing polls found that still have the old vote choices data structure. These polls won\'t work correctly on this version of the poll plugin.',
	'poll:convert' => 'Update existing polls now',
	'poll:convert:confirm' => 'The update is irreversible. Are you sure you want to convert the poll vote choices data structure?',

	'poll:settings:group:title' => "Allow group polls?",
	'poll:settings:group_poll_default' => "yes, on by default",
	'poll:settings:group_poll_not_default' => "yes, off by default",
	'poll:settings:no' => "no",
	'poll:settings:group_access:title' => "If group polls are activated, who gets to create polls?",
	'poll:settings:group_access:admins' => "group owners and admins only",
	'poll:settings:group_access:members' => "any group member",
	'poll:settings:front_page:title' => "Admins can make a single poll at a time the site's \"Poll of the day\"? (Widget Manager plugin required for adding the corresponding widget to the index page)",
	'poll:settings:allow_close_date:title' => "Allow setting a closing date for polls? (afterwards the results can still be viewed but voting is no longer permitted)",
	'poll:settings:allow_open_poll:title' => "Allow open polls? (open polls show which user voted for which poll choice; if this option is enabled, admins can see who voted what on any polls)",
	'poll:none' => "No polls found.",
	'poll:permission_error' => "You do not have permission to edit this poll.",
	'poll:vote' => "Vote",
	'poll:login' => "Please login if you would like to vote in this poll.",
	'group:poll:empty' => "No polls",
	'poll:settings:site_access:title' => "Who can create site-wide polls?",
	'poll:settings:site_access:admins' => "admins only",
	'poll:settings:site_access:all' => "any logged-in user",
	'poll:can_not_create' => "You do not have permission to create polls.",
	'poll:front_page_label' => "Make this poll the site's new \"Poll of the day\"",
	'poll:open_poll_label' => "Show in results which members voted for which choice (open poll)",
	'poll:show_voters' => "Show voters",

	/**
	 * Poll widget
	 **/
	'poll:latest_widget_title' => "Latest community polls",
	'poll:latest_widget_description' => "Displays the most recent polls.",
	'poll:latestgroup_widget_title' => "Latest group polls",
	'poll:latestgroup_widget_description' => "Displays the most recent group polls.",
	'poll:my_widget_title' => "My polls",
	'poll:my_widget_description' => "This widget will display your polls.",
	'poll:widget:label:displaynum' => "How many polls do you want to display?",
	'poll:individual' => "Poll of the day",
	'poll_individual:widget:description' => "Display the site's current \"Poll of the day\".",
	'poll:widget:no_poll' => "There are no polls of %s yet.",
	'poll:widget:nonefound' => "No polls found.",
	'poll:widget:think' => "Let %s know what you think!",
	'poll:enable_poll' => "Enable polls",
	'poll:noun_response' => "vote",
	'poll:noun_responses' => "votes",
	'poll:settings:yes' => "yes",
	'poll:settings:no' => "no",

	'poll:month:01' => 'January',
	'poll:month:02' => 'February',
	'poll:month:03' => 'March',
	'poll:month:04' => 'April',
	'poll:month:05' => 'May',
	'poll:month:06' => 'June',
	'poll:month:07' => 'July',
	'poll:month:08' => 'August',
	'poll:month:09' => 'September',
	'poll:month:10' => 'October',
	'poll:month:11' => 'November',
	'poll:month:12' => 'December',

	/**
	 * Notifications
	 **/
	'poll:new' => 'A new poll',
	'poll:notify:summary' => 'New poll called %s',
	'poll:notify:subject' => 'New poll: %s',
	'poll:notify:body' =>
'
%s created a new poll:

%s

View and vote on the poll:
%s
',

	/**
	 * Poll river
	 **/
	'poll:settings:create_in_river:title' => "Show poll creation in activity river?",
	'poll:settings:vote_in_river:title' => "Show poll voting in activity river?",
	'poll:settings:send_notification:title' => "Send notification when a poll is created? (Members will only receive notifications if their are friend with the creator of the poll or a member of the group the poll was added to. Additionally, notifications will only be sent to members who configured Elgg's notification settings accordingly)",
	'river:create:object:poll' => '%s created a poll %s',
	'river:vote:object:poll' => '%s voted on the poll %s',
	'river:comment:object:poll' => '%s commented on the poll %s',

	/**
	 * Status messages
	 */
	'poll:added' => "Your poll was created.",
	'poll:edited' => "Your poll was saved.",
	'poll:responded' => "Thank you for responding, your vote was recorded.",
	'poll:deleted' => "Your poll was successfully deleted.",
	'poll:totalvotes' => "Total number of votes: ",
	'poll:voted' => "Your vote has been cast for this poll. Thank you for voting on this poll.",

	/**
	 * Error messages
	 */
	'poll:blank' => "Sorry: you need to fill in both the question and add at least one vote choice before you can create the poll.",
	'poll:novote' => "Sorry: you need to choose an option to vote in this poll.",
	'poll:notfound' => "Sorry: we could not find the specified poll.",
	'poll:notdeleted' => "Sorry: we could not delete this poll."
);