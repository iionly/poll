<?php
/**
 * Hooks for Poll
 */

/**
 * Return the url for poll objects
 */
function poll_url(\Elgg\Hook $hook) {
	$poll = $hook->getParam('entity');
	if ($poll instanceof Poll) {
		if (!$poll->getOwnerEntity()) {
			// default to a standard view if no owner.
			return false;
		}

		$title = elgg_get_friendly_title($poll->title);
		return "poll/view/" . $poll->guid . "/" . $title;
	}
}

/**
 * Return the url for poll widget objects
 */
function poll_widget_urls(\Elgg\Hook $hook){
	$result = $hook->getValue();
	$widget = $hook->getParam('entity');

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

/**
 * Prepare a notification message about a created poll
 *
 * @return Elgg_Notifications_Notification
 */
function poll_prepare_notification(\Elgg\Hook $hook) {
	$type = $hook->getType();
	$notification = $hook->getValue();
	$params = $hook->getParams();

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

/**
 * Add a menu item to an owner block
 */
function poll_owner_block_menu(\Elgg\Hook $hook) {
	$menu = $hook->getValue();
	$entity = $hook->getParam('entity');

	if ($entity instanceof ElggUser) {
		$url = "poll/owner/{$entity->username}";
		$item = new ElggMenuItem('poll', elgg_echo('poll'), $url);
		$menu[] = $item;
	} else {
		if (poll_activated_for_group($entity)) {
			$url = "poll/group/{$entity->guid}/all";
			$item = new ElggMenuItem('poll', elgg_echo('poll:group_poll'), $url);
			$menu[] = $item;
		}
	}

	return $return;
}
