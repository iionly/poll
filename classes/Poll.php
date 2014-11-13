<?php
/**
 * Class that represents an object of subtype poll
 */
class Poll extends ElggObject {
	const SUBTYPE = "poll";

	/**
	 * Set subtype
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = $this::SUBTYPE;
	}

	/**
	 * Check whether the user has voted in this poll
	 * 
	 * @param ElggUser $user
	 * @return boolean
	 */
	public function hasVoted($user) {
		$votes = elgg_get_annotations(array(
			'guid' => $this->guid,
			'type' => "object",
			'subtype' => "poll",
			'annotation_name' => "vote",
			'annotation_owner_guid' => $user->guid,
			'limit' => 1
		));

		if ($votes) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get choice objects
	 * 
	 * @return ElggObject[] $choices
	 */
	public function getChoices() {
		$choices = $this->getEntitiesFromRelationship(array(
			'relationship' => 'poll_choice',
			'inverse_relationship' => true,
			'order_by_metadata' => array(
				'name' => 'display_order',
				'direction' => 'ASC'
			),
		));
		
		if (!$choices) {
			$choices = array();
		}
		
		return $choices;
	}
}
