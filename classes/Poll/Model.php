<?php

namespace Poll;

class Model {
    
    /**
    * Pull together variables for the edit form
    * @param ElggObject $poll
    * @return array
    *
    */
    public static function prepareEditBodyVars($poll = null) {
        // input names => defaults
	    $values = array(
		    'question' => null,
		    'description' => null,
		    'close_date' => null,
		    'open_poll' => null,
		    'max_votes' => null,
		    'tags' => null,
		    'front_page' => null,
		    'access_id' => ACCESS_DEFAULT,
		    'guid' => null
	    );

	    if ($poll) {
		    foreach (array_keys($values) as $field) {
			    if (isset($poll->$field)) {
				    $values[$field] = $poll->$field;
			    }
		    } 
	    }

	    if (elgg_is_sticky_form('poll')) {
		    $sticky_values = elgg_get_sticky_values('poll');
		    foreach ($sticky_values as $key => $value) {
    			$values[$key] = $value;
	    	}
	    }

	    elgg_clear_sticky_form('poll');

	    return $values;
    }


    public static function isEnabledForGroup($group) {
        $group_poll = elgg_get_plugin_setting('group_poll', 'poll');
	    if ($group && ($group_poll != 'no')) {
		    if ( ($group->poll_enable == 'yes') || ((!$group->poll_enable && ((!$group_poll) || ($group_poll == 'yes_default'))))) {
			    return true;
		    }
	    }
	    return false;
    }


    public static function manageFrontPage($poll, $front_page) {
        $poll_front_page = elgg_get_plugin_setting('front_page','poll');
	    if(elgg_is_admin_logged_in() && ($poll_front_page == 'yes')) {
		    $options = array(
			    'type' => 'object',
			    'subtype' => 'poll',
			    'metadata_name_value_pairs' => array(array('name' => 'front_page','value' => 1)),
			    'limit' => 1
		    );
		    $poll_front = elgg_get_entities_from_metadata($options);
		    if ($poll_front) {
			    $front_page_poll = $poll_front[0];
			    if ($front_page_poll->guid == $poll->guid) {
				    if (!$front_page) {
					    $front_page_poll->front_page = 0;
				    }
			    } else {
				    if ($front_page) {
					    $front_page_poll->front_page = 0;
					    $poll->front_page = 1;
				    }
			    }
		    } else {
			    if ($front_page) {
				    $poll->front_page = 1;
			    }
		    }
	    }
    }


    public static function isUpgradeAvailable() {
        require_once elgg_get_plugins_path() . "poll/version.php";

	    $local_version = elgg_get_plugin_setting('local_version', 'poll');
	    if ($local_version === false) {
    		$local_version = 0;
	    }

	    if ($local_version == $version) {
		    return false;
	    } else {
		    return true;
	    }
    }
}