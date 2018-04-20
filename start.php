<?php

elgg_register_event_handler('init','system','poll_init');

function poll_init() {

	// Set up menu
	elgg_register_menu_item('site', array(
		'name' => 'poll',
		'text' => elgg_echo('poll'),
		'href' => 'poll/all'
	));

	// Extend system CSS with our own styles, which are defined in the poll/css view
	elgg_extend_view('css/elgg','poll/css');

	// Extend hover-over menu
	elgg_extend_view('profile/menu/links','poll/menu');

	// Register a fallback pagehandler if the polls plugin has been used previously
	//elgg_register_plugin_hook_handler('route', 'polls', 'poll_deprecated_pagehandler');

	// Allow liking of polls
	elgg_register_plugin_hook_handler('likes:is_likable', 'object:poll', 'Elgg\Values::getTrue');

	// notifications
	$send_notification = elgg_get_plugin_setting('send_notification', 'poll');
	if (!$send_notification || $send_notification != 'no') {
		elgg_register_notification_event('object', 'poll');
		elgg_register_plugin_hook_handler('prepare', 'notification:create:object:poll', 'poll_prepare_notification');
	}

	// add link to owner block
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'poll_owner_block_menu');

	// add group widget
	$group_poll = elgg_get_plugin_setting('group_poll', 'poll');
	if (!$group_poll || $group_poll != 'no') {
		elgg_extend_view('groups/tool_latest', 'poll/group_module');
	}

	if (!$group_poll || ($group_poll == 'yes_default')) {
		add_group_tool_option('poll', elgg_echo('poll:enable_poll'), true);
	} else if ($group_poll == 'yes_not_default') {
		add_group_tool_option('poll', elgg_echo('poll:enable_poll'), false);
	}

	//add widgets
	$poll_front_page = elgg_get_plugin_setting('front_page','poll');
	if($poll_front_page == 'yes') {
		elgg_register_widget_type('poll_individual', elgg_echo('poll:individual'), elgg_echo('poll_individual:widget:description'), array("dashboard"));
	}
	if (elgg_is_active_plugin('widget_manager')) {
		elgg_register_widget_type('latestpoll_index', elgg_echo('poll:latest_widget_title'), elgg_echo('poll:latest_widget_description'), array("index"));
		if (!$group_poll || $group_poll != 'no') {
			elgg_register_widget_type('latestgrouppoll', elgg_echo('poll:latestgroup_widget_title'), elgg_echo('poll:latestgroup_widget_description'), array("groups"));
		}
		if($poll_front_page == 'yes') {
			elgg_register_widget_type('poll_individual_index', elgg_echo('poll:individual'), elgg_echo('poll_individual:widget:description'), array("index"));
		}

		//register title urls for widgets
		elgg_register_plugin_hook_handler("entity:url", "object", "poll_widget_urls");
	}
}

/**
 * Add a menu item to an owner block
 */
function poll_owner_block_menu($hook, $type, $return, $params) {
	if ($params['entity'] instanceof ElggUser) {
		$url = "poll/owner/{$params['entity']->username}";
		$item = new ElggMenuItem('poll', elgg_echo('poll'), $url);
		$return[] = $item;
	} else {
		if (\Poll\Model::isEnabledForGroup($params['entity'])) {
			$url = "poll/group/{$params['entity']->guid}/all";
			$item = new ElggMenuItem('poll', elgg_echo('poll:group_poll'), $url);
			$return[] = $item;
		}
	}

	return $return;
}

/**
 * Prepare a notification message about a created poll
 *
 * @param string                          $hook         Hook name
 * @param string                          $type         Hook type
 * @param Elgg_Notifications_Notification $notification The notification to prepare
 * @param array                           $params       Hook parameters
 * @return Elgg _Notifications_Notification
 */
function poll_prepare_notification($hook, $type, $notification, $params) {
	$entity = $params['event']->getObject();
	$owner = $params['event']->getActor();
	$recipient = $params['recipient'];
	$language = $params['language'];
	$method = $params['method'];

	$notification->subject = elgg_echo('poll:notify:subject', array($entity->title), $language);
	$notification->body = elgg_echo('poll:notify:body', array(
		$owner->name,
		$entity->title,
		$entity->getURL()
	), $language);
	$notification->summary = elgg_echo('poll:notify:summary', array($entity->title), $language);

	return $notification;
}

function poll_widget_urls($hook_name, $entity_type, $return_value, $params){
	$result = $return_value;
	$widget = $params["entity"];

	if(empty($result) && ($widget instanceof ElggWidget)) {
		$owner = $widget->getOwnerEntity();
		switch($widget->handler) {
			case "poll":
				if($owner instanceof ElggUser){
					$result = "/poll/owner/{$owner->username}/all";
				} else {
					$result = "/poll/all";
				}
				break;
			case "latestpoll":
			case "poll_individual":
			case "latestpoll_index":
			case "poll_individual_index":
				$result = "/poll/all";
				break;
			case "latestgrouppoll":
				if($owner instanceof ElggGroup){
					$result = "/poll/group/{$owner->guid}/all";
				} else {
					$result = "/poll/owner/{$owner->username}/all";
				}
				break;
		}
	}
	return $result;
}
