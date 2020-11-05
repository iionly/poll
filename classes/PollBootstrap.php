<?php

use Elgg\DefaultPluginBootstrap;

class PollBootstrap extends DefaultPluginBootstrap {

	public function init() {

		// Set up site menu
		elgg_register_menu_item('site', array(
			'name' => 'poll',
			'text' => elgg_echo('collection:object:poll'),
			'href' => 'poll/all',
			'icon' => 'chart-pie',
		));

		// Extend system CSS with our own styles, which are defined in the poll/css view
		elgg_extend_view('css/elgg','poll/css');

		// Extend hover-over menu
		elgg_extend_view('profile/menu/links','poll/menu');

		$hook = $this->elgg()->hooks;
		// Register a URL handler for poll posts
		$hook->registerHandler('entity:url', 'object', 'poll_url');

		//register title urls for widgets
		$hook->registerHandler('entity:url', 'object', 'poll_widget_urls');

		// add link to owner block
		$hook->registerHandler('register', 'menu:owner_block', 'poll_owner_block_menu');

		// Allow liking of polls
		$hook->registerHandler('likes:is_likable', 'object:poll', 'Elgg\Values::getTrue');

		$plugin = $this->plugin();
		// notifications
		$send_notification = $plugin->getSetting('send_notification');
		if (!$send_notification || $send_notification != 'no') {
			elgg_register_notification_event('object', 'poll');
			$hook->registerHandler('prepare', 'notification:create:object:poll', 'poll_prepare_notification');
		}

		$poll_front_page = $plugin->getSetting('front_page');
		if($poll_front_page == 'yes') {
			elgg_register_widget_type([
				'id' => 'poll_individual',
				'context' => ['profile'],
			]);
		}

		if (elgg_is_active_plugin('widget_manager')) {
			$group_poll = $plugin->getSetting('group_poll');

			elgg_register_widget_type([
				'id' => 'latestpoll_index',
				'context' => ['index'],
			]);

			if (!$group_poll || $group_poll != 'no') {
				elgg_register_widget_type([
					'id' => 'latestgrouppoll',
					'context' => ['groups', 'index'],
				]);
			}

			if ($poll_front_page == 'yes') {
				elgg_register_widget_type([
					'id' => 'poll_individual_index',
					'context' => ['index'],
				]);
			}
		}
	}

	public function activate() {

		$plugin = $this->plugin();
		// add group widget
		$group_poll = $plugin->getSetting('group_poll');
		if (!$group_poll || $group_poll != 'no') {
			elgg_extend_view('groups/tool_latest', 'poll/group_module');
		}

		if (!$group_poll || ($group_poll == 'yes_default')) {
			add_group_tool_option('poll', elgg_echo('poll:enable_poll'), true);
		} else if ($group_poll == 'yes_not_default') {
			add_group_tool_option('poll', elgg_echo('poll:enable_poll'), false);
		}
	}
}
