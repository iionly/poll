<?php

return array(

	/**
	 * Menu items and titles
	 */
	'poll' => "Polls",
	'poll:add' => "New Poll",
	'poll:votes' => "votes",
	'poll:user' => "%s's poll",
	'poll:group_poll' => "Group polls",
	'poll:group_poll:listing:title' => "%s's polls",
	'poll:user:friends' => "%s's friends' polls",
	'poll:your' => "Your polls",
	'poll:not_me' => "%s's polls",
	'poll:posttitle' => "%s's polls: %s",
	'poll:friends' => "Friends' polls",
	'poll:not_me_friends' => "%s's friend's polls",
	'poll:yourfriends' => "Your friends' latest polls",
	'poll:everyone' => "All site polls",
	'poll:addpost' => "Create a poll",
	'poll:editpost' => "Edit a poll: %s",
	'poll:edit' => "Edit a poll",
	'poll:text' => "Poll text",
	'poll:strapline' => "%s",
	'item:object:poll' => 'Polls',
	'item:object:poll_choice' => "Poll choices",
	'poll:question' => "Poll question",
	'poll:description' => "Description (optional)",
	'poll:responses' => "Response choices",
	'poll:results' => "[+] Show the results",
	'poll:show_results' => "Show results",
	'poll:show_poll' => "Show poll",
	'poll:add_choice' => "Add response choice",
	'poll:delete_choice' => "Delete this choice",

	'poll:convert:description' => 'ATTENTION: there were %s existing polls found that still have the old response data structure. These polls won\'t work correctly on this version of the poll plugin.',
	'poll:convert' => 'Update existing polls now',
	'poll:convert:confirm' => 'The update is irreversible. Are you sure you want to convert the poll responses?',

	'poll:settings:group:title' => "Allow group polls?",
	'poll:settings:group_poll_default' => "yes, on by default",
	'poll:settings:group_poll_not_default' => "yes, off by default",
	'poll:settings:no' => "no",
	'poll:settings:group_access:title' => "If group polls are activated, who gets to create polls?",
	'poll:settings:group_access:admins' => "group owners and admins only",
	'poll:settings:group_access:members' => "any group member",
	'poll:settings:front_page:title' => "Admins can make a single poll at a time the site's \"Poll of the day\"? (Widget Manager plugin required for adding the corresponding widget to the index page)",
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
	'poll:group_identifier' => "(in %s)",
	'poll:noun_response' => "response",
	'poll:noun_responses' => "responses",
	'poll:settings:yes' => "yes",
	'poll:settings:no' => "no",

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
	'poll:save:failure' => "Your poll could not be saved. Please try again.",
	'poll:blank' => "Sorry: you need to fill in both the question and responses before you can make a poll.",
	'poll:novote' => "Sorry: you need to choose an option to vote in this poll.",
	'poll:notfound' => "Sorry: we could not find the specified poll.",
	'poll:nonefound' => "No polls of %s were found.",
	'poll:notdeleted' => "Sorry: we could not delete this poll."
);