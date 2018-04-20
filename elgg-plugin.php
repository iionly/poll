<?php

return [
	'entities' => [
		[
			'type' => 'object',
			'subtype' => 'poll',
			'class' => 'Poll',
			'searchable' => true,
		],
	],
	'actions' => [
		'poll/edit' => [],
		'poll/delete' => [],
		'poll/vote' => [],
		'poll/reset' => [],
		'poll/convert' => [
			'access' => 'admin'
		],
		'poll/upgrade' => [
			'access' => 'admin'
		]
	],
	'routes' => [
        'view:object:poll' => [
			'path' => '/poll/view/{guid}/{title?}',
            'resource' => 'poll/view',
            'requirements' => [
                'guid' => '\d+'
            ]
        ],
        'collection:object:poll:all' => [
			'path' => '/poll/all',
			'resource' => 'poll/all'
        ],
        'collection:object:poll:friends' => [
            'path' => '/poll/friends/{username?}',
            'resource' => 'poll/friends'
        ],
        'collection:object:poll:owner' => [
            'path' => '/poll/owner/{username}',
            'resource' => 'poll/owner'
        ],
        'collection:object:poll:group' => [
            'path' => '/poll/group/{guid}',
            'resource' => 'poll/group',
            'requirements' => [
                'guid' => '\d+'
            ]
        ],
        'add:object:poll:me' => [
            'path' => '/poll/add',
            'resource' => 'poll/add',
            'middleware' => [
				\Elgg\Router\Middleware\Gatekeeper::class,
			],
        ],
        'add:object:poll' => [
            'path' => '/poll/add/{guid?}',
            'resource' => 'poll/add',
            'requirements' => [
                'guid' => '\d+'
            ],
            'middleware' => [
				\Elgg\Router\Middleware\Gatekeeper::class,
			],
        ],
        'edit:object:poll' => [
            'path' => '/poll/edit/{guid}',
            'resource' => 'poll/edit',
            'requirements' => [
                'guid' => '\d+'
            ],
            'middleware' => [
				\Elgg\Router\Middleware\Gatekeeper::class,
			],
        ],

        // legacy URLS
        'legacy:object:poll' => [
            'path' => '/poll/read/{guid}/{title?}',
            'controller' => \Poll\LegacyRouter::class
        ],
        'legacy:collection:object:poll:owner' => [
            'path' => '/poll/{username}',
            'controller' => \Poll\LegacyRouter::class
        ],
        'legacy:handler:object:poll' => [
            'path' => '/polls/{seg1?}/{seg2?}/{seg3?}/{seg4?}/{seg5?}',
            'controller' => \Poll\LegacyRouter::class
        ]
	],
	'widgets' => [
        'poll' => [
            'title' => elgg_echo('poll:my_widget_title'),
            'description' => elgg_echo('poll:my_widget_description'),
            'context' => ['profile', 'groups', 'dashboard']
        ],
        'latestpoll' => [
            'title' => elgg_echo('poll:latest_widget_title'),
            'description' => elgg_echo('poll:latest_widget_description'),
            'context' => ['dashboard']
        ]
	],
];
