<?php

require_once(dirname(__FILE__) . '/models/model.php');
require_once(dirname(__FILE__) . '/lib/hooks.php');

return [
	'bootstrap' => \PollBootstrap::class,
	'entities' => [
		[
			'type' => 'object',
			'subtype' => 'poll',
			'class' => 'Poll',
			'searchable' => true,
		],
	],
	'settings' => [
		'send_notification' => 'no',
		'notification_on_vote' => 'no',
		'create_in_river' => 'yes',
		'vote_in_river' => 'yes',
		'group_poll' => 'yes_default',
		'group_access' => 'admins',
		'site_access' => 'all',
		'front_page' => 'no',
		'allow_close_date' => 'no',
		'allow_open_poll' => 'no',
		'multiple_answer_polls' => 'no',
		'allow_poll_reset' => 'no',
	],
	'routes' => [
		'collection:object:poll:all' => [
			'path' => '/poll/all',
			'resource' => 'poll/all',
		],
		'collection:object:poll:owner' => [
			'path' => '/poll/owner/{username}',
			'resource' => 'poll/owner',
		],
		'collection:object:poll:group' => [
			'path' => '/poll/group/{guid}/{subpage?}',
			'resource' => 'poll/group',
			'defaults' => [
				'subpage' => 'all',
			],
		],
		'collection:object:poll:friends' => [
			'path' => '/poll/friends/{username}',
			'resource' => 'poll/friends',
		],
		'view:object:poll' => [
			'path' => '/poll/view/{guid}/{title?}',
			'resource' => 'poll/view',
		],
		'add:object:poll' => [
			'path' => '/poll/add/{guid?}',
			'resource' => 'poll/add',
		],
		'edit:object:poll' => [
			'path' => '/poll/edit/{guid}',
			'resource' => 'poll/edit',
		],
		'default:object:poll' => [
			'path' => '/poll',
			'resource' => 'poll/all',
		],
	],
	'actions' => [
		'poll/edit' => [],
		'poll/delete' => [],
		'poll/vote' => [],
		'poll/reset' => [],
		'poll/convert' => ['access' => 'admin'],
		'poll/upgrade' => ['access' => 'admin'],
	],
	'widgets' => [

		'poll' => [
			'context' => ['dashboard', 'profile'],
		],
		'latestpoll' => [
			'context' => ['groups', 'index'],
		],
	],
	'views' => [
		'default' => [
			'poll/' => __DIR__ . '/graphics',
		],
	],
];
